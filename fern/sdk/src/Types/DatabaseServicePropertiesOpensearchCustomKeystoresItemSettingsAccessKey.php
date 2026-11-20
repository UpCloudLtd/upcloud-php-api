<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServicePropertiesOpensearchCustomKeystoresItemSettingsAccessKey extends JsonSerializableType
{
    /**
     * @var string $accessKey
     */
    #[JsonProperty('access_key')]
    public string $accessKey;

    /**
     * @var string $secretKey AWS secret key
     */
    #[JsonProperty('secret_key')]
    public string $secretKey;

    /**
     * @param array{
     *   accessKey: string,
     *   secretKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessKey = $values['accessKey'];
        $this->secretKey = $values['secretKey'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
