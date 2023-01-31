<?php



namespace App\Models;



use App\User;

use App\SellerService;

use App\Upload;

use App\Cuisine;

use App\Category;

use App\ShopTiming;

use App\AllDocument;

use App\ServiceCategory;

use App\Models\ShopWishlist;

use Illuminate\Database\Eloquent\Model;



/**

 * App\Models\Shop

 *

 * @property int $id

 * @property int $user_id

 * @property string|null $name

 * @property string|null $logo

 * @property string|null $sliders

 * @property string|null $address

 * @property string|null $facebook

 * @property string|null $google

 * @property string|null $twitter

 * @property string|null $youtube

 * @property string|null $instagram

 * @property string|null $slug

 * @property \Illuminate\Support\Carbon $created_at

 * @property \Illuminate\Support\Carbon|null $updated_at

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop newModelQuery()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop newQuery()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop query()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereAddress($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCreatedAt($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereFacebook($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereGoogle($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereId($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereInstagram($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereLogo($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereName($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereSliders($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereSlug($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereTwitter($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUpdatedAt($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUserId($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereYoutube($value)

 * @mixin \Eloquent

 */



class Shop extends Model

{

    protected $fillable = [

        'user_id',

        'seller_service_id',    

        'name',

        'radius',

        'eta_delivery_time',

        'description',

        'logo',

        'banner',

        'address',

        'slug',

        'address_lat',

        'address_long'

        ];

    public function user()

    {

        return $this->belongsTo(User::class);

    }

    public function category()

    {

        return $this->belongsTo(Category::class, 'category_id');

    }

    public function seller_service()

    {

        return $this->belongsTo(SellerService::class)->with('service_category');

    }

    public function logo_img()

    {

        return $this->belongsTo(Upload::class, 'logo');

    }

    public function banner_img()

    {

        return $this->belongsTo(Upload::class, 'banner');

    }

    public function banner_img_mobile()

    {

        return $this->belongsTo(Upload::class, 'banner_mobile')->select('id', 'file_name');

    }

    public function shop_timing()

    {

        return $this->hasMany(ShopTiming::class);

    }

    public function seller_documents()

    {

        return $this->hasMany(AllDocument::class)->with('required_document');

    }

    public function service_category()

    {

        return $this->belongsTo(ServiceCategory::class, 'seller_service_id');

    }

    public function products()

    {

        return $this->hasMany(Product::class, 'shop_id');

    }

    public function product_categories()

    {

        return $this->hasMany(Product::class, 'shop_id')->select('shop_id', 'category_id')->groupBy('category_id')->with(['category'=>function($query){

                $query->select(['id','name']);

        }]);

    }

    public function product_reviews()

    {

        return $this->hasMany(Product::class, 'shop_id')->select(['shop_id'])->withCount('review_counter');

    }

    public function avg_rating()

    {

        return $this->products()

        ->selectRaw('avg(rating) as rating, shop_id')

        ->groupBy('shop_id');

    }

    public function product_ratings()

    {

        return $this->hasMany(Product::class, 'shop_id')->select(['shop_id'])->withCount('rating_counter');

    }

    // public function cuisines()

    // {

    //     return $this->hasMany(Cuisine::class, 'shop_id');

    // }

    public function shop_wish_lists()

    {

        return $this->hasMany(ShopWishlist::class);

    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'cuisine_shop_pivot', 'shop_id', 'cuisine_id');
    }

}

