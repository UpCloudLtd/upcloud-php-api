<?php

namespace Upcloud\Database\Requests;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class LogicalDatabaseCreate extends JsonSerializableType
{
    /**
     * @var string $name logical database name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $lcCollate Collation order
     */
    #[JsonProperty('lc_collate')]
    public ?string $lcCollate;

    /**
     * @var ?string $lcCtype Category of a locale definition source file
     */
    #[JsonProperty('lc_ctype')]
    public ?string $lcCtype;

    /**
     * @param array{
     *   name: string,
     *   lcCollate?: ?string,
     *   lcCtype?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->lcCollate = $values['lcCollate'] ?? null;
        $this->lcCtype = $values['lcCtype'] ?? null;
    }
}
