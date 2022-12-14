<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptag extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'ptags';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
