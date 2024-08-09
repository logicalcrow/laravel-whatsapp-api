<?php

namespace Logicalcrow\Whatsapp\Events\Metadata;

use Illuminate\Support\Carbon;

class Message
{
    public function __construct(
        public string $wamId,
        public string $from,
        public Carbon $timestamp,
        public string $type,
        public ?MessageContext $context,
        public array $data = [],
        public array $errors = [],
    ) {
        //
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }
}
