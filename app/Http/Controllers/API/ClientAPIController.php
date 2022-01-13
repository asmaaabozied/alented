<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientAPIRequest;
use App\Http\Requests\API\UpdateClientAPIRequest;
use App\Http\Requests\API\LoginClientsAPIRequest;
use App\Http\Requests\API\ChangePasswordClientsAPIRequest;
use App\Models\User;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientController
 * @package App\Http\Controllers\API
 */

class ClientAPIController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Store a newly created Clients in storage.
     * POST /clients
     *
     * @param CreateClientsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientRepository->create($input);
        // dd($clients);
        return $this->sendResponse($clients, 'Clients saved successfully');
    }

    /**
     * Display a listing of the Client.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = $this->clientRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $clients->toArray(),
            __('messages.retrieved', ['model' => __('models/clients.plural')])
        );
    }

    /**
     * Login Clients in storage.
     * POST /clients
     *
     * @param LoginClientsAPIRequest $request
     *
     * @return Response
     */
    public function login(LoginClientsAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientRepository->login($input);

        if($clients){
            return $this->sendResponse($clients, trans('messages.login_ok'));
        }else{
            return $this->sendError(trans('messages.login_client_error1'));
        }
        
    }

    /**
     * Social Login/register Clients in storage
     * POST /clients
     *
     * @param Request $request
     *
     * @return Response
     */
    public function social_login(Request $request){
        $input = $request->all();

        $clients = $this->clientRepository->social_login($input);
        // dd($clients);
        return $this->sendResponse($clients, trans('messages.login_ok'));
    }

    /**
     * Logout Clients
     * POST /clients
     * 
     * @return Response
     */
    public function logout(){
        $this->clientRepository->logout();

        return $this->sendSuccess(trans('messages.logout'));
    }

    /**
     * Change client password
     * POST /clients
     * 
     * @param ChangePasswordClientsAPIRequest $request
     * 
     * @return Response
     */
    public function change_password(ChangePasswordClientsAPIRequest $request){
        $input = $request->all();

        $clients = $this->clientRepository->changePassword($input);

        return $this->sendResponse($clients, trans('messages.change_password_ok'));
    }

    /**
     * Display the specified Clients.
     * GET|HEAD /clients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        /** @var Clients $clients */

        $clients = $this->clientRepository->getOne();

        if (empty($clients)) {
            return $this->sendError('Clients not found');
        }

        return $this->sendResponse($clients, 'Clients retrieved successfully');
    }

    /**
     * Update the specified Clients in storage.
     *
     * @param UpdateClientsAPIRequest $request
     *
     * @return Response
     */
    public function update(UpdateClientAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientRepository->edit_profile($input);

        return $this->sendResponse($clients, trans('messages.edit_profile'));
    }

    public function send_code(Request $request){
        $input = $request->all();

        $client = $this->clientRepository->send_code($input);
        
        if(isset($client['done'])){
            return $this->sendSuccess('Code sent successfully');
        }else{
            if($client['error'] == false){
                return $this->sendError('This phone number is not registered');
            }
            else{
                return $this->sendError($client['error']);
            }
        }
    }
    
    public function sendcode_onregister(Request $request){
        $input = $request->all();

        $client = $this->clientRepository->sendcode_onregister($input);
        
        if(isset($client['done'])){
            return $this->sendSuccess('Code sent successfully');
        }else{
            if($client['error'] == true){
                return $this->sendError('This user already exist');
            }
           
            else{
                return $this->sendError($client['error']);
            }
        }
    }

    public function check_code(Request $request){
        $input = $request->all();

        $client = $this->clientRepository->check_code($input);
        
        if($client){
            return $this->sendSuccess('Code matched successfully');
        }
        
        return $this->sendError("Error in Code");
    }

    public function forget_password(Request $request){
        $input = $request->all();

        $client = $this->clientRepository->edit_password($input);
        
        if($client){
            return $this->sendSuccess('Password Changed successfully');
        }
        
        return $this->sendError("Error in Code");
    }
}
