<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Support\Str;

class MigrationGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-migration';

    protected $description = 'Create a new Migration file';

    protected $type = 'Migration';

    protected $stubName = 'migration.create.stub';

    protected $folderInsideContainer = 'Database/Migrations';

    public function handle()
    {
        if ($this->checkMigrationFileExists()) {
            return;
        }

        parent::handle();
    }

    protected function checkMigrationFileExists(): bool
    {
        $migrationFolder = $this->getContainerPath().'/Database/Migrations';
        if (! $this->files->exists($migrationFolder)) {
            return false;
        }

        foreach ($this->files->allFiles($migrationFolder) as $filename) {
            $migrationName = 'create_'.$this->getTableName().'_table';
            if (Str::contains($filename, $migrationName)) {
                $this->components->error("$this->type already exists.");

                return true;
            }
        }

        return false;
    }

    protected function getVariables()
    {
        return [
            '{{ table_name }}' => $this->getTableName(),
        ];
    }

    protected function getNameInput()
    {
        return now()->format('Y_m_d_His').'_create_'.$this->getTableName().'_table';
    }

    protected function getTableName()
    {
        return Str::snake(Str::plural($this->argument('name')));
    }
}
