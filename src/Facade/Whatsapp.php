<?php

namespace Logicalcrow\Whatsapp\Facade;

use Logicalcrow\Whatsapp\Whatsapp as ConcreteWhatsapp;
use Illuminate\Support\Facades\Facade;

class Whatsapp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'whatsapp';
    }

    public static function from(?string $numberId, ?string $token): ConcreteWhatsapp
    {
        return new ConcreteWhatsapp($numberId, $token);
    }
}
