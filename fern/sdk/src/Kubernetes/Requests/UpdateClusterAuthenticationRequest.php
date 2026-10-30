<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\KubernetesAuthenticationIssuerConfig;

class UpdateClusterAuthenticationRequest extends JsonSerializableType
{
    /**
     * @var KubernetesAuthenticationIssuerConfig $body
     */
    public KubernetesAuthenticationIssuerConfig $body;

    /**
     * @param array{
     *   body: KubernetesAuthenticationIssuerConfig,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
