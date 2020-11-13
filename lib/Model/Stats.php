<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;


class Stats
{
    /**
     * @var Stat[]|null
     */
    private $stat;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setStat($data['stat'] ?? null);
    }

    /**
     * @return Stat[]|null
     */
    public function getStat(): ?array
    {
        return $this->stat;
    }

    /**
     * @param Stat[]|array|null $stat
     * @return Stats
     */
    public function setStat(?array $stat): Stats
    {
        if (is_array($stat)) {
            foreach ($stat as $item) {
                $this->stat[] = new Stat($item);
            }
        } else {
            $this->stat = $stat;
        }

        return $this;
    }
}
