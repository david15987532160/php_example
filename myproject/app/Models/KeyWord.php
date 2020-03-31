<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class KeyWord extends Model
{
    protected $table = 'key_words';

    protected $primaryKey = 'id';

    protected $fillable = [
        'search_key', 'frequency'
    ];

    public $timestamps = true;
}
