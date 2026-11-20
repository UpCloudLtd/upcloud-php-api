<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryWebhookListResponse extends JsonSerializableType
{
    /**
     * @var array<ContainerRegistryWebhookResponse> $webhooks Webhooks configured for the service. Secrets are omitted.
     */
    #[JsonProperty('webhooks'), ArrayType([ContainerRegistryWebhookResponse::class])]
    public array $webhooks;

    /**
     * @var int $limit Maximum number of webhooks the service's plan allows.
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @param array{
     *   webhooks: array<ContainerRegistryWebhookResponse>,
     *   limit: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->webhooks = $values['webhooks'];
        $this->limit = $values['limit'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
