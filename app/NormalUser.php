<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'normal_users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function generateAccessToken($id)
    {
        $this->access_token = random_int(1, 99) . date('siHYdm') . random_int(1, 99);
        $this->save();
        return $this->access_token;
    }

    public function InviteCode($id, $name)
    {
        $name = strtoupper(substr($name, 0, 3));
        $id = (2) * ($id);
        $this->invite_code = $name . $id;
        $this->save();
        return $this->invite_code;
    }
}
