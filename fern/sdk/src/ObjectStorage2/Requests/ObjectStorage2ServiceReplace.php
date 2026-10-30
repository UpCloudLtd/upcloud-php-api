<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ObjectStorage2PropertyConfiguredStatus;
use Upcloud\Types\ObjectStorage2NetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\ObjectStorage2CustomDomainCreate;
use Upcloud\Types\ObjectStorage2StaticWebsiteConfigCreate;
use Upcloud\Types\ObjectStorage2LabelCreate;
use Upcloud\Types\ObjectStorage2PropertiesCreate;

class ObjectStorage2ServiceReplace extends JsonSerializableType
{
    /**
     * @var string $name The name of the service.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<ObjectStorage2PropertyConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var ?bool $terminationProtection Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @var ?array<ObjectStorage2NetworkCreate> $networks
     */
    #[JsonProperty('networks'), ArrayType([ObjectStorage2NetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<ObjectStorage2CustomDomainCreate> $customDomains
     */
    #[JsonProperty('custom_domains'), ArrayType([ObjectStorage2CustomDomainCreate::class])]
    public ?array $customDomains;

    /**
     * @var ?array<ObjectStorage2StaticWebsiteConfigCreate> $staticWebsites Static website configurations for this service. Array replaces all existing configurations.
     */
    #[JsonProperty('static_websites'), ArrayType([ObjectStorage2StaticWebsiteConfigCreate::class])]
    public ?array $staticWebsites;

    /**
     * @var ?array<ObjectStorage2LabelCreate> $labels
     */
    #[JsonProperty('labels'), ArrayType([ObjectStorage2LabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?ObjectStorage2PropertiesCreate $properties
     */
    #[JsonProperty('properties')]
    public ?ObjectStorage2PropertiesCreate $properties;

    /**
     * @param array{
     *   name: string,
     *   configuredStatus: value-of<ObjectStorage2PropertyConfiguredStatus>,
     *   terminationProtection?: ?bool,
     *   networks?: ?array<ObjectStorage2NetworkCreate>,
     *   customDomains?: ?array<ObjectStorage2CustomDomainCreate>,
     *   staticWebsites?: ?array<ObjectStorage2StaticWebsiteConfigCreate>,
     *   labels?: ?array<ObjectStorage2LabelCreate>,
     *   properties?: ?ObjectStorage2PropertiesCreate,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->terminationProtection = $values['terminationProtection'] ?? null;
        $this->networks = $values['networks'] ?? null;
        $this->customDomains = $values['customDomains'] ?? null;
        $this->staticWebsites = $values['staticWebsites'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }
}
