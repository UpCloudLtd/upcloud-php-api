<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchSaml extends JsonSerializableType
{
    /**
     * @var bool $enabled Enables or disables SAML-based authentication for OpenSearch. When enabled, users can authenticate using SAML with an Identity Provider.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var string $idpEntityId The unique identifier for the Identity Provider (IdP) entity that is used for SAML authentication. This value is typically provided by the IdP.
     */
    #[JsonProperty('idp_entity_id')]
    public string $idpEntityId;

    /**
     * @var string $idpMetadataUrl The URL of the SAML metadata for the Identity Provider (IdP). This is used to configure SAML-based authentication with the IdP.
     */
    #[JsonProperty('idp_metadata_url')]
    public string $idpMetadataUrl;

    /**
     * @var ?string $idpPemtrustedcasContent This parameter specifies the PEM-encoded root certificate authority (CA) content for the SAML identity provider (IdP) server verification. The root CA content is used to verify the SSL/TLS certificate presented by the server.
     */
    #[JsonProperty('idp_pemtrustedcas_content')]
    public ?string $idpPemtrustedcasContent;

    /**
     * @var ?string $rolesKey Optional. Specifies the attribute in the SAML response where role information is stored, if available. Role attributes are not required for SAML authentication, but can be included in SAML assertions by most Identity Providers (IdPs) to determine user access levels or permissions.
     */
    #[JsonProperty('roles_key')]
    public ?string $rolesKey;

    /**
     * @var string $spEntityId The unique identifier for the Service Provider (SP) entity that is used for SAML authentication. This value is typically provided by the SP.
     */
    #[JsonProperty('sp_entity_id')]
    public string $spEntityId;

    /**
     * @var ?string $subjectKey Optional. Specifies the attribute in the SAML response where the subject identifier is stored. If not configured, the NameID attribute is used by default.
     */
    #[JsonProperty('subject_key')]
    public ?string $subjectKey;

    /**
     * @param array{
     *   enabled: bool,
     *   idpEntityId: string,
     *   idpMetadataUrl: string,
     *   spEntityId: string,
     *   idpPemtrustedcasContent?: ?string,
     *   rolesKey?: ?string,
     *   subjectKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->idpEntityId = $values['idpEntityId'];
        $this->idpMetadataUrl = $values['idpMetadataUrl'];
        $this->idpPemtrustedcasContent = $values['idpPemtrustedcasContent'] ?? null;
        $this->rolesKey = $values['rolesKey'] ?? null;
        $this->spEntityId = $values['spEntityId'];
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
