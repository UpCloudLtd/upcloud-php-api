<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

class CreateNewTagResponse
{
    /**
     * @var Tag|null
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
     * @return Tag|null
     */
    public function getTag(): ?Tag
    {
        return $this->tag;
    }

    /**
     * @param Tag|array|null $tag
     * @return CreateNewTagResponse
     */
    public function setTag($tag): CreateNewTagResponse
    {
        if (is_array($tag)) {
            $this->tag = new Tag($tag);
        } else {
            $this->tag = $tag;
        }

        return $this;
    }
}


