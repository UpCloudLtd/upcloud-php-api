<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ModifyServerRequest extends ServerRequest
{
    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'avoidHost', 'host', 'networking', 'loginUser', 'ipAddresses', 'license', 'metadata',
                'passwordDelivery', 'planIpv4Bytes', 'planIpv6Bytes', 'state', 'storageDevices',
                'tags', 'uuid', 'userData', 'zone'
            ]
        ]);
    }
}


