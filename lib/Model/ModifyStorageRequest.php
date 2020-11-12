<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class ModifyStorageRequest extends StorageRequest
{
    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'access',  'backups', 'license', 'servers', 'state',
                'tier', 'type', 'uuid', 'zone', 'origin', 'created'
            ]
        ]);
    }
}
