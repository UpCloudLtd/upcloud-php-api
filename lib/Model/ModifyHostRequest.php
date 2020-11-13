<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class ModifyHostRequest extends UpcloudApiRequest
{
    /**
     * @var Host|null
     */
    private $host;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setHost($data['host'] ?? null);
    }

    /**
     * @return Host|null
     */
    public function getHost(): ?Host
    {
        return $this->host;
    }

    /**
     * @param Host|array|null $host
     * @return ModifyHostRequest
     */
    public function setHost($host): ModifyHostRequest
    {
        if (is_array($host)) {
            $this->host = new Host($host);
        } else {
            $this->host = $host;
        }

        return $this;
    }

    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'id', 'zone', 'windows_enabled', 'stats'
            ]
        ]);
    }
}
