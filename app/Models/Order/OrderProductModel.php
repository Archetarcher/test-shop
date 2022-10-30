<?php

namespace App\Models\Order;

use App\Models\Product\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderProductModel extends Model
{
    use HasFactory;

    protected $table = 'order_products';
    protected $fillable = [
        'product_id',
        'order_id',
        'count',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class, 'product_id','id');
    }

}
