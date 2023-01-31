<?php

namespace App\Models;

use App\FlashDealProduct;
use App\ProductTax;
use App\User;
use App\Wishlist;
use App\Upload;
use App\Shop;
use App\ServiceCategory;
use App\FoodAddonProductPivot;
use App\CuisineProductPivot;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $added_by
 * @property int $user_id
 * @property int $category_id
 * @property int $brand_id
 * @property string|null $photos
 * @property string|null $thumbnail_img
 * @property string|null $featured_img
 * @property string|null $flash_deal_img
 * @property string|null $video_provider
 * @property string|null $video_link
 * @property string|null $tags
 * @property string|null $description
 * @property float $unit_price
 * @property float $purchase_price
 * @property string|null $choice_options
 * @property string|null $colors
 * @property string $variations
 * @property int $todays_deal
 * @property int $published
 * @property int $featured
 * @property int $current_stock
 * @property string|null $unit
 * @property float|null $discount
 * @property string|null $discount_type
 * @property float|null $tax
 * @property string|null $tax_type
 * @property string $shipping_type
 * @property float|null $shipping_cost
 * @property int $num_of_sale
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_img
 * @property string|null $pdf
 * @property string $slug
 * @property float $rating
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereChoiceOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCurrentStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFeaturedImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFlashDealImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereNumOfSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSubsubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereThumbnailImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTodaysDeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVariations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVideoProvider($value)
 * @mixin \Eloquent
 */

class Product extends Model
{
//    protected $fillable = ['current_stock', 'variations', 'num_of_sale'];
    protected $fillable = ['variations', 'num_of_sale'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope('published', function (Builder $builder) {
    //         $builder->where('published', 1);
    //     });
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function taxes() {
        return $this->hasOne(ProductTax::class);
    }

    public function flash_deal_product() {
        return $this->hasOne(FlashDealProduct::class);
    }

    public function thumbnail_image()
    {
        return $this->belongsTo(Upload::class, 'thumbnail_img');
    }
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function gallery_images()
    {
        return $this->hasMany(Upload::class, 'photos');
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
    public function review_counter(){
        return $this->hasMany(Review::class)->whereNotNull('comment');
    }
    public function rating_counter(){
        return $this->hasMany(Review::class)->whereNotNull('rating');
    }
    public function count_review()
    {
        $result = $this->review()
        ->selectRaw('count(comment) as count_comment, product_id')
        ->whereNotNull('comment')
        ->groupBy('product_id');
        return $result;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function count_cart(){
        $result = $this->cart()
            ->selectRaw('quantity as count_cart, product_id')
            ->groupBy('product_id');
        return $result;
    }
    public function product_addons()
    {
        return $this->hasMany(FoodAddonProductPivot::class);
    }
    public function product_cuisines()
    {
        return $this->hasMany(CuisineProductPivot::class);
    }
    public function video()
    {
        return $this->belongsTo(Upload::class, 'videos');
    }

}
