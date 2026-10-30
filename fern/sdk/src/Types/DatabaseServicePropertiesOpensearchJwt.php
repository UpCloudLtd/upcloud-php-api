<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchJwt extends JsonSerializableType
{
    /**
     * @var bool $enabled Enables or disables JWT-based authentication for OpenSearch. When enabled, users can authenticate using JWT tokens.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?int $jwtClockSkewToleranceSeconds The maximum allowed time difference in seconds between the JWT issuer's clock and the OpenSearch server's clock. This helps prevent token validation failures due to minor time synchronization issues.
     */
    #[JsonProperty('jwt_clock_skew_tolerance_seconds')]
    public ?int $jwtClockSkewToleranceSeconds;

    /**
     * @var ?string $jwtHeader The HTTP header name where the JWT token is transmitted. Typically 'Authorization' for Bearer tokens.
     */
    #[JsonProperty('jwt_header')]
    public ?string $jwtHeader;

    /**
     * @var ?string $jwtUrlParameter If the JWT token is transmitted as a URL parameter instead of an HTTP header, specify the parameter name here.
     */
    #[JsonProperty('jwt_url_parameter')]
    public ?string $jwtUrlParameter;

    /**
     * @var ?string $requiredAudience If specified, the JWT must contain an 'aud' claim that matches this value. This provides additional security by ensuring the JWT was issued for the expected audience.
     */
    #[JsonProperty('required_audience')]
    public ?string $requiredAudience;

    /**
     * @var ?string $requiredIssuer If specified, the JWT must contain an 'iss' claim that matches this value. This provides additional security by ensuring the JWT was issued by the expected issuer.
     */
    #[JsonProperty('required_issuer')]
    public ?string $requiredIssuer;

    /**
     * @var ?string $rolesKey The key in the JWT payload that contains the user's roles. If specified, roles will be extracted from the JWT for authorization.
     */
    #[JsonProperty('roles_key')]
    public ?string $rolesKey;

    /**
     * @var string $signingKey The secret key used to sign and verify JWT tokens. This should be a secure, randomly generated key HMAC key or public RSA/ECDSA key.
     */
    #[JsonProperty('signing_key')]
    public string $signingKey;

    /**
     * @var ?string $subjectKey The key in the JWT payload that contains the user's subject identifier. If not specified, the 'sub' claim is used by default.
     */
    #[JsonProperty('subject_key')]
    public ?string $subjectKey;

    /**
     * @param array{
     *   enabled: bool,
     *   signingKey: string,
     *   jwtClockSkewToleranceSeconds?: ?int,
     *   jwtHeader?: ?string,
     *   jwtUrlParameter?: ?string,
     *   requiredAudience?: ?string,
     *   requiredIssuer?: ?string,
     *   rolesKey?: ?string,
     *   subjectKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->jwtClockSkewToleranceSeconds = $values['jwtClockSkewToleranceSeconds'] ?? null;
        $this->jwtHeader = $values['jwtHeader'] ?? null;
        $this->jwtUrlParameter = $values['jwtUrlParameter'] ?? null;
        $this->requiredAudience = $values['requiredAudience'] ?? null;
        $this->requiredIssuer = $values['requiredIssuer'] ?? null;
        $this->rolesKey = $values['rolesKey'] ?? null;
        $this->signingKey = $values['signingKey'];
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
