<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionHttpRewritePath extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionHttpRewritePathType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionHttpRewritePathCreate $actionHttpRewritePath
     */
    #[JsonProperty('action_http_rewrite_path')]
    public LoadBalancerActionHttpRewritePathCreate $actionHttpRewritePath;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionHttpRewritePathType>,
     *   actionHttpRewritePath: LoadBalancerActionHttpRewritePathCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionHttpRewritePath = $values['actionHttpRewritePath'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
