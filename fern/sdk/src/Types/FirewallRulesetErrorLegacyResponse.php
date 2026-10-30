<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for legacy error responses from API.
 */
class FirewallRulesetErrorLegacyResponse extends JsonSerializableType
{
    /**
     * @var FirewallRulesetErrorLegacyResponseError $error Schema for legacy error response.
     */
    #[JsonProperty('error')]
    public FirewallRulesetErrorLegacyResponseError $error;

    /**
     * @param array{
     *   error: FirewallRulesetErrorLegacyResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
