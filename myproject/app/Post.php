<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary key
    protected $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;
    // Guard user mail (blacklist)
    protected $guarded = 'mail';
    // Whitelist
    protected $fillable = [
        'title', 'body', 'users'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
