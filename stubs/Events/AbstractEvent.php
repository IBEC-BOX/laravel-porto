<?php

namespace App\Ship\Abstracts\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class AbstractEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
}
