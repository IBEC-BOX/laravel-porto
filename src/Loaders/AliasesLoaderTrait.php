<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Foundation\AliasLoader;

trait AliasesLoaderTrait
{
    public function loadAliases(): static
    {
        // `$this->aliases` is declared on each Container's Main Service Provider
        foreach ($this->aliases ?? [] as $aliasKey => $aliasValue) {
            if (class_exists($aliasValue)) {
                $this->loadAlias($aliasKey, $aliasValue);
            }
        }

        return $this;
    }

    private function loadAlias($aliasKey, $aliasValue): void
    {
        AliasLoader::getInstance()->alias($aliasKey, $aliasValue);
    }
}
