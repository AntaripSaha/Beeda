<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class FoodAddon extends Model

{

    protected $table = 'food_addons';



    public function shop()

    {

        return $this->belongsTo(Shop::class);

    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'food_addon_product_pivot', 'food_addon_id', 'product_id');
    }
    

}

