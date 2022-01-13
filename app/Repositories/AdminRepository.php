<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;

/**
 * Class AdminRepository
 * @package App\Repositories
 * @version September 13, 2020, 12:36 pm UTC
*/

class AdminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'role_id',
        'active',
        'image'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return User
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Admins', request()->file('image'), '-admin-');
        }

        $input['password']  = \bcrypt($input['password']);

        $admin = new User();
        $admin->fill($input)->save();

        return $admin;
    }

    public function update($input, $id){
        $admin = $this->model->find($id);

        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Admins', request()->file('image'), '-admin-');
        }

        if(isset($input['password']) && !empty($input['password'])){
            $input['password'] = \bcrypt($input['password']);
        }else{
            $input['password'] = $admin->password;
        }

        $admin->fill($input)->save();

        return $admin;
    }
}
