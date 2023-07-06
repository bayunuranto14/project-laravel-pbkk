<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concerts extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'description',
        'guest_star',
        'date',
        'type',
        'price'
    ];
    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'concerts_id', 'id');
    }
}
