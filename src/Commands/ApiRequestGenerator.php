<?php

namespace AdminKit\Porto\Commands;

class ApiRequestGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-request';

    protected $description = 'Create a new Request class';

    protected $type = 'Request';

    protected $stubName = 'api.request.stub';

    protected $folderInsideContainer = 'UI/API/Requests';

    protected function getNameInput()
    {
        return parent::getNameInput().'Request';
    }
}
