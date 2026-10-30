<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Maps a token claim to an extra user attribute using a CEL expression.
 */
class KubernetesExtraMapping extends JsonSerializableType
{
    /**
     * @var string $key Domain-prefixed, lowercase key for the extra attribute, e.g. example.org/foo.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $valueExpression CEL expression producing the extra attribute value (string or string array).
     */
    #[JsonProperty('value_expression')]
    public string $valueExpression;

    /**
     * @param array{
     *   key: string,
     *   valueExpression: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->valueExpression = $values['valueExpression'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
