<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerts;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'concerts_id', 'image'
    ];

    protected $hidden = [];

    public function concerts()
    {
        return $this->belongsTo(Concerts::class, 'concerts_id', 'id');
    }
}
