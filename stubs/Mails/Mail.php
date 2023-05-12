<?php

namespace App\Ship\Abstracts\Mails;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class Mail extends Mailable
{
    use SerializesModels;
}
