<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Database\Seeders;

use Misaf\VendraLanguage\Enums\LanguageEnum;
use Misaf\VendraLanguage\Enums\LanguageLineEnum;
use Misaf\VendraLanguage\LanguagePlugin;
use Misaf\VendraSupport\Concerns\RequiresCurrentTenant;
use Misaf\VendraSupport\Database\Seeders\PermissionPolicySeeder as BasePermissionPolicySeeder;

final class PermissionPolicySeeder extends BasePermissionPolicySeeder
{
    use RequiresCurrentTenant;

    protected const string MODULE_NAME = LanguagePlugin::ID;

    public function run(): void
    {
        $tenant = $this->currentTenant();

        $this->seedPermissionPolicies($tenant->getKey());
    }

    /**
     * @return list<string>
     */
    protected function policies(): array
    {
        return [
            ...array_column(LanguageEnum::cases(), 'value'),
            ...array_column(LanguageLineEnum::cases(), 'value'),
        ];
    }
}
