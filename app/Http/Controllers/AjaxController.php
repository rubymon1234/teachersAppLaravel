<?php

namespace App\Http\Controllers;

use URL;
use Carbon\Carbon;
use App\Models\Stall;
use App\Models\Market;
use App\Models\MarketAvailability;
use App\Models\StallAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function postCreateStall(Request $request){

    	$responseArr = array();
    	
    	if($request->ajax()) {

    		$position_x     =  request('position_x');
    		$position_y     =  request('position_y');
            $title          =  request('title');
    		$market_id     	=  request('market_id');
           
            $stallCount     =   Stall::where('market_id',$market_id)->get();
            $market         =   Market::find($market_id);
            $marketName     =   $market->name;
            $count          =   $stallCount->count()+1;
            $count          =   str_pad($count, 4, "0",STR_PAD_LEFT);
            $stallNosub     =   strtoupper(substr($marketName,0,3));

    		if($position_x !='' && $position_y !='' && $title !=''){
    			
    			$stall = new Stall();
	    		$stall->title 		= $title;
	    		$stall->position_x 	= $position_x;
	    		$stall->position_y 	= $position_y;
	    		$stall->market_id  	= $market_id;
                $stall->stall_no    = $stallNosub.$count;
	    		$stall->save();

	    		$responseArr['success'] = 1;
    		}else{
    			$responseArr['success'] = 0;
    			$responseArr['position_x'] = $position_x;
    			$responseArr['position_y'] = $position_y;
    		}

    		return response()->json(['response' => $responseArr]);
    	}
    }

    public function getStall(){

        $marketId = request('marketid');

    	$stall = Stall::where('market_id',$marketId)->get();

    	$statllArr = array();
    	foreach ($stall as $key => $value) {
            
            $stall_no = ($value->stall_no) ? $value->stall_no : 'Not mentioned Yet';

            if($value->status=='1'){
                $color = 'green';
                $status = 'Available';
            }elseif ($value->status=='2') {
                $color = 'red';
                $status = 'Sold';
            }elseif ($value->status=='3') {
                $color = 'grey';
                $status = 'UnAvailable';
            }

            if($value->area ==''){
                $area = 'Not Mentioned';
            }else{
                $area = $value->area;
            }   

    		$statllArr[] = array(
						'title'=>$value->title,
						'description'=>$value->description,
						'color'=>$color,
						'stallNo'=>$stall_no,
						'area'=>$area,
						'status'=>$status,
						'price'=>'$999',
						'x'=>$value->position_x,
						'y'=>$value->position_y,
					);
    	}

        return json_encode($statllArr);
    }

    public function postCreateMarket(Request $request){

        $response = array();

        if($request->market_name && $request->location_name && $request->description){

            if($request->market_id ==''){

                $user           = Auth::user();
                $owner_id       = $user->id;
                $market = new Market();
                $market->name = $request->market_name;
                $market->description = $request->description;
                $market->location = $request->location_name;
                
                if ($request->file('location_image')) {
                    $file = $request->file('location_image');
                    $filename = 'market_location_'.uniqid().strtotime("now").'.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/market/';
                    $file->move($path, $filename);
                    $market->location_image = $filename;
                }
                if ($request->file('layout_image')) {
                    $file = $request->file('layout_image');
                    $fileRenamedname = 'market' . '.'.$file->getClientOriginalExtension();
                    $layout_filename = 'market_layout_'.uniqid().strtotime("now").'.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/market/';
                    $file->move($path, $layout_filename);
                    $market->layout_image = $layout_filename;  
                }
                $market->owner_id = $owner_id;
                $market->save();
                $this->saveAvailabilityDates($market->id,$request->StartDate);

                $response['status'] = 0;
                $response['marketId'] = $market->id;
                $response['market_name'] = $request->market_name;
                $response['location_name'] = $request->location_name;
                $response['description'] = $request->description;
                $response['url'] = URL::to('/').'/market/'.$layout_filename;
                $response['message'] = 'Updated Successfully';

            }else{

                $this->saveAvailabilityDates($request->market_id,$request->StartDate);
                $response['status'] = 0;
                $market = Market::find($request->market_id);
                $market->name = $request->market_name;
                $market->description = $request->description;
                $market->location = $request->location_name;
                if ($request->file('location_image')) {
                    $file = $request->file('location_image');
                    $filename = 'market_location_'.uniqid().strtotime("now").'.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/market/';
                    $file->move($path, $filename);
                    $market->location_image = $filename;
                }
                if ($request->file('layout_image')) {
                    $file = $request->file('layout_image');
                    $fileRenamedname = 'market' . '.'.$file->getClientOriginalExtension();
                    $layout_filename = 'market_layout_'.uniqid().strtotime("now").'.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/market/';
                    $file->move($path, $layout_filename);
                    $market->layout_image = $layout_filename;  
                }
                $market->save();

                $response['marketId'] = $market->id;
                $response['market_name'] = $request->market_name;
                $response['location_name'] = $request->location_name;
                $response['description'] = $request->description;
                $response['url'] = URL::to('/').'/market/'.$market->layout_image;
                $response['message'] = 'Updated Successfully';
            }

            
        }else{
            $response['status'] = 1;
            $response['message'] = 'Validation Error';
        }

        return $response;
    }

    public function getUpdateStallDetails(Request $request){

        $area           = $request->area;
        $diameter       = $request->diameter;
        $title          = $request->title;
        $startDate      = $request->startDate;
        $endDate        = $request->endDate;
        $actionId       = $request->actionId;
        $stallId        = $request->stallId;
        $description    = $request->description;
        $catName        = $request->catName;
        $status         = $request->status;
        $stall_no       = $request->stall_no;

        $stall = Stall::find($stallId);
        $stall->area           = $area;
        $stall->title          = $title;
        $stall->description    = $description;

        $response['marketId'] = $stall->market_id;
        $stall->save();

        if($request->startDate !=''){
            $this->saveAvailabilityDatesStall($stallId,$stall->market_id,$request->startDate);
        }
        $response['error'] = 0;
        $response['status'] = $stall_no.'Stall Updated Successfully';

        return $response;
    }
    public function getDeleteStallDetails(Request $request){

        $stallId    = $request->stallId;
        $stall = Stall::find($stallId);
        $stall->delete();
        $response['error'] = 0;
        $response['status'] = 'Stall Deleted Successfully';

        return $response;
    }


    public function saveAvailabilityDates($market_id,$dateArr){

        if($dateArr !=''){

            $datedetails = explode(',', $dateArr);
            $isExist = MarketAvailability::where('market_id',$market_id)->delete();

            foreach ($datedetails as $key => $date) {
                $start_time = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');

                $marketAvailability = new MarketAvailability();
                $marketAvailability->market_id   = $market_id;
                $marketAvailability->date        = $start_time;
                $marketAvailability->save();
                
            }
            return true;
        }
        return true;
    }

    public function saveAvailabilityDatesStall($stall_Id,$market_id,$dateArr){

        if($dateArr !=''){

            $datedetails = explode(',', $dateArr);
            $isExistData = StallAvailability::where('stall_id',$stall_Id);
            $isExistData->delete();

            foreach ($datedetails as $key => $date) {

                $start_time = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
                $isExist = MarketAvailability::where('market_id',$market_id)
                                                ->where('date',$date);
                $data           =  $isExist->get();
                $isExistCount   =  $isExist->count();
                if($isExistCount ==0){  
                }else{
                    $stallAvailability = new StallAvailability();
                    $stallAvailability->market_availability_id   = $data[0]->id;
                    $stallAvailability->stall_id    = $stall_Id;      
                    $stallAvailability->save();
                } 
            }
            return true;
        }
        return true;
    }

    public function getImgDetails(Request $request){

        $market_id = request('market_id');
        $market = Market::find($market_id);

        $response['marketId'] = $market_id;
        $response['market_name'] = $market->name;
        $response['description'] = $market->description;
        $response['url'] = URL::to('/').'/market/'.$market->layout_image;
        $response['status'] =0;

        return $response;
    }
    public function getSearchStall(){

        $marketId   = request('marketid');
        $dateid     = request('dates');

        if($dateid){
            $dates = explode(',',$dateid);
        }

        $stall = StallAvailability::where('stall_availabilities.status',1)
                                    ->select('s.stall_no','s.status','s.area','s.description','s.title','s.position_x','s.position_y','s.id')
                                    ->join('stalls as s','s.id','=','stall_availabilities.stall_id')
                                    ->whereIn('market_availability_id',$dates)
                                    ->groupBy('stall_id')
                                    ->get();
        $statllArr = array();
        foreach ($stall as $key => $value) {
            
            $stall_no = ($value->stall_no) ? $value->stall_no : 'Not mentioned Yet';

            if($value->status=='1'){
                $color = 'green';
                $status = 'Available';
            }elseif ($value->status=='2') {
                $color = 'red';
                $status = 'Sold';
            }elseif ($value->status=='3') {
                $color = 'grey';
                $status = 'UnAvailable';
            }

            if($value->area ==''){
                $area = 'Not Mentioned';
            }else{
                $area = $value->area;
            }   

            $statllArr[] = array(
                        'id'=>$value->id,
                        'title'=>$value->title,
                        'description'=>$value->description,
                        'color'=>$color,
                        'stallNo'=>$stall_no,
                        'area'=>$area,
                        'status'=>$status,
                        'price'=>'$999',
                        'x'=>$value->position_x,
                        'y'=>$value->position_y,
                    );
        }

        return json_encode($statllArr);
    }
    /*public function getStallContent(){

        $stall_id   = request('stall_id');

        $htmlResponse['html'] = view('web.stallInfo.priceInfo', $pageParams)->render();
        $htmlResponse['error'] =0;

        return $htmlResponse;
    }*/
}
