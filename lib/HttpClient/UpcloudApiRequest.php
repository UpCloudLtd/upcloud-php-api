<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\HttpClient;

use Upcloud\ApiClient\Serializer;
use Upcloud\ApiClient\SerializerInterface;

abstract class UpcloudApiRequest
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    public function __construct(?SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer ?? new Serializer;
    }

    public function __toString()
    {
        return $this->serializer->serialize($this);
    }
}
