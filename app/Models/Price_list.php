<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price_list extends Model
{
    use HasFactory;

    protected $table = 'price_lists'; 

    protected $fillable = [
        'file_name',
        'status'
    ];

}
