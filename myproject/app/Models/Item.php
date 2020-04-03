<?php

namespace App\Models;

use App\BelongsTo;
use App\Models\ItemType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function itemType(): BelongsTo
    {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
