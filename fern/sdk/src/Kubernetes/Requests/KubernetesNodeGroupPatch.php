<?php

namespace Upcloud\Kubernetes\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class KubernetesNodeGroupPatch extends JsonSerializableType
{
    /**
     * @var int $count
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @param array{
     *   count: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
    }
}
