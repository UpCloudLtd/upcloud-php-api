<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class TagListResponseTags
{
    /**
     * @var Tag[]|null
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
     * @return Tag[]|null
     */
    public function getTag(): ?array
    {
        return $this->tag;
    }

    /**
     * @param Tag[]|null $tag
     * @return TagListResponseTags
     */
    public function setTag(?array $tag): TagListResponseTags
    {
        if (is_array($tag)) {
            foreach ($tag as $item) {
                $this->tag[] = new Tag($item);
            }
        } else {
            $this->tag = $tag;
        }

        return $this;
    }
}


