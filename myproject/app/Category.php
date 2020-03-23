<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public $timestamps = true;

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
}
