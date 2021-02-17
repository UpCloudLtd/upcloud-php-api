<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Upcloud\ApiClient\HttpClient\UpcloudApiRequest;

class ModifyTagRequest extends UpcloudApiRequest
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
     * @return ModifyTagRequest
     */
    public function setTag($tag): ModifyTagRequest
    {
        if (is_array($tag)) {
            $this->tag = new Tag($tag);
        } else {
            $this->tag = $tag;
        }

        return $this;
    }
}
