<?php

namespace Logicalcrow\Whatsapp\Messages\Components;

use Logicalcrow\Whatsapp\Messages\Enums\ContactInfoType;
use Logicalcrow\Whatsapp\Messages\Message;
use Logicalcrow\Whatsapp\Utils;

class Address implements Message
{
    public function __construct(
        public ?string $street = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
        public ?string $country = null,
        public ?string $countryCode = null,
        public ?ContactInfoType $type = null,
    ) {
        //
    }

    public static function create(
        string $street = null,
        string $city = null,
        string $state = null,
        string $zip = null,
        string $country = null,
        string $countryCode = null,
        ContactInfoType $type = null,
    ): static {
        return new static(
            $street,
            $city,
            $state,
            $zip,
            $country,
            $countryCode,
            $type,
        );
    }

    public function toArray()
    {
        $data = [];
        return Utils::fill($data, [
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country,
            'country_code' => $this->countryCode,
            'type' => $this->type,
        ]);
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
