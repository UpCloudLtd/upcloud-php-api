<?php

declare(strict_types=1);

require dirname(__DIR__, 2) . '/fern/sdk/vendor/autoload.php';

use Upcloud\Types\DatabaseMaintenanceWindowResponse;
use Upcloud\Types\DatabaseServiceInformationResponse;
use Upcloud\Types\StorageDetails;
use Upcloud\Types\StorageLabel;
use Upcloud\Types\StorageSortBy;

function assert_fixture(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function assert_json_round_trip(string $fixtureName, string $json, string $className): void
{
    $decoded = $className::fromJson($json);
    $encoded = json_decode($decoded->toJson(), true, 512, JSON_THROW_ON_ERROR);
    $expected = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    $expected = array_filter($expected, static fn ($value): bool => $value !== null);
    assert_fixture($encoded === $expected, "{$fixtureName} round-trip changed the JSON shape");
}

$storageJson = '{"access":"private","encrypted":"no","labels":[{"key":"team","value":"platform"}],"license":0,"backup_rule":{},"part_of_plan":null,"servers":{"server":[]},"size":10240,"state":"online","tier":"maxiops","title":"Ubuntu 24.04","type":"normal","uuid":"00000000-0000-0000-0000-000000000001","zone":"fi-hel1"}';
assert_json_round_trip('storage details', $storageJson, StorageDetails::class);

$storage = StorageDetails::fromJson($storageJson);
assert_fixture($storage->labels[0] instanceof StorageLabel, 'Storage label was not deserialized as a generated model');
assert_fixture($storage->servers->server === [], 'Storage servers were not deserialized as a generated model');
assert_fixture($storage->backupRule === [], 'Empty storage backup rule was not preserved');
assert_fixture($storage->partOfPlan === null, 'Nullable storage field was not preserved');

$databaseJson = '{"state_error":{"node-1":"unavailable"}}';
assert_json_round_trip('database service information', $databaseJson, DatabaseServiceInformationResponse::class);
$database = DatabaseServiceInformationResponse::fromJson($databaseJson);
assert_fixture($database->stateError === ['node-1' => 'unavailable'], 'Database state error map was not deserialized correctly');

$maintenanceJson = '{"dow":"Monday","time":"02:00:00","pending_updates":[]}';
assert_json_round_trip('maintenance window', $maintenanceJson, DatabaseMaintenanceWindowResponse::class);
$maintenance = DatabaseMaintenanceWindowResponse::fromJson($maintenanceJson);
assert_fixture($maintenance->time === '02:00:00', 'Maintenance time string was not preserved');

assert_fixture(StorageSortBy::Created->value === 'created', 'Generated enum wire value is incorrect');

printf("Generated model fixture checks passed: nested objects, arrays, maps, unions, nullables, time strings, and enums\n");
