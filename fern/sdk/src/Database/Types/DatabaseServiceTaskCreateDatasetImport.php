<?php

namespace Upcloud\Database\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;

class DatabaseServiceTaskCreateDatasetImport extends JsonSerializableType
{
    /**
     * @var string $datasetName The name of the dataset to be imported.
     */
    #[JsonProperty('dataset_name')]
    public string $datasetName;

    /**
     * @param array{
     *   datasetName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->datasetName = $values['datasetName'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
