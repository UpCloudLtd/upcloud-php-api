<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class ServerTags
{
    /**
     * @var string[]|null
     */
    private $tag;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setTag($data['tag'] ?? null);
    }

    /**
     * @return string[]|null
     */
    public function getTag(): ?array
    {
        return $this->tag;
    }

    /**
     * @param string[]|null $tag
     * @return ServerTags
     */
    public function setTag(?array $tag): ServerTags
    {
        if (is_array($tag)) {
            foreach ($tag as $item) {
                $this->tag[] = $item;
            }
        } else {
            $this->tag = $tag;
        }

        return $this;
    }
}


