<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary key
    protected $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;
    // Guard user mail (blacklist)
    protected $guarded = 'mail';
    // Whitelist
    protected $fillable = [
        'title', 'body', 'users'
    ];
}
