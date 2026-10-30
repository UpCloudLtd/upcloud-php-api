<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;

class GetKubernetesClusterOidcKubeconfigRequest extends JsonSerializableType
{
    /**
     * @var ?string $audience Which of the issuer's configured audiences to use as the OIDC client id in the generated kubeconfig. When omitted, the issuer's first audience is used. Must match one of the issuer's audiences.
     */
    public ?string $audience;

    /**
     * @param array{
     *   audience?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audience = $values['audience'] ?? null;
    }
}
