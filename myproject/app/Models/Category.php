<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed posts
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = true;

    public function path()
    {
        return route('categories.show_post', $this);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->using('App\Models\CategoryPost')
            ->withPivot('id');
    }
}
