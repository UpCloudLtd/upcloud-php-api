<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class TagCreateRequest extends UpcloudApiRequest
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
        parent::__construct();
        $this->tag = $data['tag'] ?? null;
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
     * @return TagCreateRequest
     */
    public function setTag($tag): TagCreateRequest
    {
        if (is_array($tag)) {
            $this->tag = new Tag($tag);
        } else {
            $this->tag = $tag;
        }

        return $this;
    }
}
