<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionUseBackend extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionUseBackendType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionUseBackendCreate $actionUseBackend
     */
    #[JsonProperty('action_use_backend')]
    public LoadBalancerActionUseBackendCreate $actionUseBackend;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionUseBackendType>,
     *   actionUseBackend: LoadBalancerActionUseBackendCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionUseBackend = $values['actionUseBackend'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
