<?php

namespace Logicalcrow\Whatsapp\Messages\Components\Parameters;

use Logicalcrow\Whatsapp\Messages\Components\Currency as ComponentsCurrency;

class Currency extends ComponentsCurrency
{
    public function toArray()
    {
        return [
            'type' => 'currency',
            'currency' => parent::toArray(),
        ];
    }
}
