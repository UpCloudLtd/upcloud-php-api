<?php

declare(strict_types=1);

namespace Upcloud\ApiClient;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as BaseSerializer;

class Serializer implements SerializerInterface
{
    const DEFAULT_ENCODING_OPTIONS = 15;

    public $serializer;

    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader());
        $normalizer = new ObjectNormalizer($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());

        $this->serializer = new BaseSerializer([$normalizer], [new JsonEncoder()]);
    }

    public function deserialize(mixed $data, string $type, string $format = 'json', array $context = []): object|array
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    public function serialize(mixed $data, string $format = 'json', array $context = []): string
    {
        return $this->serializer->serialize($data, $format, array_merge([
            'json_encode_options' => self::DEFAULT_ENCODING_OPTIONS,
            ObjectNormalizer::SKIP_NULL_VALUES => true
        ], $context));
    }
}
