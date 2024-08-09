<?php

namespace Logicalcrow\Whatsapp\Events\Metadata;

use Illuminate\Support\Carbon;

class Status
{
    /**
     * @param  Error[] $errors
     */
    public function __construct(
        public string $wamId,
        public string $status,
        public Carbon $timestamp,
        public string $recipientId,
        public ?string $conversationId = null,
        public ?string $conversationType = null,
        public ?Carbon $conversationExpiration = null,
        public ?bool $billable = null,
        public ?string $pricingModel = null,
        public ?string $pricingCategory = null,
        public array $errors = [],
    ) {
        // 
    }
}
