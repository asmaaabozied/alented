<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDataTable;
use App\Http\Requests;

use App\Models\Newletter;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Packages;
use App\Models\Product;
use App\Models\User;
use App\Repositories\AdminRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Mail;
use Response;

class ReportController extends Controller
{


    public function emailproductss(Request $request)
    {


        $products = Newletter::when($request->search, function ($q) use ($request) {

            return $q->where('email', '%' . $request->search . '%');


        })->latest()->get();

        return view('reports.emails', compact('products'));

    }

    public function destory($id)
    {
        $email = Newletter::find($id);

        $email->delete();
        Flash::success('NewLetter deleted success');

        return back();


    }


    public function showproductss($id)
    {

        $product = Product::find($id);

        return view('reports.show_fields', compact('product'));


    }

    public function Reportproducts(Request $request)
    {


        $products = Product::where('type', null)->when($request->search, function ($q) use ($request) {

            return $q->where('title_en', '%' . $request->search . '%')
                ->orWhere('title_en', 'like', '%' . $request->search . '%');

        })->latest()->get();

        return view('reports.products', compact('products'));

    }

    public function statusproduct($id, Request $request)
    {

        $info = Product::find($id);
        $status = ($info->status == 0) ? 1 : 0;
        $info->status = $status;

        $email = $info->user->email;


        if ($info->status == 0) {

            $data = 'تشكركم إدارة موقع إعلانات.كوم علي إدراج إعلانكم وسوف يتم التعامل مع طلبكم خلال 24 ساعة و إشعاركم في حالة انتهاء إعداد طلبكم
للتواصل 971542211800+';
            Mail::to($email)->send(new \App\Mail\MailMessage($data));


        }
        $info->save();
        Flash::success(__('messages.updated', ['model' => __('models/products.singular')]));
        return back();


    }


    public function Reportuser(Request $request)
    {


        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('title_en', '%' . $request->search . '%')
                ->orWhere('start_date', 'like', '%' . $request->search . '%');

        })->latest()->get();

        return view('reports.advertiement', compact('products'));

    }


    public function Reportusers(Request $request)
    {
        $users = User::when($request->search, function ($q) use ($request) {

            return $q->where('name', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone_number', 'like', '%' . $request->search . '%');

        })->latest()->get();

        return view('reports.users', compact('users'));


    }

    public function Reportpackage(Request $request)
    {
        $packages = Packages::when($request->search, function ($q) use ($request) {

            return $q->where('title_en', '%' . $request->search . '%')
                ->orWhere('duration', 'like', '%' . $request->search . '%')
                ->orWhere('ads_number', 'like', '%' . $request->search . '%')
                ->orWhere('ads_url_number', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('offer', 'like', '%' . $request->search . '%');

        })->latest()->get();

//
//        $packages = Packages::get();

        return view('reports.packages', compact('packages'));


    }


}
