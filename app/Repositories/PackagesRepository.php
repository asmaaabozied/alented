<?php

namespace App\Repositories;

use App\Models\Packages;
use App\Models\UserSupscription;
use App\Repositories\BaseRepository;
use App\Http\Resources\Packages as PackagesResources;
use Auth;

/**
 * Class PackagesRepository
 * @package App\Repositories
 * @version August 25, 2020, 10:04 am UTC
*/

class PackagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'duration',
        'ads_number',
        'ads_url_number',
        'ad_charater_number',
        'price',
        'offer'
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
        return Packages::class;
    }

    /**
     * get Packages for API
     */
    public function List(){
        $packages  = $this->model->latest()->get();

        return PackagesResources::collection($packages);
    }

    /**
     * subscribe package
     */
    public function subscribe($request){
        $input = $request->all();

        $input['user_id'] = Auth::user()->id;
        if(UserSupscription::where('user_id', $input['user_id'])->where('package_id', $input['package_id'])->where('end_date', '>', today()->format('Y-m-d'))->where('active', 1)->exists()){
            return "already subscribed";
        }else{
            $olderSupscription = Auth::user()->Subscribtion;

            $package = $this->model->find($input['package_id']);

            if($olderSupscription != null && $package->id != $olderSupscription->package->id){
                $olderSupscription->active = 0;
                $olderSupscription->save();
            }

            $input['start_date'] = today()->format('Y-m-d');
    
            $input['price'] = $package->price - $package->offer;
            if($package->duration == 1){
                $input['end_date'] = date('Y-m-d',strtotime('+30 days',strtotime(today()->format('Y-m-d'))));
            }
            if($package->duration == 2){
                $input['end_date'] = date('Y-m-d',strtotime('+3 months',strtotime(today()->format('Y-m-d'))));
            }
            if($package->duration == 3){
                $input['end_date'] = date('Y-m-d',strtotime('+1 year',strtotime(today()->format('Y-m-d'))));
            }

            $newSubscription = new UserSupscription($input);
            $newSubscription->save();

            return $newSubscription;
        }
    }

    /**
     * Get Subscriptions Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $subscriptions = UserSupscription::count();

        return $subscriptions;
    }
}
