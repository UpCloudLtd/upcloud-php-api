<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\ContainerRegistryWebhookResponse;
use Upcloud\Core\Json\JsonProperty;
use DateTime;

/**
 * Webhook as returned by create and rotate-secret. secret is not returned by list or modify.
 */
class ContainerRegistryWebhookWithSecretResponse extends JsonSerializableType
{
    use ContainerRegistryWebhookResponse;

    /**
     * @var string $secret Bearer token sent as Authorization on each delivery. Nothing is signed. When create omits secret, this is a generated 64-character hex string. Rotate-secret always generates one. It is not returned again.
     */
    #[JsonProperty('secret')]
    public string $secret;

    /**
     * @param array{
     *   name: string,
     *   url: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   secret: string,
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
        $this->secret = $values['secret'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
