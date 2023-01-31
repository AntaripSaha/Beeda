<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Shop;

/**
 * App\Models\Wishlist
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Wishlist whereUserId($value)
 * @mixin \Eloquent
 */

class ShopWishlist extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
