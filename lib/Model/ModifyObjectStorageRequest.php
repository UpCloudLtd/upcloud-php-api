<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ModifyObjectStorageRequest extends ObjectStorageRequest
{
    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'uuid', 'name', 'zone', 'state', 'url', 'created', 'usedSpace'
            ]
        ]);
    }
}
