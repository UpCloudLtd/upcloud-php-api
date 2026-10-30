<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchOpenid extends JsonSerializableType
{
    /**
     * @var string $clientId The ID of the OpenID Connect client configured in your IdP. Required.
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var string $clientSecret The client secret of the OpenID Connect client configured in your IdP. Required.
     */
    #[JsonProperty('client_secret')]
    public string $clientSecret;

    /**
     * @var string $connectUrl The URL of your IdP where the Security plugin can find the OpenID Connect metadata/configuration settings.
     */
    #[JsonProperty('connect_url')]
    public string $connectUrl;

    /**
     * @var bool $enabled Enables or disables OpenID Connect authentication for OpenSearch. When enabled, users can authenticate using OpenID Connect with an Identity Provider.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?string $header HTTP header name of the JWT token. Optional. Default is Authorization.
     */
    #[JsonProperty('header')]
    public ?string $header;

    /**
     * @var ?string $jwtHeader The HTTP header that stores the token. Typically the Authorization header with the Bearer schema: Authorization: Bearer <token>. Optional. Default is Authorization.
     */
    #[JsonProperty('jwt_header')]
    public ?string $jwtHeader;

    /**
     * @var ?string $jwtUrlParameter If the token is not transmitted in the HTTP header, but as an URL parameter, define the name of the parameter here. Optional.
     */
    #[JsonProperty('jwt_url_parameter')]
    public ?string $jwtUrlParameter;

    /**
     * @var ?int $refreshRateLimitCount The maximum number of unknown key IDs in the time frame. Default is 10. Optional.
     */
    #[JsonProperty('refresh_rate_limit_count')]
    public ?int $refreshRateLimitCount;

    /**
     * @var ?int $refreshRateLimitTimeWindowMs The time frame to use when checking the maximum number of unknown key IDs, in milliseconds. Optional.Default is 10000 (10 seconds).
     */
    #[JsonProperty('refresh_rate_limit_time_window_ms')]
    public ?int $refreshRateLimitTimeWindowMs;

    /**
     * @var ?string $rolesKey The key in the JSON payload that stores the user’s roles. The value of this key must be a comma-separated list of roles. Required only if you want to use roles in the JWT
     */
    #[JsonProperty('roles_key')]
    public ?string $rolesKey;

    /**
     * @var ?string $scope The scope of the identity token issued by the IdP. Optional. Default is openid profile email address phone.
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?string $subjectKey The key in the JSON payload that stores the user’s name. If not defined, the subject registered claim is used. Most IdP providers use the preferred_username claim. Optional.
     */
    #[JsonProperty('subject_key')]
    public ?string $subjectKey;

    /**
     * @param array{
     *   clientId: string,
     *   clientSecret: string,
     *   connectUrl: string,
     *   enabled: bool,
     *   header?: ?string,
     *   jwtHeader?: ?string,
     *   jwtUrlParameter?: ?string,
     *   refreshRateLimitCount?: ?int,
     *   refreshRateLimitTimeWindowMs?: ?int,
     *   rolesKey?: ?string,
     *   scope?: ?string,
     *   subjectKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->clientSecret = $values['clientSecret'];
        $this->connectUrl = $values['connectUrl'];
        $this->enabled = $values['enabled'];
        $this->header = $values['header'] ?? null;
        $this->jwtHeader = $values['jwtHeader'] ?? null;
        $this->jwtUrlParameter = $values['jwtUrlParameter'] ?? null;
        $this->refreshRateLimitCount = $values['refreshRateLimitCount'] ?? null;
        $this->refreshRateLimitTimeWindowMs = $values['refreshRateLimitTimeWindowMs'] ?? null;
        $this->rolesKey = $values['rolesKey'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->subjectKey = $values['subjectKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
