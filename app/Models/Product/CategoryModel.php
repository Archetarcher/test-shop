<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function subcategory(): HasMany
    {
        return $this->hasMany(CategoryModel::class, 'parent_id','id')->with('subcategory');
    }
}
