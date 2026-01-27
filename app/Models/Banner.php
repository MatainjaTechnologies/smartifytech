<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'status',
    ];

    public function scopeBannerId($query, $id)
    {
        return $query->where('id',$id);
    }

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
}
