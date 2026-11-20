<?php

namespace Upcloud\ContainerRegistry\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class ContainerRegistryChangePassword extends JsonSerializableType
{
    /**
     * @var string $newPassword At most 72 bytes; the registry stores it as a bcrypt hash, which refuses anything longer.
     */
    #[JsonProperty('new_password')]
    public string $newPassword;

    /**
     * @param array{
     *   newPassword: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newPassword = $values['newPassword'];
    }
}
