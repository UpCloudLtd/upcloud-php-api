<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class TagListResponse
{
    /**
     * @var TagListResponseTags|null
     */
    private $tags;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->tags = $data['tags'] ?? null;
    }

    /**
     * @return TagListResponseTags|null
     */
    public function getTags(): ?TagListResponseTags
    {
        return $this->tags;
    }

    /**
     * @param TagListResponseTags|array|null $tags
     * @return TagListResponse
     */
    public function setTags($tags): TagListResponse
    {
        if (is_array($tags)) {
            $this->tags = new TagListResponseTags($tags);
        } else {
            $this->tags = $tags;
        }

        return $this;
    }
}


