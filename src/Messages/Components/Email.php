<?php

namespace Logicalcrow\Whatsapp\Messages\Components;

use Logicalcrow\Whatsapp\Messages\Enums\ContactInfoType;
use Logicalcrow\Whatsapp\Messages\Message;

class Email implements Message
{
    public function __construct(
        public string $email,
        public ContactInfoType $type,
    ) {
        //
    }

    public static function create(
        string $email,
        ContactInfoType $type,
    ): static {
        return new static($email, $type);
    }

    public function toArray()
    {
        return [
            'email' => $this->email,
            'type' => $this->type->value,
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
