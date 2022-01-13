<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInformativeDataAPIRequest;
use App\Http\Requests\API\UpdateInformativeDataAPIRequest;
use App\Models\InformativeData;
use App\Models\AdsPDF;
use App\Models\Views;
use App\Repositories\InformativeDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Http\Resources\InformativeData as InformativeResource;

/**
 * Class InformativeDataController
 * @package App\Http\Controllers\API
 */

class InformativeDataAPIController extends AppBaseController
{
    /** @var  InformativeDataRepository */
    private $informativeDataRepository;

    public function __construct(InformativeDataRepository $informativeDataRepo)
    {
        $this->informativeDataRepository = $informativeDataRepo;
    }

    /**
     * Display a listing of the InformativeData.
     * GET|HEAD /informativeDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $informativeDatas = $this->informativeDataRepository->informative($request->data);
        
        

        return $this->sendResponse(
            $informativeDatas,
            __('messages.retrieved', ['model' => __('models/informativeDatas.plural')])
        );
    }

    public function all_pdf(){
        $pdf = AdsPDF::latest()->first();
       
             
       /*  return $this->sendResponse(
            $pdf, "All Ads PDF"
        ); */

     
        $allpdf = $pdf->toArray();
    
        $allpdf['english_pdf']=url($allpdf['english_pdf']);
        $allpdf['arabic_pdf']=url($allpdf['arabic_pdf']);
        return $this->sendResponse(
            $allpdf, "All Ads PDF"
        );
    }

    public function views(){
        $ip = request()->ip();

     //   if(!Views::where('ip-address', $ip)->exists()){
            $add_ip = new Views(['ip-address' => $ip]);
            $add_ip->save();
       // }

        $views = Views::count();

        return $this->sendResponse(
            $views, "All Views Counter"
        );
    }
    
     public function update_viewcount()
    {
       $res= AdsPDF::latest()->first()->increment('view_count', 1);
         
         return $this->sendResponse(
            $res, "All ads view Counter"
        );
    }

    public function update_downloadcount()
    {
       $res= AdsPDF::latest()->first()->increment('download_count', 1);
         
         return $this->sendResponse(
            $res, "All ads download Counter"
        );
    }

    /**
     * Store a newly created InformativeData in storage.
     * POST /informativeDatas
     *
     * @param CreateInformativeDataAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateInformativeDataAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $informativeData = $this->informativeDataRepository->create($input);

    //     return $this->sendResponse(
    //         $informativeData->toArray(),
    //         __('messages.saved', ['model' => __('models/informativeDatas.singular')])
    //     );
    // }

    /**
     * Display the specified InformativeData.
     * GET|HEAD /informativeDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var InformativeData $informativeData */
    //     $informativeData = $this->informativeDataRepository->find($id);

    //     if (empty($informativeData)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/informativeDatas.singular')])
    //         );
    //     }

    //     return $this->sendResponse(
    //         $informativeData->toArray(),
    //         __('messages.retrieved', ['model' => __('models/informativeDatas.singular')])
    //     );
    // }

    /**
     * Update the specified InformativeData in storage.
     * PUT/PATCH /informativeDatas/{id}
     *
     * @param int $id
     * @param UpdateInformativeDataAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateInformativeDataAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var InformativeData $informativeData */
    //     $informativeData = $this->informativeDataRepository->find($id);

    //     if (empty($informativeData)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/informativeDatas.singular')])
    //         );
    //     }

    //     $informativeData = $this->informativeDataRepository->update($input, $id);

    //     return $this->sendResponse(
    //         $informativeData->toArray(),
    //         __('messages.updated', ['model' => __('models/informativeDatas.singular')])
    //     );
    // }

    /**
     * Remove the specified InformativeData from storage.
     * DELETE /informativeDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var InformativeData $informativeData */
    //     $informativeData = $this->informativeDataRepository->find($id);

    //     if (empty($informativeData)) {
    //         return $this->sendError(
    //             __('messages.not_found', ['model' => __('models/informativeDatas.singular')])
    //         );
    //     }

    //     $informativeData->delete();

    //     return $this->sendResponse(
    //         $id,
    //         __('messages.deleted', ['model' => __('models/informativeDatas.singular')])
    //     );
    // }
}
