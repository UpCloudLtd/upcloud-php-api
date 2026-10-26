<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Permission document defining access rights for a sub-account to a specific resource.
 */
class PermissionDocument extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $options Target specific options.
     */
    #[JsonProperty('options'), ArrayType(['string' => 'mixed'])]
    public ?array $options;

    /**
     * @var string $targetIdentifier
     */
    #[JsonProperty('target_identifier')]
    public string $targetIdentifier;

    /**
     * @var value-of<PermissionTargetType> $targetType
     */
    #[JsonProperty('target_type')]
    public string $targetType;

    /**
     * @var string $user
     */
    #[JsonProperty('user')]
    public string $user;

    /**
     * @param array{
     *   targetIdentifier: string,
     *   targetType: value-of<PermissionTargetType>,
     *   user: string,
     *   options?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->options = $values['options'] ?? null;
        $this->targetIdentifier = $values['targetIdentifier'];
        $this->targetType = $values['targetType'];
        $this->user = $values['user'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
