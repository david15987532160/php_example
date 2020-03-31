<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyWord extends Model
{
    protected $table = 'key_words';

    protected $primaryKey = 'id';

    protected $fillable = [
        'search_key',
    ];

    public $timestamps = true;
}
