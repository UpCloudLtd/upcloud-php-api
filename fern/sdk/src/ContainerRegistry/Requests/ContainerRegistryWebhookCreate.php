<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

class ContainerRegistryWebhookCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $url http or https endpoint we POST to on each event. https is strongly recommended: the secret travels as a bearer token, so plain http exposes it to anyone on the path.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?array<string, string> $headers Extra HTTP headers sent with every delivery, for routing or tenancy tags. Do not set `Authorization` here: the webhook secret is already sent in it, and a second value is appended rather than replacing ours, which most receivers ignore and some reject.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'string'])]
    public ?array $headers;

    /**
     * @var ?string $secret Shared secret the receiver authenticates deliveries with. Sent as `Authorization: Bearer <secret>` on every delivery; it is not a signing key and nothing is signed. Optional: omit it, or send an empty string, and a fresh 64-character hex secret is generated. It is returned in the clear only in this response and from rotate-secret, and is stored encrypted.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @param array{
     *   name: string,
     *   url: string,
     *   headers?: ?array<string, string>,
     *   secret?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->url = $values['url'];
        $this->headers = $values['headers'] ?? null;
        $this->secret = $values['secret'] ?? null;
    }
}
