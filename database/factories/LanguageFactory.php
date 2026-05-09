<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Misaf\VendraLanguage\Models\Language;
use Misaf\VendraTenant\Models\Tenant;

/**
 * @extends Factory<Language>
 */
final class LanguageFactory extends Factory
{
    protected $model = Language::class;

    public function definition(): array
    {
        $isoCode = $this->faker->unique()->languageCode();

        return [
            'tenant_id'   => Tenant::factory(),
            'name'        => $isoCode,
            'description' => $this->faker->realTextBetween(100, 200),
            'slug'        => Str::slug($isoCode),
            'iso_code'    => $isoCode,
            'is_default'  => false,
            'position'    => $this->faker->numberBetween(1, 1000),
            'status'      => $this->faker->boolean(80),
        ];
    }

    public function forTenant(Tenant|int $tenant): static
    {
        $tenantId = $tenant instanceof Tenant ? $tenant->id : $tenant;

        return $this->state(fn(): array => ['tenant_id' => $tenantId]);
    }

    public function enabled(): static
    {
        return $this->state(fn(): array => ['status' => true]);
    }

    public function disabled(): static
    {
        return $this->state(fn(): array => ['status' => false]);
    }
}
