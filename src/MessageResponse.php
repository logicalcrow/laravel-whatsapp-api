<?php

namespace Logicalcrow\Whatsapp;

use Logicalcrow\Whatsapp\Exceptions\MessageRequestException;
use Illuminate\Http\Client\Response as ClientResponse;
use Logicalcrow\Whatsapp\Events\MessageFailed;
use Logicalcrow\Whatsapp\Events\MessageSent;

class MessageResponse
{
    public function __construct(
        public string $id,
        public array $contacts,
    ) {
        //
    }

    public static function build(ClientResponse $response): static
    {
        if ($response->successful()) {
            $instance = new static($response->json('messages.0.id'), $response->json('contacts'));
            MessageSent::dispatch($instance);
            return $instance;
        } else {
            $instance = new MessageRequestException($response);
            MessageFailed::dispatched($instance);
            throw $instance;
        }
    }
}
