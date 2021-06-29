<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use App\User;
use App\Rating;
use Carbon\Carbon;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;
use App\Review;
use App\Referal;

class UsersController extends Controller
{
    public function getIndex(){
        if(auth()->user()->hasRole('user')){
            $users = User::orderBy('id','DESC')->get();
        }else{
            $users = User::orderBy('id','DESC')->where('status',1)->get();
        }//end if else
        return view('users.index',compact('users'));
    }//end getIndex function.
    public function searchByZipCode(Request $request){
        $zip = $request->searchboxAgent;
        if(auth()->user()->hasRole('user')){
            $users = User::whereHas('profile', function($q)use ($zip){
                $q->where('zip1', $zip)->orWhere('zip2',$zip)->orWhere('zip3',$zip)->orWhere('zip4',$zip)->orWhere('zip5',$zip)->orWhere('zip6',$zip)->orWhere('zip7',$zip);
            })->get();
        }else{
            $users = User::where('status',1)->whereHas('profile', function($q)use ($zip){
                $q->where('zip1', $zip)->orWhere('zip2',$zip)->orWhere('zip3',$zip)->orWhere('zip4',$zip)->orWhere('zip5',$zip)->orWhere('zip6',$zip)->orWhere('zip7',$zip);
            })->get();
        }//end if else
        return view('users.index',compact('users'));
    }//end searchByZipCode function.
    public function create(){
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }//end create function.
    public function save(Request $request){
        try{
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:6|confirmed',
                'role' => 'required',
            ],[
                'pic_file.required' => 'Profile picture required',
                'dob.required' => 'Date of Birth required'
            ]);
            //        $user->assignRole($role->name);
            $user =  User::firstOrCreate(['name'=>$request->name,'email'=> $request->email]);
            $user->status = 1;
            $user->password = bcrypt($request->password);
            $user->save();
            if ($file = $request->file('pic_file')) {
                $extension = $file->extension()?: 'png';
                $destinationPath = public_path() . '/storage/uploads/users/';
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                $request['pic'] = $safeName;
            }else{
                $request['pic'] = 'no_avatar.jpg';
            }//end if else.
            $profile = $user->profile;
            if($user->profile == null){
                $profile = new  Profile();
            }//end if.
    /*        if($request->dob != null){
              $date =  Carbon::parse($request->dob)->format('Y-m-d');
            }else{
                $date = $request->dob;
            }*/
            $date = $request->dob??'';
            $profile->user_id = $user->id;
            $profile->bio = $request->bio;
            $profile->gender = $request->gender;
            $profile->dob = $date;
            $profile->country = $request->country;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->address = $request->address;
            $profile->postal = $request->postal;
            $profile->area_sales = $request->area_sales;
            $profile->out_area_sales = $request->out_area_sales;
            $profile->pic = $request['pic'];
            $profile->save();
            $role = Role::find($request->role);
            $user->assignRole($role->name);
            Session::flash('message','User has been added');
            return redirect()->back();
        }catch(\Exception $e){
            Session::flash('message','Unable to add new user');
            return redirect()->back();
        }//end try catch.
    }//end save function.
    public function edit(Request $request){
        $user = User::findOrfail($request->id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }//end edit function.
    public function update(Request $request){
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
            ], [
                'pic_file.required' => 'Profile picture required',
                'dob.required' => 'Date of Birth required'
            ]);
            $user = User::findOrfail($request->id);
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }//end if.
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();
            $profile = $user->profile;
            if ($user->profile == null) {
                $profile = new  Profile();
            }//end if.
            /*        if($request->dob != null){
                        $date =  Carbon::parse($request->dob)->format('Y-m-d');
                    }else{
                        $date = $request->dob;
                    }*/
            $date = $request->dob??'';
            if ($file = $request->file('pic_file')) {
                $extension = $file->extension() ?: 'png';
                $destinationPath = public_path() . '/storage/uploads/users/';
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists($destinationPath . $user->pic)) {
                    File::delete($destinationPath . $user->pic);
                }//end if.
                //save new file path into db
                $profile->pic = $safeName;
            }//end if.
            $profile->user_id = $user->id;
            $profile->bio = $request->bio;
            $profile->gender = $request->gender;
            $profile->dob = $date;
            $profile->country = $request->country;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->address = $request->address;
            $profile->postal = $request->postal;
            $profile->area_sales = $request->area_sales;
            $profile->out_area_sales = $request->out_area_sales;
            $profile->brokerage_name = $request->brokerage_name;
            $profile->office_phone = $request->office_phone;
            $profile->mobile_phone = $request->mobile_phone;
            $profile->license_state = $request->license_state;
            $profile->license_number = $request->license_number;
            $profile->area_sales = $request->area_sales;
            $profile->out_area_sales = $request->out_area_sales;
            $profile->condo = $request->condo;
            $profile->earning = $request->earning;
            $profile->save();
            /*$role = Role::find($request->role);
            if(!$user->hasRole($role->name)){
                $user->roles()->first()->pivot->delete();
                $user->assignRole($role->name);
            }*/
            Session::flash('message', 'User has been updated');
            return redirect()->back();
        }catch(\Exception $e){
            Session::flash('message', 'Unable to update, try again.');
            return redirect()->back();
        }//end try catch.
    }//end update function.
    public function delete($id){
       $user =  User::findOrfail($id);
       $user->delete();
       Session::flash('message','User has been deleted');
       return back();
    }//end update function.
    public function getDeletedUsers(){
        $users = User::onlyTrashed()->get();
        return view('users.deleted',compact('users'));
    }//end getDeletedUsers function.
    public function restoreUser(Request $request){
        $user =  User::onlyTrashed()->where('id','=',$request->id);
        $user->restore();
        Session::flash('message','User has been restored');
        return back();
    }//end restoreUser function.
    public function getSettings(){
        $user = auth()->user();
        return view('users.account-settings',compact('user'));
    }//end getSettings function.
    public function referringSubmint(Request $request){
        extract($request->all());
        $dataArr = [
            'referal_by'=>$form,
            'referal_to'=>$to,
            'referal_client'=>$referal_client,
            'price'=>$price,
            'fee'=>$fee,
            'time'=>$time.$Months,
            'note'=>$note,
            'is_viewed'=>0,
            'status'=>"pending",
            'client_name'=>$client_name,
            'client_email'=>$client_email,
            'client_phone'=>$client_phone,
        ];
        if(Referal::create($dataArr)){
            return response(['msg'=>'success.']);
        }else{
            return response(['msg'=>'fail.']);
        }//end if else.;
    }//end referringSubmnit function.
    public function ratings($rat,$to,$form){
       $dataArr = [
            'rating_by'=>$form,
            'rating_to'=>$to,
            'rating'=>$rat
        ];
        if(Rating::updateOrCreate( ['rating_by' => $form, 'rating_to' =>$to],['rating' => $rat])){
            return response(['msg'=>'success.']);
        }else{
            return response(['msg'=>'fail.']);
        }//end if else.;
    }//end rating function.
    public function feedBack($coment,$to,$form){
        $dataArr = [
            'rating_by'=>$form,
            'rating_to'=>$to,
            'rating'=>$coment
        ];
         if(Review::updateOrCreate( ['reviewed_by_id' => $form, 'reviewed_to_id' =>$to],['message' => $coment])){
            return response(['msg'=>'success.']);
         }else{
            return response(['msg'=>'fail.']);
         }//end if else.;
    }//end feedBack function.
    public function getFeedBack($to){
        $coments = Review::where('reviewed_to_id',$to)->get();
        return (string) view('users.user_comments',compact('coments'));
    }//end getFeedBack function.
    public function getRating($to,$form){
        $Rating = Rating::where('rating_by',$form)->where('rating_to',$to)->first();
            if($Rating){
                return response(['rating'=>$Rating]);
            }else{
                return response(['msg'=>'fail.']);
            }//end if else.;
    }//end getRating function.
    public function getAllRating($to){
         $ratings  = Rating::where('rating_to',$to)->count();
         $rating_5 = Rating::where('rating_to',$to)->where('rating',5)->count();
         $rating_4 = Rating::where('rating_to',$to)->where('rating',4)->count();
         $rating_3 = Rating::where('rating_to',$to)->where('rating',3)->count();
         $rating_2 = Rating::where('rating_to',$to)->where('rating',2)->count();
         $rating_1 = Rating::where('rating_to',$to)->where('rating',1)->count();
         $average = Rating::where('rating_to',$to)->get()->avg('rating');
         $averageInt = (int) Rating::where('rating_to',$to)->get()->avg('rating');

        return response(['rating_5'=>$rating_5,'rating_4'=>$rating_4,'rating_3'=>$rating_3,'rating_2'=>$rating_2,'rating_1'=>$rating_1,'ratings'=>$ratings,'average'=>$average,'averageInt'=>$averageInt]);
    }//end getAllRating function.
    public function saveSettings(Request $request){
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
            ]);
            $user = auth()->user();
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }//end if.
            $user->email = $request->email;
            $user->name = $request->name;
            $user->next_disabled = 1;
            $user->save();
            $profile = $user->profile;
            if ($user->profile == null) {
                $profile = new  Profile();
            }
/*            if ($request->dob != null) {
                $date = Carbon::parse($request->dob)->format('Y-m-d');
            } else {
                $date = $request->dob;
            }*/
            $date = $request->dob;


            if ($file = $request->file('pic_file')) {
                $extension = $file->extension() ?: 'png';
                $destinationPath = public_path() . '/storage/uploads/users/';
                $safeName = str_random(10) . '.' . $extension;
                $file->move($destinationPath, $safeName);
                //delete old pic if exists
                if (File::exists($destinationPath . $user->pic)) {
                    File::delete($destinationPath . $user->pic);
                }
                //save new file path into db
                $profile->pic = $safeName;
            }
            $profile->user_id = $user->id;
            $profile->bio = $request->bio;
            $profile->gender = $request->gender;
            $profile->dob = $date;
            $profile->country = $request->country;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->address = $request->address;
            $profile->postal = $request->postal;
            for ($i = 1; $i <= 10; $i++) {
                $profile->{'zip' . $i} = $request->{'zip' . $i};
            }//end for
            $profile->brokerage_name = $request->brokerage_name;
            $profile->office_phone = $request->office_phone;
            $profile->mobile_phone = $request->mobile_phone;
            $profile->license_state = $request->license_state;
            $profile->license_number = $request->license_number;
            $profile->work_with_buyers = $request->work_with_buyers;
            $profile->area_sales = $request->area_sales;
            $profile->out_area_sales = $request->out_area_sales;
            $profile->condo = $request->condo;
            $profile->facebook = $request->facebook;
            $profile->twitter = $request->twitter;
            $profile->dribbble = $request->dribbble;
            $profile->save();
            Session::flash('message', 'Account has been updated');
            return redirect()->back();
        }catch(\Exception $e){
            return $e->getMessage();
            Session::flash('message', 'Unable to update account, try again');
            return redirect()->back();
        }//end try catch.
    }
    public function agentProfile(Request $request,$id){
        $user = User::findOrFail($id);
        return view('users.profile',compact('user'));
    }//end agentProfile function.
    public function getUserProfileDetail(Request $request){
        $user = User::findOrFail($request->id);
        return (string) view('users.profile_modal',compact('user'));
    }//end getUserProfileDetail function.
    public function changeReferalStatus($type,$id){
       Referal::where('id',$id)->update(['status'=>$type , 'is_viewed'=>1]);
        return response()->json(['msg'=>'success']);
    }//end orderCurrentStatus function.
    public function referalRejected($type,$id){
       Referal::where('id',$id)->update(['status'=>$type , 'is_viewed'=>1]);
       return redirect()->back()->with(['type'=>'success', 'msg'=>'Referal rejected']);
        // return response()->json(['msg'=>'success']);
    }//end orderCurrentStatus function.
}//end class.
