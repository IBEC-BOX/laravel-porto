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
        $pathParts = explode(DIRECTORY_SEPARATOR, $containerPath);
        $sectionName = $pathParts[count($pathParts) - 2];

        $this->loadViews($containerViewDirectory, $containerName, $sectionName);
        $this->loadViews($containerMailTemplatesDirectory, $containerName, $sectionName);
    }

    private function loadViews($directory, $containerName): void
    {
        if (File::isDirectory($directory)) {
            $this->loadViewsFrom($directory, "container@$containerName");
        }
    }
}
