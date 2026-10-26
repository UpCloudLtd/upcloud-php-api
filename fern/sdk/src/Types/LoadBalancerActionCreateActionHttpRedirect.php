<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\Union;

class LoadBalancerActionCreateActionHttpRedirect extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionCreateActionHttpRedirectType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var (
     *    LoadBalancerActionHttpRedirectCreateLocation
     *   |LoadBalancerActionHttpRedirectCreateScheme
     * ) $actionHttpRedirect
     */
    #[JsonProperty('action_http_redirect'), Union(LoadBalancerActionHttpRedirectCreateLocation::class, LoadBalancerActionHttpRedirectCreateScheme::class)]
    public LoadBalancerActionHttpRedirectCreateLocation|LoadBalancerActionHttpRedirectCreateScheme $actionHttpRedirect;

    /**
     * @param array{
     *   type: value-of<LoadBalancerActionCreateActionHttpRedirectType>,
     *   actionHttpRedirect: (
     *    LoadBalancerActionHttpRedirectCreateLocation
     *   |LoadBalancerActionHttpRedirectCreateScheme
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->actionHttpRedirect = $values['actionHttpRedirect'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
