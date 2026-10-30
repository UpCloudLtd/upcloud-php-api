<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Traits\LoadBalancerMatchStringResponse;
use Upcloud\Core\Json\JsonProperty;

/**
 * Extends MatchString with an additional 'name' parameter, used for matchers that require a key-value pair (e.g., matching headers, cookies, or URL parameters).
 */
class LoadBalancerMatchStringWithArgResponse extends JsonSerializableType
{
    use LoadBalancerMatchStringResponse;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   method?: ?value-of<LoadBalancerMatchStringResponseMethod>,
     *   value?: ?string,
     *   ignoreCase?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->method = $values['method'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->ignoreCase = $values['ignoreCase'] ?? null;
        $this->name = $values['name'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
