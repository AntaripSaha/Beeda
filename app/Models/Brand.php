<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

use App\Upload;



/**

 * App\Models\Brand

 *

 * @property int $id

 * @property string $name

 * @property string|null $logo

 * @property int $top

 * @property \Illuminate\Support\Carbon $created_at

 * @property \Illuminate\Support\Carbon $updated_at

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand newModelQuery()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand newQuery()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand query()

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereCreatedAt($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereId($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereLogo($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereName($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereTop($value)

 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand whereUpdatedAt($value)

 * @mixin \Eloquent

 */



class Brand extends Model

{


    public function logo()
    {

        return $this->belongsTo(Upload::class, 'logo');

    }

    public function logo_image()
    {

        return $this->belongsTo(Upload::class, 'logo');

    }

}

