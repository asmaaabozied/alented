<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'trade_license',
        'identity_proof',
        'role_id',
        'name', 
        'email', 
        'active',
        'password',
        'phone_number',
        'google_id',
        'twitter_id',
        'facebook_id',
        'social_login',
        'firebase_token',
        'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Register Validation rules
     *
     * @var array
     */
    public static $client_register_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email|unique:users,email,NULL,id,role_id,2',
        'password'         => 'required|confirmed|min:8',
        'phone_number'     => 'required|string|unique:users,phone_number,NULL,id,role_id,2',
        'trade_license'    => 'file|mimes:jpeg,pdf',
        'identity_proof'      => 'file|mimes:jpeg,pdf',
        
    ];

    /**
     * Update Validation rules
     *
     * @var array
     */
    public static $client_update_rules = [
        'name'             => 'string',
        'email'            => 'email',
        'password'         => 'confirmed|min:8',
        'phone_number'     => 'string',
        'image'            => 'file|image',
        'trade_license'    => 'file|mimes:jpeg,pdf',
        'identity_proof'      => 'file|mimes:jpeg,pdf',
    ];

    /**
     * Login Validation rules
     * 
     * @var array
     */
    public static $client_login_rules = [
        'email'            => 'required',
        'password'         => 'required'
    ];

    /**
     * Change Password rules
     * 
     * @var array
     */
    public static $change_password_rules =[
        'current_password'            => 'required',
        'new_password'                => 'required|different:current_password',
        'new_password_confirmation'   => 'required|same:new_password',
    ];

   /**
     * Create Admin Validation Rules
     * 
     * @var array
     */
    public static $admin_create_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email|unique:users,email,NULL,id',
        'password'         => 'required|string|confirmed|min:8',
        'phone_number'     => 'required',
        'image'            => 'file|image',
        'role_id'          => 'required|exists:roles,id'
    ];

    /**
     * Update Admin Validation Rules
     * 
     * @var array
     */
    public static $admin_update_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email',
        // 'password'        => 'confirmed|min:8',
        'phone_number'     => 'required',
        'image'            => 'file|image',
        'role_id'          => 'required|exists:roles,id'

    ];

    public function Subscribtion(){
        return $this->hasOne('App\Models\UserSupscription', 'user_id')->latest()->where('active', 1)->where('end_date', '>', today()->format('Y-m-d'))->with('package');
    }

    public function activeSubscription(){
        return $this->Subscribtion->where('end_date', '>', today()->format('Y-m-d'))->first()->with('package');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function hasPermission($requested_permission){
        $has = false;

        foreach($this->role->permissions as $permission){
            if($permission->name == $requested_permission){
                $has = true;
            }
        }

        return $has;
    }
}
