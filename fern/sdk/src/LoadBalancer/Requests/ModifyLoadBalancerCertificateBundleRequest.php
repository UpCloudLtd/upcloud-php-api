<?php

namespace Upcloud\LoadBalancer\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Types\LoadBalancerCertificateBundleManualModify;
use Upcloud\Types\LoadBalancerCertificateBundleDynamicModify;
use Upcloud\Types\LoadBalancerCertificateBundleAuthorityModify;

class ModifyLoadBalancerCertificateBundleRequest extends JsonSerializableType
{
    /**
     * @var (
     *    LoadBalancerCertificateBundleManualModify
     *   |LoadBalancerCertificateBundleDynamicModify
     *   |LoadBalancerCertificateBundleAuthorityModify
     * ) $body
     */
    public LoadBalancerCertificateBundleManualModify|LoadBalancerCertificateBundleDynamicModify|LoadBalancerCertificateBundleAuthorityModify $body;

    /**
     * @param array{
     *   body: (
     *    LoadBalancerCertificateBundleManualModify
     *   |LoadBalancerCertificateBundleDynamicModify
     *   |LoadBalancerCertificateBundleAuthorityModify
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
