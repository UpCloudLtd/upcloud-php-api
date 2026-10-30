<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LoadBalancerMatcherCreateMatchNumMembersUp extends JsonSerializableType
{
    /**
     * @var value-of<LoadBalancerMatcherCreateMatchNumMembersUpType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $inverse Inverse rule
     */
    #[JsonProperty('inverse')]
    public ?bool $inverse;

    /**
     * @var LoadBalancerMatcherBackendCreateRangeEnd $matchNumMembersUp
     */
    #[JsonProperty('match_num_members_up')]
    public LoadBalancerMatcherBackendCreateRangeEnd $matchNumMembersUp;

    /**
     * @param array{
     *   type: value-of<LoadBalancerMatcherCreateMatchNumMembersUpType>,
     *   matchNumMembersUp: LoadBalancerMatcherBackendCreateRangeEnd,
     *   inverse?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->inverse = $values['inverse'] ?? null;
        $this->matchNumMembersUp = $values['matchNumMembersUp'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
