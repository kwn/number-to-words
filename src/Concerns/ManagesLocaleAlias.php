<?php

namespace NumberToWords\Concerns;

trait ManagesLocaleAlias
{
    private array $aliasedLocale = [
        'fr_FR' => 'fr',
    ];

    private function resolveAlias(string $alias): string
    {
        if (array_key_exists($alias, $this->aliasedLocale)) {
            return $this->aliasedLocale[$alias];
        }

        return $alias;
    }
}
