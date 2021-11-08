<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property text $description
 * @property text $content
 * @property string $image
 * @property bool $is_active
 * @property string $published_at
 * @mixin Builder
 */
final class Post extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query): Builder
    {
        return $query->where('is_active', 1);
    }
}
