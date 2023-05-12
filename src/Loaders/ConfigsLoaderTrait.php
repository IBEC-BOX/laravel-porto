<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\File;

trait ConfigsLoaderTrait
{
    private function loadConfigs($configFolder): void
    {
        if (File::isDirectory($configFolder)) {
            $files = File::files($configFolder);

            foreach ($files as $file) {
                $name = File::name($file);
                $path = $configFolder.'/'.$name.'.php';

                $this->mergeConfigFrom($path, $name);
            }
        }
    }

    public function loadConfigsFromContainers($containerPath): void
    {
        $containerConfigsDirectory = $containerPath.'/Configs';
        $this->loadConfigs($containerConfigsDirectory);
    }
}
