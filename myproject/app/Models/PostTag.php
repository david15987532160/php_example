<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    protected $table = 'post_tag';

    protected $primaryKey = 'id';

    protected $fillable = [
        'post_id', 'tag_id'
    ];
}
