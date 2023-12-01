<?php

declare(strict_types=1);

namespace Upcloud\ApiClient;

use Symfony\Component\Serializer\SerializerInterface as BaseSerializerInterface;

interface SerializerInterface extends BaseSerializerInterface
{
    /**
     * Serializes data in the appropriate format.
     *
     * @param mixed  $data    Any data
     * @param string $format  Format name
     * @param array  $context Options normalizers/encoders have access to
     *
     * @return string
     */
    public function serialize(mixed $data, string $format, array $context = []): string;

    /**
     * Deserializes data into the given type.
     *
     * @param mixed $data
     *
     * @param string $type
     * @param string $format
     * @param array $context
     * @return object|array
     */
    public function deserialize(mixed $data, string $type, string $format, array $context = []): object|array;
}
