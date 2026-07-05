<?php

declare(strict_types=1);

namespace Misaf\VendraLanguage\Models;

use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Misaf\VendraActivityLog\Concerns\HasDefaultActivityLogOptions;
use Misaf\VendraLanguage\Database\Factories\LanguageLineFactory;
use Misaf\VendraSupport\Traits\BelongsToTenant;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\TranslationLoader\LanguageLine as SpatieLanguageLine;

/**
 * @property int $id
 * @property int $tenant_id
 * @property string $group
 * @property string $key
 * @property array<string, string> $text
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
#[Hidden(['tenant_id'])]
#[UseFactory(LanguageLineFactory::class)]
final class LanguageLine extends SpatieLanguageLine
{
    use BelongsToTenant;
    use HasDefaultActivityLogOptions;

    /** @use HasFactory<LanguageLineFactory> */
    use HasFactory;

    use LogsActivity;

    protected function casts(): array
    {
        return [
            'tenant_id' => 'integer',
            ...parent::casts(),
        ];
    }
}
