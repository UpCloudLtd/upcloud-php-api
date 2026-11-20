<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryRepositoryListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryRepositoryListResponseRepositoriesItem> $repositories Repositories on this page, sorted by name. Each entry describes the newest tag. A repository can hold other kinds under other tags. On the OCI catalog fallback and when search cannot return the page, each entry carries only its name and an empty artifact_type.
     */
    #[JsonProperty('repositories'), ArrayType([ContainerRegistryRepositoryListResponseRepositoriesItem::class])]
    public array $repositories;

    /**
     * @var ?int $totalCount Number of repositories in the registry. Present when search returns the page, including when that number is 0, so a client stops when offset reaches it. Omitted when search is down. The name-only page and the OCI catalog page do not know the registry total, and a page-sized count would end paging after the first page. Follow next_link when the OCI catalog sets it.
     */
    #[JsonProperty('total_count')]
    public ?int $totalCount;

    /**
     * @var ?string $nextLink Link to the next page of results
     */
    #[JsonProperty('next_link')]
    public ?string $nextLink;

    /**
     * @param array{
     *   repositories: array<ContainerRegistryRepositoryListResponseRepositoriesItem>,
     *   totalCount?: ?int,
     *   nextLink?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->repositories = $values['repositories'];
        $this->totalCount = $values['totalCount'] ?? null;
        $this->nextLink = $values['nextLink'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
