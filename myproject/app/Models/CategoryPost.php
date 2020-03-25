<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPost extends Pivot
{
    protected $table = 'category_post';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'post_id'
    ];
}
