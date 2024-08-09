<?php

namespace Logicalcrow\Whatsapp\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Logicalcrow\Whatsapp\Exceptions\MessageRequestException;

class MessageFailed
{
    use Dispatchable, SerializesModels;

    public function __construct(public MessageRequestException $exception)
    {
        // 
    }
}
