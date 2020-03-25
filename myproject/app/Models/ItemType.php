<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemType extends Model
{
    protected $table = 'item_types';

    public $timestamps = true;

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'item_type_id');
    }
}
