<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FileUpload;
use App\Models\AdsPDF;
use App\Repositories\ClientRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PackagesRepository;
use Yajra\DataTables\DataTables;
use Flash;
class HomeController extends Controller
{
    /** @var  ProductRepository */
    private $productRepository;
    /** @var  ClientRepository */
    private $clientRepository;
    /** @var  PackagesRepository */
    private $packagesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $productRepo, ClientRepository $clientRepo, PackagesRepository $packagesRepo)
    {
        $this->productRepository    = $productRepo;
        $this->clientRepository     = $clientRepo;
        $this->packagesRepository   = $packagesRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients_count            = $this->clientRepository->count();
        $subscriptions_count      = $this->packagesRepository->count();
        $products_count           = $this->productRepository->count();

        $pdf = AdsPDF::latest()->first();
        if($pdf != null){
            $pdf = $pdf->pdf;
        }
        return view('home')->with([ 'pdf' => $pdf, 'clients' => $clients_count, 'subscriptions' => $subscriptions_count, 'products' => $products_count]);
    }

    public function today_products(){
        $today_products = $this->productRepository->today();
    
        return DataTables::of($today_products)->addColumn('action', function($row){
            return "<div class='btn-group'><a href='". route('products.show', $row->id) ."' class='btn btn-default btn-xs'><span class='tooltiptext'>Show</span><i class='glyphicon glyphicon-eye-open'></i></a><a href='". route('products.edit', $row->id) ."' class='btn btn-default btn-xs'><span class='tooltiptext'>Edit</span><i class='glyphicon glyphicon-edit'></i></a></div>";
        })->editColumn('created_at', function ($row) {
            //change over here
            return $row->created_at->format('H:i - d-m-Y');
        })->make(true);
    }

    public function all_ads_pdf(Request $request){

        $input = $request->all();
        $rules = [
             'english_pdf' => 'required|mimes:pdf',
             'arabic_pdf' => 'required|mimes:pdf'
           
        ];
       

        $request->validate($rules);

       
        if(request()->hasFile('english_pdf')){
            $input['english_pdf'] = FileUpload::uploadFile('upload/ALL', request()->file('english_pdf'), '-all-');
        }
        if(request()->hasFile('arabic_pdf')){
            $input['arabic_pdf'] = FileUpload::uploadFile('upload/ALL', request()->file('arabic_pdf'), '-all-');
        }

        $pdf = new AdsPDF($input);
        $pdf->save();
        Flash::success(__('messages.saved', ['model' => __('messages.all_ads_saved_success')]));
        return redirect(route('home'));
    }
}
