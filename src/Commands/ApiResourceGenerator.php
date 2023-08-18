<?php

namespace AdminKit\Porto\Commands;

class ApiResourceGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-resource';

    protected $description = 'Create a new API Resource class';

    protected $type = 'Resource';

    protected $stubName = 'api.resource.stub';

    protected $folderInsideContainer = 'UI/API/Resources';

    protected function getNameInput()
    {
        return parent::getNameInput().'Resource';
    }
}
