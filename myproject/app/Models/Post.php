<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $validate)
 * @property mixed id
 */
class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary key
    protected $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;
    // Whitelist
    protected $fillable = [
        'title', 'body', 'users', 'mail'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->using('App\Models\CategoryPost')
            ->withPivot('id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->using('App\Models\PostTag')
            ->withPivot('id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
