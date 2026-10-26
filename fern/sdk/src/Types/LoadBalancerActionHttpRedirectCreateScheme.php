<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerActionHttpRedirectCreateScheme extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerActionHttpRedirectCreateSchemeScheme> $scheme URL Schemes
     */
    #[JsonProperty('scheme')]
    public string $scheme;

    /**
     * @var ?int $status HTTP Status code
     */
    #[JsonProperty('status')]
    public ?int $status;

    /**
     * @param array{
     *   scheme: value-of<LoadBalancerActionHttpRedirectCreateSchemeScheme>,
     *   status?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->scheme = $values['scheme'];
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
