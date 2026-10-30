<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsCredentialsCredentials extends JsonSerializableType
{
    /**
     * @var ?string $authProviderX509CertUrl
     */
    #[JsonProperty('auth_provider_x509_cert_url')]
    public ?string $authProviderX509CertUrl;

    /**
     * @var ?string $authUri
     */
    #[JsonProperty('auth_uri')]
    public ?string $authUri;

    /**
     * @var string $clientEmail
     */
    #[JsonProperty('client_email')]
    public string $clientEmail;

    /**
     * @var string $clientId
     */
    #[JsonProperty('client_id')]
    public string $clientId;

    /**
     * @var ?string $clientX509CertUrl
     */
    #[JsonProperty('client_x509_cert_url')]
    public ?string $clientX509CertUrl;

    /**
     * @var ?string $hmacAccessId The access ID for HMAC authentication with Google Cloud Storage
     */
    #[JsonProperty('hmac_access_id')]
    public ?string $hmacAccessId;

    /**
     * @var ?string $hmacSecret The secret key for HMAC authentication with Google Cloud Storage
     */
    #[JsonProperty('hmac_secret')]
    public ?string $hmacSecret;

    /**
     * @var string $privateKey
     */
    #[JsonProperty('private_key')]
    public string $privateKey;

    /**
     * @var string $privateKeyId
     */
    #[JsonProperty('private_key_id')]
    public string $privateKeyId;

    /**
     * @var ?string $projectId
     */
    #[JsonProperty('project_id')]
    public ?string $projectId;

    /**
     * @var ?string $tokenUri
     */
    #[JsonProperty('token_uri')]
    public ?string $tokenUri;

    /**
     * @var string $type Always service_account for credentials created in Gcloud console or CLI
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $universeDomain The universe domain. The default universe domain is googleapis.com.
     */
    #[JsonProperty('universe_domain')]
    public ?string $universeDomain;

    /**
     * @param array{
     *   clientEmail: string,
     *   clientId: string,
     *   privateKey: string,
     *   privateKeyId: string,
     *   type: string,
     *   authProviderX509CertUrl?: ?string,
     *   authUri?: ?string,
     *   clientX509CertUrl?: ?string,
     *   hmacAccessId?: ?string,
     *   hmacSecret?: ?string,
     *   projectId?: ?string,
     *   tokenUri?: ?string,
     *   universeDomain?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authProviderX509CertUrl = $values['authProviderX509CertUrl'] ?? null;
        $this->authUri = $values['authUri'] ?? null;
        $this->clientEmail = $values['clientEmail'];
        $this->clientId = $values['clientId'];
        $this->clientX509CertUrl = $values['clientX509CertUrl'] ?? null;
        $this->hmacAccessId = $values['hmacAccessId'] ?? null;
        $this->hmacSecret = $values['hmacSecret'] ?? null;
        $this->privateKey = $values['privateKey'];
        $this->privateKeyId = $values['privateKeyId'];
        $this->projectId = $values['projectId'] ?? null;
        $this->tokenUri = $values['tokenUri'] ?? null;
        $this->type = $values['type'];
        $this->universeDomain = $values['universeDomain'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
