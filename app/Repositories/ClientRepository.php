<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Helpers\SMS;
use App\Http\Resources\Client as ClientResource;
use App\Http\Resources\LoggedClient;
use Auth;
use DB;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version August 25, 2020, 1:07 pm UTC
*/

class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'name',
        'phone_number',
        'image',
        'password'
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
     * Create model record
     *
     * @param array $input
     *
     * @return User
     */
    public function create($input)
    {
        $header  = request()->header('Accept-Language');

        if (request()->hasFile('image')) {
            $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
        }
        if (request()->hasFile('trade_license')) {
            $input['trade_license'] = FileUpload::uploadFile('upload/Clients', request()->file('trade_license'), '-clients-');
        }
         if (request()->hasFile('identity_proof')) {
            $input['identity_proof'] = FileUpload::uploadFile('upload/Clients', request()->file('identity_proof'), '-clients-');
        }

        $input['password']  = bcrypt($input['password']);
        $input['role_id']   = 2;

        $client = new User();
        $client->fill($input)->save();

        $token = $client->createToken('Laravel Personal Access Account')->accessToken;
        $client->token  = $token;

        return new LoggedClient($client);
    }

    /**
     * Login user
     *
     * @param array $input
     *
     * @return User
     */
    public function login($input){
        $creds = [];
        $creds['password'] = $input['password'];
        if(filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
            $creds['email'] = $input['email'];
        }else{
            $creds['phone_number'] = $input['email'];
        }
        $creds['active'] = 1;

        if(Auth::attempt($creds)) {
            $client = Auth::user();

            if(isset($input['firebase_token']) && $input['firebase_token'] != null){
                $client->firebase_token = $input['firebase_token'];
                $client->save();
            }

            $token = $client->createToken('Laravel Password Grant Client')->accessToken;
            $client->token  = $token;

            return new LoggedClient($client);
        } else {
            return false;
        }
    }

    /**
     * Login user
     *
     * @param array $input
     *
     * @return User
     */
    public function social_login($input){
        $client = $this->model->where($input['social_login'] . '_id', $input[$input['social_login'] . '_id'])->where('social_login', $input['social_login'])->first();

        if($client) {

            if(isset($input['firebase_token']) && $input['firebase_token'] != null){
                $client->firebase_token = $input['firebase_token'];
                $client->save();
            }

            $token = $client->createToken('Laravel Password Grant Client')->accessToken;
            $client->token  = $token;


        } else {
            if (request()->hasFile('image')) {
                $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
            }

            $input['role_id']   = 2;

            $client = new User();
            $client->fill($input)->save();

        }

        $token = $client->createToken('Laravel Personal Access Account')->accessToken;
        $client->token  = $token;

        return new LoggedClient($client);
    }

    /**
     * Logout user
     *
     * @param array $input
     *
     * @return boolean
     */
    public function logout(){
        Auth::user()->token()->revoke();
        return true;
    }

    /**
     * Change User Password
     *
     * @param array $input
     *
     * @return boolean
     */
    public function changePassword($input){
        $client = Auth::user();

        $client->password = bcrypt($input['new_password']);
        $client->save();

        return true;
    }

    /**
     * Update user Data
     *
     * @param array $input
     *
     * @return User
     */
    public function edit_profile($input){
        $client = Auth::user();

        if (request()->hasFile('image')) {
            $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
        }

        if (request()->hasFile('trade_license')) {
            $input['trade_license'] = FileUpload::uploadFile('upload/Clients', request()->file('trade_license'), '-clients-');
        }
         if (request()->hasFile('identity_proof')) {
            $input['identity_proof'] = FileUpload::uploadFile('upload/Clients', request()->file('identity_proof'), '-clients-');
        }

        if(isset($input['password'])){
            unset($input['password']);
        }

        $client->fill($input)->save();

        return new ClientResource($client);
    }

    /**
     * Update user Data
     *
     * @param array $input
     *
     * @return User
     */
    public function update($input, $id){
        $client = $this->model->find($id);

        if (request()->hasFile('image')) {
            $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
        }

        if(isset($input['password']) && !empty($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }else{
            unset($input['password']);
        }

        $client->fill($input)->save();

        return $client;
    }

    /**
     * get one client data
     */
    public function getOne(){
        $client    = Auth::user();

        return new ClientResource($client);
    }

    /**
     * send code for verfication
     */
      public function send_code($input){

        if(isset($input['email']) && isset($input['phone_number']))
        {
           if(filter_var($input['email'], FILTER_VALIDATE_EMAIL))
           {
               $phone_number="+".$input['phone_number'];
               $client = $this->model->where('phone_number', $phone_number)
                         ->where('email',$input['email'])
                         ->first();

           }
        }

        else if(isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL))
        {
            $attribute = 'email';
            $client = $this->model->where('email',$input['email'])
                         ->first();

        }
        else
        {
            $attribute = 'phone_number';
            $phone_number="+".$input['phone_number'];
            $client = $this->model->where('phone_number',$phone_number)
                         ->first();

        }


       // $client = $this->model->where($attribute, $input['phone_number'])->first();
        $return = [];
        if($client){
            $code = rand ( 1000 , 9999);
           if(isset($input['email']) && isset($input['phone_number']))
            {
                $phone_number="+".$input['phone_number'];
               if(filter_var($input['email'], FILTER_VALIDATE_EMAIL))
                {
                        $to      = $client->email;
                        $subject = 'Verfication code';
                        $message = 'Your verfication code is ' . $code;
                        $headers = array(
                            'From' => 'info@aelanat.com',
                            'X-Mailer' => 'PHP/' . phpversion()
                        );

                        mail($to, $subject, $message, $headers);

                        $response = SMS::sendSms($phone_number, 'Your verfication code is ' . $code);
                        if (array_key_exists('code', $response)){
                            $return['error'] = $response['message'];
                        }else{
                            if (array_key_exists('sid', $response)){
                                $client->code = $code;
                                $client->save();
                                $return['done'] = true;
                            }
                        }
                }
            }
     else if(isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL))
      {
                $to      = $client->email;
                $subject = 'Verfication code';
                $message = 'Your verfication code is ' . $code;
                $headers = array(
                    'From' => 'info@aelanat.com',
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                mail($to, $subject, $message, $headers);

                $client->code = $code;
                $client->save();
                $return['done'] = true;
            }
            else{
                $phone_number="+".$input['phone_number'];
                $response = SMS::sendSms($phone_number, 'Your verfication code is ' . $code);
                if (array_key_exists('code', $response)){
                    $return['error'] = $response['message'];
                }else{
                    if (array_key_exists('sid', $response)){
                        $client->code = $code;
                        $client->save();
                        $return['done'] = true;
                    }
                }
            }

        }else{
            $return['error'] = false;
        }

        return $return;
    }

    /**
     * check code for verfication
     */
    public function check_code($input){

        if(isset($input['email']))
        {
        $client = $this->model->where('code', $input['code'])->where('email', $input['email'])->first();
        }
        else
        {
            $phone="+".$input['phone_number'];
           // echo $phone;exit;
            $client = $this->model->where('code', $input['code'])->where('phone_number', $phone)->first();


        }
       // dd($client);exit;

        if($client){
           $client->delete();
            return true;
        }else{
            return false;
        }
    }

    /**
     * Update user Data
     *
     * @param array $input
     *
     * @return User
     */

    public function sendcode_onregister($input)
    {
          $code = rand ( 1000 , 9999);

          if(isset($input['email']) && isset($input['phone_number']))
            {
               $phone_number="+".$input['phone_number'];
               if(filter_var($input['email'], FILTER_VALIDATE_EMAIL))
                {

                        $existUser = User::where('phone_number' , $input['phone_number'])->where('email',$input['email'])->get();

                        echo count($existUser);exit;
                        if (count($existUser)>0) {
                           $return['error'] = 'true';
                           return $return;
                        }
                        $to      = $input['email'];
                        $subject = 'Verfication code';
                        $message = 'Your verfication code is ' . $code;
                        $headers = array(
                            'From' => 'info@aelanat.com',
                            'X-Mailer' => 'PHP/' . phpversion()
                        );

                        mail($to, $subject, $message, $headers);

                        $response = SMS::sendSms($phone_number, 'Your verfication code is ' . $code);
                        if (array_key_exists('code', $response)){
                            $return['error'] = $response['message'];
                        }else{
                            if (array_key_exists('sid', $response)){
                                $return['done'] = true;
                              //  $return['code']=$code;
                            }
                        }

                      $client = User::create(['email'=>$input['email'],'phone_number' =>$input['phone_number'],'code' =>$code,'role_id'=> 2,'active'=>0]);
                }
            }
     else if(isset($input['email']) && filter_var($input['email'], FILTER_VALIDATE_EMAIL))
        {
             $existUser = User::where('email',$input['email'])->get();
                        if (count($existUser)>0) {
                           $return['error'] = 'true';
                           return $return;
                        }
                $to      = $input['email'];
                $subject = 'Verfication code';
                $message = 'Your verfication code is ' . $code;
                $headers = array(
                    'From' => 'info@aelanat.com',
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                if(mail($to, $subject, $message, $headers))
                {
                      $return['done'] = true;
                    //  $return['code']=$code;
                }

                 $client = User::create(['email'=>$input['email'],'code' => $code,'role_id'=> 2,'active'=>0]);
            }
            else if(isset($input['phone_number']))
            {

                $phone_number="+".$input['phone_number'];
                $existUser = User::where('phone_number',$input['phone_number'])->get();
                        if (count($existUser)>0) {
                           $return['error'] = 'true';
                           return $return;
                        }
                $response = SMS::sendSms($phone_number, 'Your verfication code is ' . $code);
                if (array_key_exists('code', $response)){
                    $return['error'] = $response['message'];
                }else{
                    if (array_key_exists('sid', $response)){

                        $return['done'] = true;
                       // $return['code']=$code;
                    }
                }
                  $client = User::create(['phone_number'=>$input['phone_number'],'code' =>$code,'role_id'=> 2,'active'=>0]);
            }
            else
            {
                return;
            }
         return $return;

    }
    public function edit_password($input){
        $client = $this->model->where('code', $input['code'])->first();

        if($client){
            $client->password = bcrypt($input['new_password']);
            $client->code     = "";
            $client->save();

            return new ClientResource($client);
        }else{
            return false;
        }

    }

    /**
     * Get Clients Count for Dashboard
     *
     * @return int
     */
    public function count(){
        $clients = $this->model->count();

        return $clients;
    }

    /**
     * pluck users for listing
     */
    public function pluck(){
        $users = $this->model->select("*", DB::raw("CONCAT(users.name,' (',users.email, ')', ' (', users.phone_number, ')') as full_name"))->latest()->where('role_id', 2)->where('active', '1')->pluck('full_name', 'id')->toArray();

        return $users;
    }
}
