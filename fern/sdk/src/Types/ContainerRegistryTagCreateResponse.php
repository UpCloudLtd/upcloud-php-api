<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryTagCreateResponse extends JsonSerializableType
{
    /**
     * @var string $repository
     */
    #[JsonProperty('repository')]
    public string $repository;

    /**
     * @var string $tag
     */
    #[JsonProperty('tag')]
    public string $tag;

    /**
     * @var string $digest
     */
    #[JsonProperty('digest')]
    public string $digest;

    /**
     * @param array{
     *   repository: string,
     *   tag: string,
     *   digest: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->repository = $values['repository'];
        $this->tag = $values['tag'];
        $this->digest = $values['digest'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
