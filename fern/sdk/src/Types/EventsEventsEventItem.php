<?php

namespace Upcloud\Types;

use Upcloud\Core\Json\JsonSerializableType;
use Upcloud\Core\Json\JsonProperty;
use DateTime;
use Upcloud\Core\Types\Date;

class EventsEventsEventItem extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var string $server
     */
    #[JsonProperty('server')]
    public string $server;

    /**
     * @var DateTime $time Timestamp of when the event occurred
     */
    #[JsonProperty('time'), Date(Date::TYPE_DATETIME)]
    public DateTime $time;

    /**
     * @var value-of<EventsEventType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   server: string,
     *   time: DateTime,
     *   type: value-of<EventsEventType>,
     *   email?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->server = $values['server'];
        $this->time = $values['time'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
