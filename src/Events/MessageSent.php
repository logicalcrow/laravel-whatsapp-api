<?php

namespace Logicalcrow\Whatsapp\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Logicalcrow\Whatsapp\MessageResponse;

class MessageSent
{
    use Dispatchable, SerializesModels;

    public function __construct(public MessageResponse $response)
    {
        // 
    }
}
