<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

/**
 * Response schema for creating an access key.
 */
class ObjectStorage2CreateAccessKeyResponse extends JsonSerializableType
{
    /**
     * @var ?string $accessKeyId
     */
    #[JsonProperty('access_key_id')]
    public ?string $accessKeyId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $lastUsedAt
     */
    #[JsonProperty('last_used_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUsedAt;

    /**
     * @var ?string $secretAccessKey This is only returned upon creation.
     */
    #[JsonProperty('secret_access_key')]
    public ?string $secretAccessKey;

    /**
     * @var ?value-of<ObjectStorage2CreateAccessKeyResponseStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   accessKeyId?: ?string,
     *   createdAt?: ?DateTime,
     *   lastUsedAt?: ?DateTime,
     *   secretAccessKey?: ?string,
     *   status?: ?value-of<ObjectStorage2CreateAccessKeyResponseStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessKeyId = $values['accessKeyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->lastUsedAt = $values['lastUsedAt'] ?? null;
        $this->secretAccessKey = $values['secretAccessKey'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
