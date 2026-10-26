<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\KubernetesNodeGroup;

class CreateKubernetesClusterNodeGroupRequest extends JsonSerializableType
{
    /**
     * @var KubernetesNodeGroup $body
     */
    public KubernetesNodeGroup $body;

    /**
     * @param array{
     *   body: KubernetesNodeGroup,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
