<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed posts
 */
class Tag extends Model
{
    protected $table = 'tags';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = true;

    public function path()
    {
        return route('tags.show_post', $this);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->using('App\Models\PostTag')
            ->withPivot('id');
    }
}
