<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePackagesAPIRequest;
use App\Http\Requests\API\UpdatePackagesAPIRequest;
use App\Models\Packages;
use App\Repositories\PackagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PackagesController
 * @package App\Http\Controllers\API
 */

class PackagesAPIController extends AppBaseController
{
    /** @var  PackagesRepository */
    private $packagesRepository;

    public function __construct(PackagesRepository $packagesRepo)
    {
        $this->packagesRepository = $packagesRepo;
    }

    /**
     * Display a listing of the Packages.
     * GET|HEAD /packages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $packages = $this->packagesRepository->List();

        return $this->sendResponse(
            $packages,
            __('messages.retrieved', ['model' => __('models/packages.plural')])
        );
    }

    /**
     * Subscribe a newly created Packages in storage.
     * POST /packages/subscribe
     *
     * @param Request $request
     *
     * @return Response
     */
    public function subscribe(Request $request){
        $package = $this->packagesRepository->subscribe($request);

        if(is_string($package)){
            return $this->sendError("You already Subscribed to this Package");
        }
        return $this->sendResponse(
            $package->toArray(),'You Subscribed to this package successfully');
    }

    /**
     * Store a newly created Packages in storage.
     * POST /packages
     *
     * @param CreatePackagesAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreatePackagesAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $packages = $this->packagesRepository->create($input);

    //     return $this->sendResponse(
    //         $packages->toArray(),
    //         __('messages.saved', ['model' => __('models/packages.singular')])
    //     );
    // }

    /**
     * Display the specified Packages.
     * GET|HEAD /packages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var Packages $packages */
    //     $packages = $this->packagesRepository->find($id);

    //     if (empty($packages)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/packages.singular')])
    //         );
    //     }

    //     return $this->sendResponse(
    //         $packages->toArray(),
    //         __('messages.retrieved', ['model' => __('models/packages.singular')])
    //     );
    // }

    /**
     * Update the specified Packages in storage.
     * PUT/PATCH /packages/{id}
     *
     * @param int $id
     * @param UpdatePackagesAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdatePackagesAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Packages $packages */
    //     $packages = $this->packagesRepository->find($id);

    //     if (empty($packages)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/packages.singular')])
    //         );
    //     }

    //     $packages = $this->packagesRepository->update($input, $id);

    //     return $this->sendResponse(
    //         $packages->toArray(),
    //         __('messages.updated', ['model' => __('models/packages.singular')])
    //     );
    // }

    /**
     * Remove the specified Packages from storage.
     * DELETE /packages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Packages $packages */
    //     $packages = $this->packagesRepository->find($id);

    //     if (empty($packages)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/packages.singular')])
    //         );
    //     }

    //     $packages->delete();

    //     return $this->sendResponse(
    //         $id,
    //         __('messages.deleted', ['model' => __('models/packages.singular')])
    //     );
    // }

    public function live_token_order(Request $request){

        $url = "https://identity.sandbox.ngenius-payments.com/auth/realms/ni/protocol/openid-connect/token";

        $headers = [
            'Authorization: Basic YTU5MTAxMTctNGIzNy00Njc3LTk1MjYtMGYxNDMwOWU0YjA2OmYzNzhiYzEwLTdmYWEtNDQ1Zi1iOGU1LTJiYzljYmQ0N2ViNQ==',
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password&username=info@aelanat.com&password=?q$a#I&w]Z1^')));
        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);
        // dd($response->access_token);

        if(isset($response->access_token)){
            $url = "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/23f92e16-913f-463f-9033-43e716859647/orders";

            $headers = [
                'Authorization: Bearer ' . $response->access_token,
                'Content-Type: application/vnd.ni-payment.v2+json',
                'Accept: application/vnd.ni-payment.v2+json'
            ];
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request->all()));
            $result = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($result);
        }

        return $this->sendResponse($response, 'test link return successfully');
    }

    public function get_order_status(Request $request){
        $url = "https://identity.sandbox.ngenius-payments.com/auth/realms/ni/protocol/openid-connect/token";

        $headers = [
            'Authorization: Basic YTU5MTAxMTctNGIzNy00Njc3LTk1MjYtMGYxNDMwOWU0YjA2OmYzNzhiYzEwLTdmYWEtNDQ1Zi1iOGU1LTJiYzljYmQ0N2ViNQ==',
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password&username=info@aelanat.com&password=?q$a#I&w]Z1^')));
        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        if(isset($response->access_token)){
            $url = "https://api-gateway.sandbox.ngenius-payments.com/transactions/outlets/23f92e16-913f-463f-9033-43e716859647/orders/" . $request->ref;

            $headers = [
                'Authorization: Bearer ' . $response->access_token,
            ];
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($result);
        }
        // dd($response);

        $success = false;

        if($response->_embedded->payment[0]->state == "CAPTURED"){
            $success = true;
        }

        return $this->sendResponse($success, 'test link return successfully');
    }
}
