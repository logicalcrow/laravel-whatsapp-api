<?php

namespace Logicalcrow\Whatsapp\Messages\Components;

use Logicalcrow\Whatsapp\Messages\Enums\PhoneType;
use Logicalcrow\Whatsapp\Messages\Message;
use Logicalcrow\Whatsapp\Utils;

class Phone implements Message
{
    public function __construct(
        public ?string $phone = null,
        public ?PhoneType $type = null,
        public ?string $waId = null,
    ) {
        //
    }

    public static function create(
        ?string $phone = null,
        ?PhoneType $type = null,
        ?string $waId = null,
    ): static {
        return new static($phone, $type, $waId);
    }

    public function toArray()
    {
        $data = [];
        return Utils::fill($data, [
            'phone' => $this->phone,
            'type' => $this->type?->value,
            'wa_id' => $this->waId,
        ]);
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
