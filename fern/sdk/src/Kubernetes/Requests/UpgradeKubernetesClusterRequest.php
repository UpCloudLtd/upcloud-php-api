<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\KubernetesClusterAvailableUpgradesPost;

class UpgradeKubernetesClusterRequest extends JsonSerializableType
{
    /**
     * @var KubernetesClusterAvailableUpgradesPost $body
     */
    public KubernetesClusterAvailableUpgradesPost $body;

    /**
     * @param array{
     *   body: KubernetesClusterAvailableUpgradesPost,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
