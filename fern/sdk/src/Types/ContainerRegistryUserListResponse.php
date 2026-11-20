<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryUserListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryUserDetailResponse> $users List of users
     */
    #[JsonProperty('users'), ArrayType([ContainerRegistryUserDetailResponse::class])]
    public array $users;

    /**
     * @var int $total Total number of users matching the query
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   users: array<ContainerRegistryUserDetailResponse>,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->users = $values['users'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
