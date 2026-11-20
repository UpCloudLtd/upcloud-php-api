<?php

namespace Upcloud\Traits;

use DateTime;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Core\Types\Date;

/**
 * A webhook without its secret. List and modify return this shape. Create and rotate-secret add secret.
 *
 * @property string $name
 * @property string $url
 * @property ?array<string, string> $headers
 * @property DateTime $createdAt
 * @property ?string $createdBy
 * @property DateTime $updatedAt
 */
trait ContainerRegistryWebhookResponse
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
}
