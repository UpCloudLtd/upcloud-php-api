<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Represents a load balancer rule that defines how incoming traffic is matched and processed by a frontend, including priority, matching conditions, and actions to perform.
 */
class LoadBalancerRule extends JsonSerializableType
{
    /**
     * @var string $name Human-readable name assigned to the routing rule.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $priority Priority order for rule evaluation, where lower values indicate higher priority.
     */
    #[JsonProperty('priority')]
    public int $priority;

    /**
     * @var value-of<LoadBalancerRuleMatchingCondition> $matchingCondition Logical operator determining how multiple matchers are combined (and/or).
     */
    #[JsonProperty('matching_condition')]
    public string $matchingCondition;

    /**
     * @var array<LoadBalancerMatcherResponse> $matchers List of conditions that incoming requests must satisfy for this rule to apply.
     */
    #[JsonProperty('matchers'), ArrayType([LoadBalancerMatcherResponse::class])]
    public array $matchers;

    /**
     * @var array<LoadBalancerActionResponse> $actions List of actions to execute when the rule matches an incoming request.
     */
    #[JsonProperty('actions'), ArrayType([LoadBalancerActionResponse::class])]
    public array $actions;

    /**
     * @var DateTime $createdAt Timestamp when the rule was created (RFC 3339 format).
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Timestamp when the rule was last updated (RFC 3339 format).
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   name: string,
     *   priority: int,
     *   matchingCondition: value-of<LoadBalancerRuleMatchingCondition>,
     *   matchers: array<LoadBalancerMatcherResponse>,
     *   actions: array<LoadBalancerActionResponse>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->priority = $values['priority'];
        $this->matchingCondition = $values['matchingCondition'];
        $this->matchers = $values['matchers'];
        $this->actions = $values['actions'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
