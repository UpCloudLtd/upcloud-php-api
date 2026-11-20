<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryRepositoryDeleteResponse extends JsonSerializableType
{
    /**
     * @var string $repository
     */
    #[JsonProperty('repository')]
    public string $repository;

    /**
     * @var int $manifestsDeleted Manifests removed, including ones no tag referenced.
     */
    #[JsonProperty('manifests_deleted')]
    public int $manifestsDeleted;

    /**
     * @param array{
     *   repository: string,
     *   manifestsDeleted: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->repository = $values['repository'];
        $this->manifestsDeleted = $values['manifestsDeleted'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
