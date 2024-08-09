<?php

namespace Logicalcrow\Whatsapp\Messages\Components;

use Logicalcrow\Whatsapp\Messages\Enums\ButtonType;
use Logicalcrow\Whatsapp\Messages\Message;

class Button implements Message
{
    public static function create(
        ButtonType $type = ButtonType::Url,
        int $index = 0,
        string|array|null $payload = null,
        ?string $text = null,
    ): static {
        return new static($type, $index, $payload, $text);
    }

    public function __construct(
        public ButtonType $type = ButtonType::Url,
        public int $index = 0,
        public string|array|null $payload = null,
        public ?string $text = null,
    ) {
        //
    }

    public function toArray()
    {
        if ($this->type === ButtonType::QuickReply) {
            $payload = is_array($this->payload) ?
                json_encode($this->payload) : $this->payload;
        } else {
            $payload = $this->text;
        }

        $parameterType = $this->type === ButtonType::QuickReply ? 'payload' : 'text';

        $data = [
            'type' => 'button',
            'sub_type' => $this->type->value,
            'index' => (string)$this->index,
            'parameters' => [[
                'type' => $parameterType,
                $parameterType => $payload,
            ]],
        ];

        return $data;
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
