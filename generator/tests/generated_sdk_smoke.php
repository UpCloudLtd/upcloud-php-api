<?php

declare(strict_types=1);

/**
 * Generated-output smoke test. This validates that the generated SDK is
 * syntactically valid, loadable with Composer autoloading, internally valid
 * as PHP enums, and correctly wired through UpcloudClient. It does not make
 * network requests or verify individual API request and response contracts.
 */
require dirname(__DIR__, 2) . '/fern/sdk/vendor/autoload.php';

use GuzzleHttp\Client;
use Upcloud\UpcloudClient;

$sourceDirectory = dirname(__DIR__, 2) . '/fern/sdk/src';
$phpFiles = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourceDirectory));

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $phpFiles[] = $file->getPathname();
    }
}

sort($phpFiles);

if ($phpFiles === []) {
    throw new RuntimeException('No generated PHP files found');
}

// Check syntax and load every generated source file with Composer available.
foreach ($phpFiles as $file) {
    exec('php -l ' . escapeshellarg($file), $output, $status);
    if ($status !== 0) {
        throw new RuntimeException(
            "PHP syntax check failed: {$file}\n" . implode("\n", $output)
        );
    }
    require_once $file;
}

// Check enum case names and backing values for collisions that break PHP or serialization.
$enumCount = 0;
foreach (get_declared_classes() as $className) {
    if (!str_starts_with($className, 'Upcloud\\') || !enum_exists($className)) {
        continue;
    }

    $enum = new ReflectionEnum($className);
    $caseNames = [];
    $backingValues = [];

    foreach ($enum->getCases() as $case) {
        $caseName = $case->getName();
        if (isset($caseNames[$caseName])) {
            throw new RuntimeException("Duplicate enum case {$className}::{$caseName}");
        }
        $caseNames[$caseName] = true;

        if ($enum->isBacked()) {
            $value = $case->getBackingValue();
            if (isset($backingValues[$value])) {
                throw new RuntimeException("Duplicate backing value {$className}: {$value}");
            }
            $backingValues[$value] = true;
        }
    }
    $enumCount++;
}

// Check that the root client initializes every generated service client.
$client = new UpcloudClient(
    token: 'smoke-test-token',
    options: ['client' => new Client()],
);
$clientReflection = new ReflectionClass($client);
$serviceClientCount = 0;

foreach ($clientReflection->getProperties() as $property) {
    if (!$property->isPublic() || !str_ends_with($property->getType()?->getName() ?? '', 'Client')) {
        continue;
    }

    $expectedClass = $property->getType()->getName();
    $value = $property->getValue($client);
    if (!$value instanceof $expectedClass) {
        throw new RuntimeException("Service client property is not initialized: {$property->getName()}");
    }
    $serviceClientCount++;
}

printf(
    "Generated SDK smoke checks passed: %d PHP files, %d enums, %d service clients\n",
    count($phpFiles),
    $enumCount,
    $serviceClientCount,
);
