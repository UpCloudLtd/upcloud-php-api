<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

/**
 * Schema for a service component response.
 */
class DatabaseServiceComponentResponse extends JsonSerializableType
{
    /**
     * @var ?string $component The name of the service component.
     */
    #[JsonProperty('component')]
    public ?string $component;

    /**
     * @var ?string $host The hostname or IP address of the service component.
     */
    #[JsonProperty('host')]
    public ?string $host;

    /**
     * @var ?int $port The port number of the service component.
     */
    #[JsonProperty('port')]
    public ?int $port;

    /**
     * @var ?string $route The route to access the service component.
     */
    #[JsonProperty('route')]
    public ?string $route;

    /**
     * @var ?string $usage The usage of the service component.
     */
    #[JsonProperty('usage')]
    public ?string $usage;

    /**
     * @var ?bool $ssl Indicates if SSL is enabled for the service component.
     */
    #[JsonProperty('ssl')]
    public ?bool $ssl;

    /**
     * @param array{
     *   component?: ?string,
     *   host?: ?string,
     *   port?: ?int,
     *   route?: ?string,
     *   usage?: ?string,
     *   ssl?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->component = $values['component'] ?? null;
        $this->host = $values['host'] ?? null;
        $this->port = $values['port'] ?? null;
        $this->route = $values['route'] ?? null;
        $this->usage = $values['usage'] ?? null;
        $this->ssl = $values['ssl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
