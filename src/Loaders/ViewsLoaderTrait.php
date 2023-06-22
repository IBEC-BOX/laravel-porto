<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\File;

trait ViewsLoaderTrait
{
    public function loadViewsFromContainers($containerPath): void
    {
        $containerViewDirectory = $containerPath.'/UI/WEB/Views/';
        $containerMailTemplatesDirectory = $containerPath.'/Mails/Templates/';

        $containerName = basename($containerPath);

        $this->loadViews($containerViewDirectory, $containerName);
        $this->loadViews($containerMailTemplatesDirectory, $containerName);
    }

    private function loadViews($directory, $containerName): void
    {
        if (File::isDirectory($directory)) {
            $this->loadViewsFrom($directory, "container@$containerName");
        }
    }
}
