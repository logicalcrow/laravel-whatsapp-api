<?php

namespace Logicalcrow\Whatsapp\Messages\Components\Parameters;

use Logicalcrow\Whatsapp\Messages\Components\DateTime as ComponentsDateTime;

class DateTime extends ComponentsDateTime
{
    public function toArray()
    {
        return [
            'type' => 'date_time',
            'date_time' => parent::toArray(),
        ];
    }
}
