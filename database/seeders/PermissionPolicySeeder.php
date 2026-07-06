<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Database\Seeders;

use Misaf\VendraLanguage\Enums\LanguagePolicyEnum;
use Misaf\VendraLanguage\Enums\LanguageLinePolicyEnum;
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
            ...array_column(LanguagePolicyEnum::cases(), 'value'),
            ...array_column(LanguageLinePolicyEnum::cases(), 'value'),
        ];
    }
}
