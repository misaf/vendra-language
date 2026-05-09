<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Database\Seeders;

use Misaf\VendraLanguage\Enums\LanguageEnum;
use Misaf\VendraLanguage\Enums\LanguageLineEnum;
use Misaf\VendraLanguage\LanguagePlugin;
use Misaf\VendraSupport\Database\Seeders\PermissionPolicySeeder as BasePermissionPolicySeeder;

final class PermissionPolicySeeder extends BasePermissionPolicySeeder
{
    protected const string MODULE_NAME = LanguagePlugin::ID;

    /**
     * @return list<string>
     */
    protected function policies(): array
    {
        return array_values(array_unique([
            ...array_column(LanguageEnum::cases(), 'value'),
            ...array_column(LanguageLineEnum::cases(), 'value'),
        ]));
    }
}
