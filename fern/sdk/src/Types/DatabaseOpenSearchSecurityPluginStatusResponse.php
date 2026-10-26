<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * OpenSearch security plugin status response
 */
class DatabaseOpenSearchSecurityPluginStatusResponse extends JsonSerializableType
{
    /**
     * @var ?bool $securityPluginAdminEnabled Indicates if the security plugin admin is enabled
     */
    #[JsonProperty('security_plugin_admin_enabled')]
    public ?bool $securityPluginAdminEnabled;

    /**
     * @var ?bool $securityPluginAvailable Indicates if the security plugin is available
     */
    #[JsonProperty('security_plugin_available')]
    public ?bool $securityPluginAvailable;

    /**
     * @var ?bool $securityPluginEnabled Indicates if the security plugin is enabled
     */
    #[JsonProperty('security_plugin_enabled')]
    public ?bool $securityPluginEnabled;

    /**
     * @param array{
     *   securityPluginAdminEnabled?: ?bool,
     *   securityPluginAvailable?: ?bool,
     *   securityPluginEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->securityPluginAdminEnabled = $values['securityPluginAdminEnabled'] ?? null;
        $this->securityPluginAvailable = $values['securityPluginAvailable'] ?? null;
        $this->securityPluginEnabled = $values['securityPluginEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
