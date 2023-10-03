<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait LocalizationLoaderTrait
{
    public function loadLocalsFromContainers($containerPath): void
    {
        $containerLocaleDirectory = $containerPath.'/Languages';
        $containerName = basename($containerPath);

        $this->loadLocals($containerLocaleDirectory, $containerName);
    }

    private function loadLocals($directory, $containerName): void
    {
        if (File::isDirectory($directory)) {
            $this->loadTranslationsFrom($directory, "container@$containerName");
            $this->loadJsonTranslationsFrom($directory);
        }
    }
}
