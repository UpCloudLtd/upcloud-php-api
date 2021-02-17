<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerSshKey
{
    /**
     * @var string[]|null
     */
    private $sshKey;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setSshKey($data['ssh_key'] ?? null);
    }

    /**
     * @return string[]|null
     */
    public function getSshKey(): ?array
    {
        return $this->sshKey;
    }

    /**
     * @param string[]|null $sshKey
     * @return ServerSshKey
     */
    public function setSshKey(?array $sshKey): ServerSshKey
    {
        if (is_array($sshKey)) {
            foreach ($sshKey as $item) {
                $this->sshKey[] = $item;
            }
        } else {
            $this->sshKey = $sshKey;
        }

        return $this;
    }

}
