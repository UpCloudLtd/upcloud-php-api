<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchOpensearchDashboards extends JsonSerializableType
{
    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?int $maxOldSpaceSize Limits the maximum amount of memory (in MiB) the OpenSearch Dashboards process can use. This sets the max_old_space_size option of the nodejs running the OpenSearch Dashboards. Note: the memory reserved by OpenSearch Dashboards is not available for OpenSearch.
     */
    #[JsonProperty('max_old_space_size')]
    public ?int $maxOldSpaceSize;

    /**
     * @var ?bool $multipleDataSourceEnabled
     */
    #[JsonProperty('multiple_data_source_enabled')]
    public ?bool $multipleDataSourceEnabled;

    /**
     * @var ?int $opensearchRequestTimeout
     */
    #[JsonProperty('opensearch_request_timeout')]
    public ?int $opensearchRequestTimeout;

    /**
     * @var ?bool $sessionKeepalive
     */
    #[JsonProperty('session_keepalive')]
    public ?bool $sessionKeepalive;

    /**
     * @var ?string $sessionTtl Defines the time-to-live (TTL) for user sessions. The value should be a time value with unit, e.g. 1m, 5s, 1h, 3d, 100ms. Default is 1 hour.
     */
    #[JsonProperty('session_ttl')]
    public ?string $sessionTtl;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   maxOldSpaceSize?: ?int,
     *   multipleDataSourceEnabled?: ?bool,
     *   opensearchRequestTimeout?: ?int,
     *   sessionKeepalive?: ?bool,
     *   sessionTtl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->maxOldSpaceSize = $values['maxOldSpaceSize'] ?? null;
        $this->multipleDataSourceEnabled = $values['multipleDataSourceEnabled'] ?? null;
        $this->opensearchRequestTimeout = $values['opensearchRequestTimeout'] ?? null;
        $this->sessionKeepalive = $values['sessionKeepalive'] ?? null;
        $this->sessionTtl = $values['sessionTtl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
