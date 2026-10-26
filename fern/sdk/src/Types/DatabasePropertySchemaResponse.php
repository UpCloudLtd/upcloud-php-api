<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use Upcloud\Core\Types\ArrayType;

/**
 * Schema definition for a single property
 */
class DatabasePropertySchemaResponse extends JsonSerializableType
{
    /**
     * @var ?string $schema JSON Schema URI
     */
    #[JsonProperty('$schema')]
    public ?string $schema;

    /**
     * @var ?string $id Schema identifier
     */
    #[JsonProperty('$id')]
    public ?string $id;

    /**
     * @var ?bool $createOnly Whether the property can only be set during creation
     */
    #[JsonProperty('createOnly')]
    public ?bool $createOnly;

    /**
     * @var ?array<string, mixed> $default Any valid JSON value is allowed here
     */
    #[JsonProperty('default'), ArrayType(['string' => 'mixed'])]
    public ?array $default;

    /**
     * @var ?array<string, mixed> $example Any valid JSON value is allowed here
     */
    #[JsonProperty('example'), ArrayType(['string' => 'mixed'])]
    public ?array $example;

    /**
     * @var ?int $maxLength Maximum length for the property schema
     */
    #[JsonProperty('maxLength')]
    public ?int $maxLength;

    /**
     * @var ?int $minLength Minimum length for the property schema
     */
    #[JsonProperty('minLength')]
    public ?int $minLength;

    /**
     * @var ?string $pattern Allowed patterns for the property
     */
    #[JsonProperty('pattern')]
    public ?string $pattern;

    /**
     * @var ?string $title Human-readable title for the property
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $type Data type of the property
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $userError User-friendly error message
     */
    #[JsonProperty('user_error')]
    public ?string $userError;

    /**
     * @var ?DatabasePropertySchemaResponse $items
     */
    #[JsonProperty('items')]
    public ?DatabasePropertySchemaResponse $items;

    /**
     * @var ?array<string, DatabasePropertySchemaResponse> $properties Properties for object type
     */
    #[JsonProperty('properties'), ArrayType(['string' => DatabasePropertySchemaResponse::class])]
    public ?array $properties;

    /**
     * @var ?array<string, DatabaseDependencyResponse> $dependencies Property dependency collection
     */
    #[JsonProperty('dependencies'), ArrayType(['string' => DatabaseDependencyResponse::class])]
    public ?array $dependencies;

    /**
     * @var ?array<string> $required List of required properties
     */
    #[JsonProperty('required'), ArrayType(['string'])]
    public ?array $required;

    /**
     * @var ?int $maxItems Maximum number of items for arrays
     */
    #[JsonProperty('maxItems')]
    public ?int $maxItems;

    /**
     * @var ?string $description Description of the property
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<array<string, mixed>> $minimum Minimum values for numeric properties
     */
    #[JsonProperty('minimum'), ArrayType([['string' => 'mixed']])]
    public ?array $minimum;

    /**
     * @var ?array<array<string, mixed>> $maximum Maximum values for numeric properties
     */
    #[JsonProperty('maximum'), ArrayType([['string' => 'mixed']])]
    public ?array $maximum;

    /**
     * @var ?array<mixed> $enum Enumeration of allowed values
     */
    #[JsonProperty('enum'), ArrayType(['mixed'])]
    public ?array $enum;

    /**
     * @var ?bool $additionalProperties Whether additional properties are allowed
     */
    #[JsonProperty('additionalProperties')]
    public ?bool $additionalProperties;

    /**
     * @param array{
     *   schema?: ?string,
     *   id?: ?string,
     *   createOnly?: ?bool,
     *   default?: ?array<string, mixed>,
     *   example?: ?array<string, mixed>,
     *   maxLength?: ?int,
     *   minLength?: ?int,
     *   pattern?: ?string,
     *   title?: ?string,
     *   type?: ?string,
     *   userError?: ?string,
     *   items?: ?DatabasePropertySchemaResponse,
     *   properties?: ?array<string, DatabasePropertySchemaResponse>,
     *   dependencies?: ?array<string, DatabaseDependencyResponse>,
     *   required?: ?array<string>,
     *   maxItems?: ?int,
     *   description?: ?string,
     *   minimum?: ?array<array<string, mixed>>,
     *   maximum?: ?array<array<string, mixed>>,
     *   enum?: ?array<mixed>,
     *   additionalProperties?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->schema = $values['schema'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->createOnly = $values['createOnly'] ?? null;
        $this->default = $values['default'] ?? null;
        $this->example = $values['example'] ?? null;
        $this->maxLength = $values['maxLength'] ?? null;
        $this->minLength = $values['minLength'] ?? null;
        $this->pattern = $values['pattern'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->userError = $values['userError'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->dependencies = $values['dependencies'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->maxItems = $values['maxItems'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->minimum = $values['minimum'] ?? null;
        $this->maximum = $values['maximum'] ?? null;
        $this->enum = $values['enum'] ?? null;
        $this->additionalProperties = $values['additionalProperties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
