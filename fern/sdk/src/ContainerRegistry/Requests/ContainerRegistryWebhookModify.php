<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryWebhookModify extends JsonSerializableType
{
    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<string, string> $headers Replaces the existing headers map outright when present. Do not set `Authorization` here: the webhook secret is already sent in it, and a second value is appended rather than replacing ours.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'string'])]
    public ?array $headers;

    /**
     * @param array{
     *   url?: ?string,
     *   headers?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
        $this->headers = $values['headers'] ?? null;
    }
}
