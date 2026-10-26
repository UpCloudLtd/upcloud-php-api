<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for service details, including UUID, name, and endpoints.
 */
class ObjectStorage2ServiceDetailResponse extends JsonSerializableType
{
    /**
     * @var ?string $uuid
     */
    #[JsonProperty('uuid')]
    public ?string $uuid;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?value-of<ObjectStorage2ServiceDetailResponseConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public ?string $configuredStatus;

    /**
     * @var ?value-of<ObjectStorage2ServiceDetailResponseOperationalState> $operationalState
     */
    #[JsonProperty('operational_state')]
    public ?string $operationalState;

    /**
     * @var ?array<ObjectStorage2NetworkDetailResponse> $networks
     */
    #[JsonProperty('networks'), ArrayType([ObjectStorage2NetworkDetailResponse::class])]
    public ?array $networks;

    /**
     * @var ?ObjectStorage2ServiceDetailResponseUsage $usage
     */
    #[JsonProperty('usage')]
    public ?ObjectStorage2ServiceDetailResponseUsage $usage;

    /**
     * @var ?array<ObjectStorage2LabelDetailResponse> $labels
     */
    #[JsonProperty('labels'), ArrayType([ObjectStorage2LabelDetailResponse::class])]
    public ?array $labels;

    /**
     * @var ?array<ObjectStorage2UserDetailResponse> $users
     */
    #[JsonProperty('users'), ArrayType([ObjectStorage2UserDetailResponse::class])]
    public ?array $users;

    /**
     * @var ?array<ObjectStorage2EndpointResponse> $endpoints
     */
    #[JsonProperty('endpoints'), ArrayType([ObjectStorage2EndpointResponse::class])]
    public ?array $endpoints;

    /**
     * @var ?array<ObjectStorage2CustomDomainDetailResponse> $customDomains
     */
    #[JsonProperty('custom_domains'), ArrayType([ObjectStorage2CustomDomainDetailResponse::class])]
    public ?array $customDomains;

    /**
     * @var ?array<ObjectStorage2StaticWebsiteConfig> $staticWebsites Static website configurations for this service
     */
    #[JsonProperty('static_websites'), ArrayType([ObjectStorage2StaticWebsiteConfig::class])]
    public ?array $staticWebsites;

    /**
     * @var ?array<ObjectStorage2ServiceDetailResponseStateMessagesItem> $stateMessages
     */
    #[JsonProperty('state_messages'), ArrayType([ObjectStorage2ServiceDetailResponseStateMessagesItem::class])]
    public ?array $stateMessages;

    /**
     * @var ?bool $terminationProtection
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   uuid?: ?string,
     *   name?: ?string,
     *   region?: ?string,
     *   configuredStatus?: ?value-of<ObjectStorage2ServiceDetailResponseConfiguredStatus>,
     *   operationalState?: ?value-of<ObjectStorage2ServiceDetailResponseOperationalState>,
     *   networks?: ?array<ObjectStorage2NetworkDetailResponse>,
     *   usage?: ?ObjectStorage2ServiceDetailResponseUsage,
     *   labels?: ?array<ObjectStorage2LabelDetailResponse>,
     *   users?: ?array<ObjectStorage2UserDetailResponse>,
     *   endpoints?: ?array<ObjectStorage2EndpointResponse>,
     *   customDomains?: ?array<ObjectStorage2CustomDomainDetailResponse>,
     *   staticWebsites?: ?array<ObjectStorage2StaticWebsiteConfig>,
     *   stateMessages?: ?array<ObjectStorage2ServiceDetailResponseStateMessagesItem>,
     *   terminationProtection?: ?bool,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uuid = $values['uuid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->configuredStatus = $values['configuredStatus'] ?? null;
        $this->operationalState = $values['operationalState'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->usage = $values['usage'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->users = $values['users'] ?? null;
        $this->endpoints = $values['endpoints'] ?? null;
        $this->customDomains = $values['customDomains'] ?? null;
        $this->staticWebsites = $values['staticWebsites'] ?? null;
        $this->stateMessages = $values['stateMessages'] ?? null;
        $this->terminationProtection = $values['terminationProtection'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
