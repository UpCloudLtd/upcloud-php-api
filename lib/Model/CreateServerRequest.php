<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class CreateServerRequest extends ServerRequest
{
    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                // 'networking', 'ipAddresses',
               'license', 'planIpv4Bytes', 'planIpv6Bytes', 'state',  'tags', 'uuid'
            ]
        ]);
    }
}
