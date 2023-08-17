<?php

namespace AdminKit\Porto\Commands;

class MigrationGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-migration';

    protected $description = 'Create a new Migration file';

    protected $type = 'Migration';

    protected $stubName = 'migration.create.stub';

    protected $folderInsideContainer = 'Database/Migration';

    protected function getVariables()
    {
        return [
            '{{ table_name }}' => $this->argument('name'),
        ];
    }

    protected function getNameInput()
    {
        $tableName = $this->argument('name');
        return  now()->format('Y_m_d_His') . "_create_{$tableName}_table";
    }
}
