<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\KubernetesAuthenticationIssuerConfig;

class SetClusterAuthenticationRequest extends JsonSerializableType
{
    /**
     * @var array<KubernetesAuthenticationIssuerConfig> $body
     */
    public array $body;

    /**
     * @param array{
     *   body: array<KubernetesAuthenticationIssuerConfig>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
