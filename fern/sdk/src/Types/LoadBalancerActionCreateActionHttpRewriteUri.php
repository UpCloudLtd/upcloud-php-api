<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionCreateActionHttpRewriteUri extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionHttpRewriteUriType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var LoadBalancerActionHttpRewriteUriCreate $actionHttpRewriteUri
     */
    #[JsonProperty('action_http_rewrite_uri')]
    public LoadBalancerActionHttpRewriteUriCreate $actionHttpRewriteUri;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionHttpRewriteUriType>,
     *   actionHttpRewriteUri: LoadBalancerActionHttpRewriteUriCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionHttpRewriteUri = $values['actionHttpRewriteUri'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
