<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'products';
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(ProductCategory::class);
    }

    public function ptags() {
        return $this->belongsToMany(Ptag::class);
    }

    // public function status() {
    //     return $this->belongsTo(Status::class);
    // }
}
