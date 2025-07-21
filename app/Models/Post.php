<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, HasTags, InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image', 'preview'];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getPreview(int $words = 30): string
    {
        return Str::words(strip_tags($this->body), $words);
    }

    public function image(): Attribute
    {
        $this->load('media');

        return Attribute::make(
            get: fn () => $this->getFirstMedia('post-images')?->toHtml(),
        );
    }

    public function preview(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getPreview(),
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post-images')
            ->singleFile()
            ->withResponsiveImages();
    }
}
