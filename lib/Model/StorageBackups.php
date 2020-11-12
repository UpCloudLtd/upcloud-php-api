<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class StorageBackups
{
    /**
     * @var string[]|null
     */
    private $backup;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setBackup($data['backup'] ?? null);
    }

    /**
     * @return string[]|null
     */
    public function getBackup(): ?array
    {
        return $this->backup;
    }

    /**
     * @param string[]|null $backup
     * @return StorageBackups
     */
    public function setBackup(?array $backup): StorageBackups
    {
        if (is_array($backup)) {
            foreach ($backup as $item) {
                $this->backup[] = $item;
            }
        } else {
            $this->backup = $backup;
        }

        return $this;
    }
}


