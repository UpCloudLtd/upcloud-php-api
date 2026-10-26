<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceSecurityEnable extends JsonSerializableType
{
    /**
     * @var string $adminPassword Security admin password
     */
    #[JsonProperty('admin_password')]
    public string $adminPassword;

    /**
     * @param array{
     *   adminPassword: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adminPassword = $values['adminPassword'];
    }
}
