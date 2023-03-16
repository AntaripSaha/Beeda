<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Http;
use App\Http\Traits\ApiUrl;
use Illuminate\Support\Facades\Cache;

trait EditProductDataFormat
{
    use ApiUrl;

    public function editFoodProduct($request)
    {
//        dd($request->regions);
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
            'food_preparation_time' => 'required'
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'vegetarian', 'contents' => $request->vegetarian],
            ['name' => 'food_preparation_time', 'contents' => $request->food_preparation_time],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'flat_shipping_cost', 'contents' => $request->flat_shipping_cost],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'addons', 'contents' => $request->addons ? json_encode($request->addons) : json_encode([])],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editGroceryProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editGasProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editLiquorProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id ? json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
//        dd($item_update);
        return $item_update;
    }

    public function editFlowerProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');

        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }

        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editPharmacyProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editWaterProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',

        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editBeedamallProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',
        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach($choise as $key=> $value)
                {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for($i=0; $i<count($att_values); $i++)
                    {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for($j=0;$j<count($value_array); $j++)
                        {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_'.$choise_attributes[$key], 'contents' => json_encode($att_values)]
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');

        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }

        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }

    public function editFarmerProduct($request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'unit' => 'required',
            'min_quantity' => 'required',

        ]);
        $token = getToken();
        $item_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for($i=0; $i<count($tags); $i++)
        {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $data = [
            ['name' => 'name', 'contents' => $request->product_name],
            ['name' => 'delete_img_ids', 'contents' => json_encode($request->delete_img_ids)],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'is_variant', 'contents' => $request->is_variant],
            ['name' => 'product_id', 'contents' => $request->product_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'brand_id', 'contents' => $request->brand],
            ['name' => 'unit', 'contents' => $request->unit],
            ['name' => 'min_qty', 'contents' => $request->min_quantity],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->unit_price],
            ['name' => 'discount', 'contents' => $request->discount],
            ['name' => 'discount_type', 'contents' => $request->discount_type],
            ['name' => 'current_stock', 'contents' => $request->normal_quantity],
            ['name' => 'sku', 'contents' => $request->sku],
            ['name' => 'short_description', 'contents' => $request->short_description],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'service_description', 'contents' => $request->service_description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'stock_visibility_state', 'contents' => $request->stock_visibility],
            ['name' => 'cash_on_delivery', 'contents' => $request->cash_on_delivery],
            ['name' => 'featured', 'contents' => $request->featured],
            ['name' => 'tabed', 'contents' => $request->tabed],
            ['name' => 'todays_deal', 'contents' => $request->today_deal],
            ['name' => 'est_shipping_days', 'contents' => $request->shipping_time],
            ['name' => 'low_stock_quantity', 'contents' => $request->warning_quantity],
            ['name' => 'variant_id', 'contents' => $request->variant_id?json_encode($request->variant_id):null],
            ['name' => 'request_agent', 'contents' => 'web'],
            ['name' => 'tax_id', 'contents' => $request->product_tax_id],
            ['name' => 'tax', 'contents' => $request->product_tax],
            ['name' => 'tax_type', 'contents' => $request->product_tax_type],
            ['name' => 'is_quantity_multiplied', 'contents' => $request->is_quantity_multiplied],
            ['name' => 'shipping_type', 'contents' => $request->shipping_type],
            ['name' => 'from_unit', 'contents' => json_encode($request->from_unit)],
            ['name' => 'to_unit', 'contents' => json_encode($request->to_unit)],
            ['name' => 'flat_shipping_cost', 'contents' => json_encode($request->flat_shipping_cost)],
            ['name' => 'shipping_cost', 'contents' => json_encode($request->shipping_cost)],
            ['name' => 'thumbnail_image', 'contents' => $request->thumbnail_image],
            ['name' => 'variant_changed', 'contents' => $request->variant_changed],
            ['name' => 'pickup', 'contents' => $request->pickup],
            ['name' => 'regions', 'contents' => json_encode($request->regions)],
        ];
        $colors = [];
        $colors_active = 0;
        if($request->color)
        {
            $colors = $request->color;
            if(count($colors)>0)
            {
                $colors_active = 1;
                $data = array_merge($data,[
                    ['name' => 'colors_active', 'contents' => $colors_active],
                    ['name' => 'colors', 'contents' => json_encode($colors)]
                ]);
            }
        }
        if($request->variant_name && count($request->variant_name) > 0)
        {
            $variant_name = $request->variant_name;
            foreach($variant_name as $key => $variant)
            {

                $data = array_merge($data,[
                    ['name' => 'price_'.$variant_name[$key], 'contents' => $request->variant_price[$key]],
                    ['name' => 'sku_'.$variant_name[$key], 'contents' => $request->variant_sku[$key]],
                    ['name' => 'qty_'.$variant_name[$key], 'contents' => $request->quantity[$key]],
                ]);
            }
            $choise_attributes = [];
            $choise = [];
            if($request->choise_attributes && $request->choise)
            {
                $choise_attributes = explode(',', $request->choise_attributes);
                $choise = explode(',', $request->choise);
                foreach ($choise as $key => $value) {
                    $att_values = explode(',', $value);
                    $att_values_array = [];
                    for ($i = 0; $i < count($att_values); $i++) {
                        $value_array = request($att_values[$i]);
                        $value_array = explode(',', $value_array);

                        for ($j = 0; $j < count($value_array); $j++) {
                            $att_object = new \stdClass;
                            $value = str_replace(' ', '_', $value_array[$j]);
                            $value = str_replace('-', '~', $value);
                            $att_object->value = $value;
                            $att_values_array[] = $att_object;
                        }
                    }
                    $att_values = [json_encode($att_values_array)];
                    $data = array_merge($data, [
                        ['name' => 'choice_options_' . $choise_attributes[$key], 'contents' => json_encode($att_values)],
                    ]);
                }
                $data = array_merge($data, [
                    ['name' => 'choice_attributes', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice_no', 'contents' => json_encode($choise_attributes)],
                    ['name' => 'choice', 'contents' => json_encode($request->choise)],
                ]);
            }
        }
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $item_update = $item_update->attach('test_img', file_get_contents($test_file), 'test.png');
        // if($request->file('thumbnail_image'))
        // {
        //     $item_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        // }
        if ($request->file('video_file')) {
            $item_update->attach('product_video_file', file_get_contents($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
        }
        if($request->file('meta_image'))
        {
            $item_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());

        }
        if($request->file('pdf_specification_file'))
        {
            $item_update->attach('pdf', file_get_contents($request->file('pdf_specification_file')), $request->file('pdf_specification_file')->getClientOriginalName());
        }
        if($request->is_variant)
        {
            if($request->variant_images)
            {
                foreach($request->variant_images as $key => $value)
                {
                    $item_update = $item_update->attach('img_'.$request->variant_name[$key], file_get_contents($value), $value->getClientOriginalName());
                }
            }

        }
        if($request->gallery_images && count($request->gallery_images)>0)
        {
            foreach($request->gallery_images as $key => $value)
            {
                $item_update = $item_update->attach('photos['.$key.']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $item_update = $item_update->post($this->getApiUrl().'seller_products/update', $data);
        return $item_update;
    }
}
