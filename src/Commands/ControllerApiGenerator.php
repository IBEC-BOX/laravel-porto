<?php

namespace AdminKit\Porto\Commands;

class ControllerApiGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-controller-api';

    protected $description = 'Create a new Controller API class';

    protected $type = 'Controller';

    protected $stubName = 'controller.api.stub';

    protected $folderInsideContainer = 'UI/API/Controllers';
}
