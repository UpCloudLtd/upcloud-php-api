<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * A webhook without its secret. List and modify return this shape. Create and rotate-secret add secret.
 */
class ContainerRegistryWebhookResponse extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $url Endpoint that receives every registry event.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?array<string, string> $headers Extra headers sent with every delivery.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'string'])]
    public ?array $headers;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $createdBy
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   url: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   headers?: ?array<string, string>,
     *   createdBy?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->url = $values['url'];
        $this->headers = $values['headers'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->createdBy = $values['createdBy'] ?? null;
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
