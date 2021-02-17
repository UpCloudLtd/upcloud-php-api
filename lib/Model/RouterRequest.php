<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class RouterRequest extends UpcloudApiRequest
{
    /**
     * @var Router|null
     */
    private $router;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setRouter($data['router'] ?? null);
    }

    /**
     * @return Router|null
     */
    public function getRouter(): ?Router
    {
        return $this->router;
    }

    /**
     * @param Router|array|null $router
     * @return RouterRequest
     */
    public function setRouter($router): RouterRequest
    {
        if (is_array($router)) {
            $this->router = new Router($router);
        } else {
            $this->router = $router;
        }

        return $this;
    }

    public function __toString()
    {
        return $this->serializer->serialize($this, 'json', [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'attachedNetworks', 'uuid', 'type',
            ]
        ]);
    }
}
