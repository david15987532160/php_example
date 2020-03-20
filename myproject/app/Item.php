<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Table name
    protected $table = 'items';

    // Mass assignable
    protected $fillable = [
        'name', 'description', 'in_stock', 'searched_times'
    ];

    // Timestamps
    public $timestamps = true;
}
