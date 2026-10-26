<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceSecurityModify extends JsonSerializableType
{
    /**
     * @var string $adminPassword Current admin password
     */
    #[JsonProperty('admin_password')]
    public string $adminPassword;

    /**
     * @var string $newPassword New admin password
     */
    #[JsonProperty('new_password')]
    public string $newPassword;

    /**
     * @param array{
     *   adminPassword: string,
     *   newPassword: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminPassword = $values['adminPassword'];
        $this->newPassword = $values['newPassword'];
    }
}
