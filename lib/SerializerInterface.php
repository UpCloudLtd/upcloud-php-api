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
    public function serialize($data, string $format = 'json', array $context = []);

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
    public function deserialize($data, string $type, string $format = 'json', array $context = []);
}
