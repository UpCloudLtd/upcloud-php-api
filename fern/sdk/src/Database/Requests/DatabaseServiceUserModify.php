<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceUserModify extends JsonSerializableType
{
    /**
     * @var ?string $password New password for the service user
     */
    #[JsonProperty('password')]
    public ?string $password;

    /**
     * @var ?string $authentication Authentication method for the service user
     */
    #[JsonProperty('authentication')]
    public ?string $authentication;

    /**
     * @param array{
     *   password?: ?string,
     *   authentication?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->password = $values['password'] ?? null;
        $this->authentication = $values['authentication'] ?? null;
    }
}
