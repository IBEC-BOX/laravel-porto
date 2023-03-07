<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Console\Command;

class PortoCommand extends Command
{
    public $signature = 'porto';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
