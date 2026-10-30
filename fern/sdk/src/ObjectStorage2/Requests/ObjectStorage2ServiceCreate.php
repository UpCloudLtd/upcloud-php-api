<?php

namespace Upcloud\ObjectStorage2\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Types\ObjectStorage2PropertyConfiguredStatus;
use Upcloud\Types\ObjectStorage2NetworkCreate;
use Upcloud\Core\Types\ArrayType;
use Upcloud\Types\ObjectStorage2CustomDomainCreate;
use Upcloud\Types\ObjectStorage2LabelCreate;
use Upcloud\Types\ObjectStorage2PropertiesCreate;

class ObjectStorage2ServiceCreate extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var value-of<ObjectStorage2PropertyConfiguredStatus> $configuredStatus
     */
    #[JsonProperty('configured_status')]
    public string $configuredStatus;

    /**
     * @var ?array<ObjectStorage2NetworkCreate> $networks Networks to attach to the service. Private networks must reside in the same region as the object storage.
     */
    #[JsonProperty('networks'), ArrayType([ObjectStorage2NetworkCreate::class])]
    public ?array $networks;

    /**
     * @var ?array<ObjectStorage2CustomDomainCreate> $customDomains Custom domains to attach to the service.
     */
    #[JsonProperty('custom_domains'), ArrayType([ObjectStorage2CustomDomainCreate::class])]
    public ?array $customDomains;

    /**
     * @var ?array<ObjectStorage2LabelCreate> $labels Labels for classifying the service.
     */
    #[JsonProperty('labels'), ArrayType([ObjectStorage2LabelCreate::class])]
    public ?array $labels;

    /**
     * @var ?ObjectStorage2PropertiesCreate $properties
     */
    #[JsonProperty('properties')]
    public ?ObjectStorage2PropertiesCreate $properties;

    /**
     * @var ?bool $terminationProtection Enables or disables termination protection for the service. When enabled, the service cannot be deleted or powered down unless this is disabled first.
     */
    #[JsonProperty('termination_protection')]
    public ?bool $terminationProtection;

    /**
     * @param array{
     *   name: string,
     *   region: string,
     *   configuredStatus: value-of<ObjectStorage2PropertyConfiguredStatus>,
     *   networks?: ?array<ObjectStorage2NetworkCreate>,
     *   customDomains?: ?array<ObjectStorage2CustomDomainCreate>,
     *   labels?: ?array<ObjectStorage2LabelCreate>,
     *   properties?: ?ObjectStorage2PropertiesCreate,
     *   terminationProtection?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->region = $values['region'];
        $this->configuredStatus = $values['configuredStatus'];
        $this->networks = $values['networks'] ?? null;
        $this->customDomains = $values['customDomains'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->terminationProtection = $values['terminationProtection'] ?? null;
    }
}
