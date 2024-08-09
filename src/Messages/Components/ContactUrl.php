<?php

namespace Logicalcrow\Whatsapp\Messages\Components;

use Logicalcrow\Whatsapp\Messages\Enums\ContactInfoType;
use Logicalcrow\Whatsapp\Messages\Message;

class ContactUrl implements Message
{
    public function __construct(
        public string $url,
        public ContactInfoType $type,
    ) {
        //
    }

    public static function create(
        string $url,
        ContactInfoType $type,
    ): static {
        return new static($url, $type);
    }

    public function toArray()
    {
        return [
            'url' => $this->url,
            'type' => $this->type->value,
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
