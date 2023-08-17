<?php

namespace AdminKit\Porto\Commands;

class ApiControllerGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-controller';

    protected $description = 'Create a new API Controller class';

    protected $type = 'Controller';

    protected $stubName = 'api.controller.stub';

    protected $folderInsideContainer = 'UI/API/Controllers';
}
