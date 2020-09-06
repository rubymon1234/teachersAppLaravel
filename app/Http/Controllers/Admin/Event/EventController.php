<?php

namespace App\Http\Controllers\Admin\Event;

use Carbon\Carbon;
use App\Models\eventCms;
use App\Models\EventCategory;
use App\Models\EventBasicInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * @author ruban
     */
    public function eventDetailView()
    {
        $eventDetail = EventBasicInfo::paginate(10);
        return view('admin.event.eventDetailView',compact('eventDetail'));
    }

    /**
     * @author ruban
     */
    public function getEventDetailCreate()
    {
    	$categorys = EventCategory::where('status',1)->get();
        return view('admin.event.eventDetailCreate',compact('categorys'));
    }

    /**
     * @author ruban
     */
    public function postEventDetailCreate(Request $request)
    {
        try {
            if($request->Update =='Save'){
                $dates = explode(" - ", $request->startEndDate);
                
                $rule = [
                    'category' => 'required',
                    'startEndDate' => 'required',
                    'prizeRange' => 'required',
                ];
                $messages = [
                    'category.required' => 'Category Name is required',
                    'startEndDate.required' => 'startEndDate is required',
                    'prizeRange.required' => 'prize Range is required',
                ];
                $validator = Validator::make(Input::all(), $rule, $messages);

                if ($validator->fails()) {

                        return redirect()->route('event.create.event')->withInput(Input::all())->withErrors($validator);
                }

                if(isset($dates)){
                    $startDate = Carbon::createFromFormat('m/d/Y', $dates[0])->format('Y-m-d');
                    $endDate = Carbon::createFromFormat('m/d/Y', $dates[1])->format('Y-m-d');
                }
                
                $eventBasicInfo = new EventBasicInfo();
                $eventBasicInfo->event_id = $request->category;
                $eventBasicInfo->event_start_date = $startDate;
                $eventBasicInfo->event_end_date = $endDate;
                $eventBasicInfo->rate = $request->prizeRange;
                $eventBasicInfo->save();

                if ($request->file('layoutImage')) {
                    $eventCms = new eventCms();
                    $eventCms->event_basic_info_id = $eventBasicInfo->id;
                    $eventCms->key_slug = 'event_layout';
                    $file = $request->file('layoutImage');
                    $filename = 'event_layout_'.uniqid().strtotime("now").'.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/eventLayoutImg/';
                    $file->move($path, $filename);
                    $eventCms->key_value = $filename;
                    $eventCms->save();
                }
                $eventImg = array();
                for($i=0; $i<=(count($request->eventImage)-1); $i++){
                    if ($request->file('eventImage')[$i]) {
                        $file = $request->file('eventImage')[$i];
                        $fileRenamedname = uniqid().strtotime("now").'_'.uniqid().'_'.uniqid().'.'. $file->getClientOriginalExtension();
                        $path = public_path() . '/eventEventImg/';
                        $file->move($path, $fileRenamedname);
                        $eventImg['event_image'][$i] = $fileRenamedname;
                    }
                }
                $eventCmsNew = new eventCms();
                $eventCmsNew->event_basic_info_id = $eventBasicInfo->id;
                $eventCmsNew->key_slug = 'event_gallery';
                $eventCmsNew->key_value = serialize($eventImg);
                $eventCmsNew->save();

                return redirect()->route('event.view.event')->with('success_message', 'New Event successfully Added ');
            }
        
            if ($request->Cancel =='cancel') {
                return redirect()->route('event.view.event')->with('warning_message', 'Request is Rollback');
            }
        } catch (\Exception $e) {
            return redirect()->route('event.view.event')->with('warning_message', $e->getMessage());
        }
    }

    /**
     * @author ruban
     */
    public function viewEvent(){

    	$eventCategory = EventCategory::paginate(10);
        return view('admin.event.viewEvent',compact('eventCategory'));
    }

    /**
     * @author ruban
     */
    public function getEventDetailEdit($eventInfoId){

        $categorys = EventCategory::where('status',1)->get();
        $eventDetail = EventBasicInfo::find($eventInfoId);
        $cmsDetailGallery = eventCms::where('event_basic_info_id',$eventInfoId)->where('key_slug','event_gallery')->get()->toArray();
        $cmsDetailGallery = $cmsDetailGallery[0]['key_value'];
        return view('admin.event.eventDetailEdit',compact('categorys','cmsDetailGallery','eventDetail'));
    }
}
