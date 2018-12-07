<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Notifiable,Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wx_name',
        'wx_avatar',
        'openid',
        'phone',
        'type',
        'vip',
        'vip_exp_at',
        'status',
        'work_no',
    ];


    /**
     * 查询状态
     * @param $field
     * @return null|string
     */
    public static function isStatus($field){
        $data = self::where($field)->first();
        if ($data){
            if ($data->status == 0){
                return 'disable';
            }else if ($data->status == 1){
                return 'enable';
            }
        }
        return null;
    }

    /**
     * 查询是否存在
     * @param $field
     * @param null $id
     * @return bool
     */
    public static function isExist($field, $id = null){
        $data = self::where($field)->first();
        if ($data){
            if ($id){
                if ($id != $data->id){
                    return true;
                }
            }else{
                return true;
            }
        }
        return false;
    }
}
