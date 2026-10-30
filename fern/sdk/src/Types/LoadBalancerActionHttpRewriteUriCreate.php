<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Rewrite HTTP request URI using regex pattern
 */
class LoadBalancerActionHttpRewriteUriCreate extends JsonSerializableType
{
    /**
     * @var string $matchPattern Regex pattern to match against the full URI. Use empty string "" to match the entire URI (defaults to ^(.*)$)
     */
    #[JsonProperty('match_pattern')]
    public string $matchPattern;

    /**
     * @var string $rewriteTo Replacement pattern (can use capture groups like \1 if match_pattern is provided)
     */
    #[JsonProperty('rewrite_to')]
    public string $rewriteTo;

    /**
     * @param array{
     *   matchPattern: string,
     *   rewriteTo: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->matchPattern = $values['matchPattern'];
        $this->rewriteTo = $values['rewriteTo'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
