<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class Price_list extends Model
{
    use HasFactory;

    protected $table = 'price_lists'; 

    protected $fillable = [
        'file_name',
        'status'
    ];

    public function products()
	{
	    return $this->hasMany(Product::class, 'price_list_id');
	}

}
