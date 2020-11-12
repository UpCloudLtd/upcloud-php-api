<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class StorageRequest extends UpcloudApiRequest
{
    /**
     * @var Storage|null
     */
    protected $storage;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct();
        $this->setStorage($data['storage'] ?? null);
    }

    /**
     * @return Storage|null
     */
    public function getStorage(): ?Storage
    {
        return $this->storage;
    }

    /**
     * @param Storage|array|null $storage
     * @return $this
     */
    public function setStorage($storage): self
    {
        if (is_array($storage)) {
            $this->storage = new Storage($storage);
        } else {
            $this->storage = $storage;
        }

        return $this;
    }
}
