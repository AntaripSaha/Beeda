<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use App;
use Illuminate\Support\Facades\App as FacadesApp;

class Brand extends Model

{

  public function getTranslation($field = '', $lang = false){

      $lang = $lang == false ? FacadesApp::getLocale() : $lang;

      $brand_translation = $this->hasMany(BrandTranslation::class)->where('lang', $lang)->first();

      return $brand_translation != null ? $brand_translation->$field : $this->$field;

  }



  public function brand_translations(){

    return $this->hasMany(BrandTranslation::class);

  }

  public function logo()
  {

      return $this->belongsTo(Upload::class, 'logo');

  }

  public function logo_image()
  {

      return $this->belongsTo(Upload::class, 'logo');

  }



}

