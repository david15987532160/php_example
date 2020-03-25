<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_post';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'post_id'
    ];
}
