<?php

namespace Logicalcrow\Whatsapp\Messages\Components\Parameters;

use Logicalcrow\Whatsapp\Messages\Message;

class Video implements Message
{
    public static function create(
        ?string $id = null,
        ?string $link = null,
    ): static {
        return new static($id, $link);
    }

    public function __construct(
        public ?string $id = null,
        public ?string $link = null,
    ) {
        //
    }

    public function id(?string $id = null): static
    {
        $this->id = $id;
        return $this;
    }

    public function link(?string $link = null): static
    {
        $this->link = $link;
        return $this;
    }

    public function toArray()
    {
        return [
            'type' => 'video',
            'video' => $this->link ? ['link' => $this->link] : ['id' => $this->id],
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
