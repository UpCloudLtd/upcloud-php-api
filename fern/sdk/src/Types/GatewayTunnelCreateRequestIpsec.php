<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * IPsec configuration
 */
class GatewayTunnelCreateRequestIpsec extends JsonSerializableType
{
    /**
     * @var GatewayTunnelCreateRequestIpsecAuthentication $authentication IPsec authentication configuration
     */
    #[JsonProperty('authentication')]
    public GatewayTunnelCreateRequestIpsecAuthentication $authentication;

    /**
     * @var ?array<value-of<GatewaySupportedProposalAlgorithms>> $phase1Algorithms Phase 1 proposal algorithms
     */
    #[JsonProperty('phase1_algorithms'), ArrayType(['string'])]
    public ?array $phase1Algorithms;

    /**
     * @var ?array<value-of<GatewaySupportedProposalAlgorithms>> $phase2Algorithms Phase 2 security association algorithms
     */
    #[JsonProperty('phase2_algorithms'), ArrayType(['string'])]
    public ?array $phase2Algorithms;

    /**
     * @var ?array<value-of<GatewaySupportedIntegrityAlgorithms>> $phase1IntegrityAlgorithms Phase 1 integrity algorithms
     */
    #[JsonProperty('phase1_integrity_algorithms'), ArrayType(['string'])]
    public ?array $phase1IntegrityAlgorithms;

    /**
     * @var ?array<value-of<GatewaySupportedIntegrityAlgorithms>> $phase2IntegrityAlgorithms Phase 2 integrity algorithms
     */
    #[JsonProperty('phase2_integrity_algorithms'), ArrayType(['string'])]
    public ?array $phase2IntegrityAlgorithms;

    /**
     * @var ?array<int> $phase1DhGroupNumbers Phase 1 Diffie-Hellman group numbers
     */
    #[JsonProperty('phase1_dh_group_numbers'), ArrayType(['integer'])]
    public ?array $phase1DhGroupNumbers;

    /**
     * @var ?array<int> $phase2DhGroupNumbers Phase 2 Diffie-Hellman group numbers
     */
    #[JsonProperty('phase2_dh_group_numbers'), ArrayType(['integer'])]
    public ?array $phase2DhGroupNumbers;

    /**
     * @var ?int $ikeLifetime Maximum IKE SA lifetime in seconds
     */
    #[JsonProperty('ike_lifetime')]
    public ?int $ikeLifetime;

    /**
     * @var ?int $rekeyTime IKE SA rekey time in seconds
     */
    #[JsonProperty('rekey_time')]
    public ?int $rekeyTime;

    /**
     * @var ?int $childRekeyTime IKE child SA rekey time in seconds
     */
    #[JsonProperty('child_rekey_time')]
    public ?int $childRekeyTime;

    /**
     * @var ?int $dpdDelay Delay before sending Dead Peer Detection packets if no traffic is detected, in seconds
     */
    #[JsonProperty('dpd_delay')]
    public ?int $dpdDelay;

    /**
     * @var ?int $dpdTimeout Timeout period for DPD reply before considering the peer to be dead, in seconds
     */
    #[JsonProperty('dpd_timeout')]
    public ?int $dpdTimeout;

    /**
     * @param array{
     *   authentication: GatewayTunnelCreateRequestIpsecAuthentication,
     *   phase1Algorithms?: ?array<value-of<GatewaySupportedProposalAlgorithms>>,
     *   phase2Algorithms?: ?array<value-of<GatewaySupportedProposalAlgorithms>>,
     *   phase1IntegrityAlgorithms?: ?array<value-of<GatewaySupportedIntegrityAlgorithms>>,
     *   phase2IntegrityAlgorithms?: ?array<value-of<GatewaySupportedIntegrityAlgorithms>>,
     *   phase1DhGroupNumbers?: ?array<int>,
     *   phase2DhGroupNumbers?: ?array<int>,
     *   ikeLifetime?: ?int,
     *   rekeyTime?: ?int,
     *   childRekeyTime?: ?int,
     *   dpdDelay?: ?int,
     *   dpdTimeout?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authentication = $values['authentication'];
        $this->phase1Algorithms = $values['phase1Algorithms'] ?? null;
        $this->phase2Algorithms = $values['phase2Algorithms'] ?? null;
        $this->phase1IntegrityAlgorithms = $values['phase1IntegrityAlgorithms'] ?? null;
        $this->phase2IntegrityAlgorithms = $values['phase2IntegrityAlgorithms'] ?? null;
        $this->phase1DhGroupNumbers = $values['phase1DhGroupNumbers'] ?? null;
        $this->phase2DhGroupNumbers = $values['phase2DhGroupNumbers'] ?? null;
        $this->ikeLifetime = $values['ikeLifetime'] ?? null;
        $this->rekeyTime = $values['rekeyTime'] ?? null;
        $this->childRekeyTime = $values['childRekeyTime'] ?? null;
        $this->dpdDelay = $values['dpdDelay'] ?? null;
        $this->dpdTimeout = $values['dpdTimeout'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
