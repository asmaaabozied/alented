<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version September 13, 2020, 12:00 pm UTC
 *
 * @property string $name
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string'
    ];

    public function permissions(){
        return $this->belongsToMany('App\Models\Permission', 'roles_permissions', 'role_id', 'permission_id');
    }
}
