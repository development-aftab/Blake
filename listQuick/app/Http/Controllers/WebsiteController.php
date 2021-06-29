<?php

namespace App\Http\Controllers;
use App\AssignEstimate;
use Illuminate\Http\Request;
use App\BuySaleProperty;
use App\Type;
use App\Contact;
use App\Profile;
use App\User;
use App\PropertyType;
use App\Worth;
use App\Time;
use App\HeardSource;
use App\Faq;
use App\Review;
use App\Leadership;
use App\Office;
use App\Testimonial;
use App\TipAndTool;
use App\Page;
use App\Package;
use Storage;
use View;
use Session;
use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;
use App\Elite;
use App\Press;
use Illuminate\Support\Facades\Auth;
use App\UserPayment;
use App\Referal;
use App\AssignLead;
use App\Emoji;
use App\Subscriber;
use App\HomeExtimate;
use App\HomeCondition;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Carbon\Carbon;
use DateTime;
use Newsletter;

class WebsiteController extends Controller{
     public function __construct(){
        $thinking_of_selling    = Page::where('slug','thinking_of_selling')->first();
        $header_contact         = Page::where('slug','header_contact')->first();
        $office_address_page_content         = Page::where('slug','office_address_page_content')->first();
        View::share('thinking_of_selling', $thinking_of_selling);
        View::share('header_contact', $header_contact);
        View::share('office_address_page_content', $office_address_page_content);
    }//end constructor.
    public function index(){
        $reviews                = Review::where('status',1)->get();
        // $agents                 = User::where('name','!=','Admin')->where('name','!=','User')->where('status',1)->get();
        $agents                 = User::where('name','!=','Admin')->where('name','!=','ListQuick')->orderBy('id','DESC')->get();
        $happyClients           = BuySaleProperty::count();
//        $tipAndTools            = TipAndTool::where('status',1)->limit(6)->get();
        $tipAndTools            = TipAndTool::where('status',1)->get();
        $hire_agent             = Page::where('slug','hire_agent')->first();
        $sell_our_network       = Page::where('slug','sell_our_network')->first();
        $lets_talk              = Page::where('slug','lets_talk')->first();
        $Tips_And_Tools              = Page::where('slug','Tips_And_Tools')->first();
        return view('website.index',compact('reviews','agents','happyClients','tipAndTools','hire_agent','sell_our_network','lets_talk','Tips_And_Tools'));
    }//end index function.
    public function dashboard(){
        try{
            $agentscount = User::where('name','!=','Admin')->where('name','!=','ListQuick')->orderBy('id','DESC')->count();
            if(trim(Auth::user()->name) != 'Admin' && trim(Auth::user()->name) != 'ListQuick' ){
                $buySalePropertyIds = [];
                if(auth()->user()->hasRole('agent')){
                    $buySalePropertyIds =  AssignLead::where('agent_id',Auth::id())->pluck('buy_sale_property_id')->toArray();
                }//end if else.
                $requestcount   = BuySaleProperty::whereIn('id',$buySalePropertyIds)->count();
                $request   = BuySaleProperty::whereIn('id',$buySalePropertyIds)->orderBy('id','DESC')->take(5)->get();
                if(Auth::user()->name=='ListQuick' || Auth::user()->name=='ListQuick'){
                    $earnings  = Profile::sum('earning');
                    $earnerName = "Agents";
                }else{
                    $earnings  = Profile::where('user_id',Auth::id())->sum('earning');
                    $earnerName = "My";
                }//end if else.
            }else{
                $requestcount   = BuySaleProperty::count();
                $request   = BuySaleProperty::orderBy('id','DESC')->take(5)->get();
                $earnings  = Profile::sum('earning');
                $earnerName = "Agents";
                $buySalePropertyIds = [];
            }//end if.
            $agents = User::where('name','!=','Admin')->where('name','!=','ListQuick')->where('status',1)->orderBy('id','DESC')->take(5)->get();
            return view('dashboard.index',compact('agentscount','requestcount','request','agents','earnings','earnerName','buySalePropertyIds'));
        }catch(\Exception $e){
            return redirect('/');
        }//end trycatch.
    }//end index function.

    public function homesEstimate(){
        $answer_simple_questions    = Page::where('slug','answer_simple_questions')->first();
        $detailed_analysis          = Page::where('slug','detailed_analysis')->first();
        $home_value_estimates       = Page::where('slug','home_value_estimates')->first();
        $lets_talk                  = Page::where('slug','lets_talk')->first();
        $happyClients               = BuySaleProperty::count();
        $tipAndTools                = TipAndTool::where('status',1)->limit(5)->get();
        $reviews                    = Review::where('status',1)->get();
        return view('website.homes_estimate',compact('answer_simple_questions','detailed_analysis','home_value_estimates','lets_talk','happyClients','tipAndTools','reviews'));
    }//end index function.
    public function aboutUs(){
        $reviews                = Review::where('status',1)->get();
        $leaderships = Leadership::where('type_id',2)->where('status',1)->get();
        $offices     = Office::where('status',1)->get();
        $real_estate_change = Page::where('slug','real_estate_change')->first();
        $data_driven = Page::where('slug','data_driven')->first();
        $heading_about_us = Page::where('slug','about_us_heading')->first();
        $unparalleled_network = Page::where('slug','unparalleled_network')->first();
        $operating_at_scale = Page::where('slug','operating_at_scale')->first();
        $contact_us             = Page::where('slug','contact_us')->first();
        return view('website.aboutus',compact('reviews','leaderships','offices','real_estate_change','data_driven','unparalleled_network','operating_at_scale','contact_us','heading_about_us'));
    }//end aboutUs function.
    public function testimonials(){
        $reviews        = Review::where('status',1)->paginate(10);
        $testimonials   = Testimonial::where('status',1)->get();
        $testimonialPageContent         = Page::where('slug','testimonial_page_content')->first();
        return view('website.testimonials',compact('reviews','testimonials','testimonialPageContent'));
    }//end testimonials 
    public function testPeriod(){
        
        return view('website.testperiod');
    }//end testimonials
    public function professionals(){
        $faqs = Faq::where('status',1)->get();
        $upfront_costs                  = Page::where('slug','upfront_costs')->first();
        $transaction_ready_clients      = Page::where('slug','transaction_ready_clients ')->first();
        $close_more_deals               = Page::where('slug','close_more_deals')->first();
        $create_profile                 = Page::where('slug','create_profile')->first();
        $refferal_agreement             = Page::where('slug','refferal_agreement')->first();
        $update_transaction             = Page::where('slug','update_transaction')->first();
        $how_can_we_help                = Page::where('slug','how_can_we_help')->first();
        $achievement                    = Page::where('slug','achievement')->first();
        $customize_profile              = Page::where('slug','customize_profile')->first();
        $connect_with_clients           = Page::where('slug','connect_with_clients')->first();
        $access_to_tools                = Page::where('slug','access_to_tools')->first();
        $total_agents                   = Page::where('slug','total_agents')->first();
        $certified                      = Page::where('slug','Certified_page_heading')->first();
        $certified_Build                = Page::where('slug','certified_Build')->first();
        $professionalPageImage          = Page::where('slug','professional_page_image')->first();
        return view('website.professionals',compact('faqs','upfront_costs','transaction_ready_clients','close_more_deals','create_profile','refferal_agreement','update_transaction','how_can_we_help','achievement','customize_profile','connect_with_clients','access_to_tools','total_agents','certified','certified_Build','professionalPageImage'));
    }//end professionals function.
    public function elite(){
        $faqs = Faq::where('status',1)->get();
        $elites = Elite::where('status',1)->get();
        return view('website.elite', compact('faqs','elites'));
    }//end elite function
    public function press(){
        $press = Press::where('status',1)->get();
        return view('website.press',compact('press'));
    }//end press function
    public function agent($state=''){
        if($state){
            $agents  = User::where('name','!=','Admin')->where('name','!=','ListQuick')->where('status',1)->orderBy('id','DESC')->get();
        }else{
            $agents  = User::where('name','!=','Admin')->where('name','!=','ListQuick')->where('status',1)->orderBy('id','DESC')->paginate(9);
        }//end if.
        return view('website.agents', compact('agents','state'));
    }//end agent function.
    public function cashCloe(){
        $clientfaqs = Faq::where('type_id',3)->where('status',1)->get();//type id 3 = client
        $agentfaqs  = Faq::where('type_id',1)->where('status',1)->get();//type id 1 = agent
        $guaranteed_offer   = Page::where('slug','guaranteed_offer')->first();
        $strong_offer       = Page::where('slug','strong_offer')->first();
        $move_on_schedule   = Page::where('slug','move_on_schedule')->first();
        $full_market_value  = Page::where('slug','full_market_value')->first();
        $strong_cash_offer  = Page::where('slug','strong_cash_offer')->first();
        $why_listquick      = Page::where('slug','why_listquick')->first();
        return view('website.cashcloe', compact('clientfaqs','agentfaqs','guaranteed_offer','strong_offer','strong_offer','move_on_schedule','full_market_value','strong_cash_offer','why_listquick'));
    }//end cashCloe
    public function buy(Request $request, $address='',$lat=0,$lng=0){
        extract($request->all());
        $address = $autocomplete??"";
        $lat     = $latitude??0;
        $lng     = $longitude??0;
        Session::put('requestType', 'Buy');
        return view('website.property',compact('lat','lng','address'));
    }//end buy function.
    public function sale(Request $request, $address='',$lat=0,$lng=0){
        extract($request->all());
        $address = $autocomplete??"";
        $lat     = $latitude??0;
        $lng     = $longitude??0;
        Session::put('requestType', 'Sale');
        return view('website.property',compact('lat','lng','address'));
    }//end sale function.
    
    /*public function sale(){
        Session::put('requestType', 'Sale');
        return view('website.property');
    }//end sale function.*/
    public function addressProcess($location=''){
        $location = $location;
        return view('website.ajax.confirm_location',compact('location'));
    }//end addressProcess function.
    public function unitNumber($selected_location=0){
        return view('website.ajax.unit_number',compact('selected_location'));
    }//end addressProcess function.
    public function propertyTypeId($unitnumber=null){
        $propertyTypes = PropertyType::where('property_type',Session::get('requestType'))->where('status',1)->get();
        return view('website.ajax.property_type',compact('propertyTypes'));
    }//end addressProcess function.
    public function worths($property=''){
        $worths = Worth::where('property_type',Session::get('requestType'))->where('status',1)->get();
        return view('website.ajax.worth',compact('worths'));
    }//end addressProcess function.
    public function saleTime($worth=''){
        $times = Time::where('property_type',Session::get('requestType'))->where('status',1)->get();
        return view('website.ajax.sale_time', compact('times'));
    }//end addressProcess function.
    public function sourceHeard($saletime=''){
        $heardSources = HeardSource::where('property_type',Session::get('requestType'))->where('status',1)->get();
        return view('website.ajax.source_heard',compact('heardSources'));
    }//end addressProcess function.
    public function topAgents($sourceheard=''){
        return view('website.ajax.top_agents');
    }//end top_agents function.
    public function contactDetail($top_agents=''){
        return view('website.ajax.contact');
    }//end top_agents function.
    public function buyProperty($contact_name='',$contact_phone=''){        
        return view('website.ajax.buy_property');
    }//end buyProperty function.
    public function toolTipDetail($id=''){ 
    if ($id) {
       $TipAndTool  = TipAndTool::where('id',$id)->get();      
        return view('website.toolandtip',compact('TipAndTool'));
     }else{
       $TipAndTool  = TipAndTool::where('status',1)->get();      
        return view('website.toolandtip',compact('TipAndTool'));
    } 
       
    }//end buyProperty function.
    public function create_property(Request $request){
        extract($request->all());
        $dataArr = [
            'lat'=>(float) $lat,
            'lng'=>(float) $lng,
            'location'=>$location,
            'confirm_location'=>$confirm_location,
            'unit_number'=>$unit_number,
            'property_type_id'=>$property_type_id,
            'worth_id'=>$worth,
            'sale_time_id'=>$sale_time,
            'heard_source_id'=>$source_heard,
            'requester_name'=>$top_agents,
            'requester_phone'=>$contact_phone,
            'requester_email'=>$contact_name,
            'request_type'=> strtolower(Session::get('requestType')??""),
            'country'=>array_reverse(explode(',', $location))[0]??"",
            'state'=>array_reverse(explode(',', $location))[1]??""
        ];
        if(BuySaleProperty::create($dataArr)){
            return response(['msg'=>'success.']);
        }else{
            return response(['msg'=>'fail.']);
        }//end if else.;
    }//end create_property function.
    public function createEstimate(Request $request){
        extract($request->all());
        $dataArr = [
            'lat'=>(float) $lat,
            'lng'=>(float) $lng,
            'location'=>$location,
            'confirm_location'=>$confirm_location,
            'selling_time'=>$selling_time,
            'home_condition'=>$home_condition,
            'contract'=>$contract,
            'other'=>$other,
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'state'=>array_reverse(explode(',', $location))[1]??""
        ];
        if(HomeExtimate::create($dataArr)){
            return response(['msg'=>'success.']);
        }else{
            return response(['msg'=>'fail.']);
        }//end if else.;
    }//end create_property function.
    public function signin(Request $request){
        return view('website.signin');
    }//end signin function.
    public function signup(Request $request){
        return view('website.signup');
    }//end signin function.
    public function addAgent(Request $request){
        return view('users.add_agent');
    }//end addAgent function.
    

    public function signinProcess(Request $request){
        extract($request->all());
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            if(User::find(Auth::id())->status==0){
                Auth()->logout();
                return ['msg'=>'inactive'];
            }else{
                return ['msg'=>'success'];
            }//end if else.
            // if(Auth::user()->paid == 0){
            // datef = Carbon::createFromFormat('Y-m-d H:i', Auth::user()->created_at)->diff(Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->trial_date))->format('%H:%I')."" ;die();
            //    $datef = 1;
            //	if ($datef == 0) {
            //    	return view('website.pakages');
            //	}else{
            //		return view('website.forum.index');
            //	}//end if else.
            //}//end if else.
        }else{
            return ['msg'=>'fail'];
            return view('pages.homepage');
        }//endif.
    }//end signinProcess function.

    public function agentRegister(Request $request){
        extract($request->all());
        $passwordInput = $password;
        try{
            $image    ='';
            try{
                $image    = Storage::disk('public')->put('uploads/users',$file);
                $image = str_replace('uploads/users/','',$image);
            }catch(\Exception $e){}//end trycatch.
            $user = User::create(['name'=>$first_name.' '.$last_name,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'password'=>$password = bcrypt($password),'picture'=>$image,'status'=>0]);
            Profile::create(['user_id'=>$user->id,'pic'=>$image,'address'=>$autocomplete??"",'long_address'=>$autocomplete??"",'city'=>$city??"",'postal'=>$zip??"",'lat'=>$latitude,'lng'=>$longitude,'state'=>array_reverse(explode(',', $autocomplete))[1]??"",'country'=>array_reverse(explode(',', $autocomplete))[0]]);
            User::where('id',$user->id)->update(['trial_expired'=>1,'trial_expiry_date'=>$user->created_at->addDays(-1)->format('M-d-Y')]);
//            User::where('id',$user->id)->update(['trial_expiry_date'=>$user->created_at->addDays(15)->format('M-d-Y')]);
            $agentRoleId = 3;//this is agent role id from roles table.
            $user->roles()->attach([1 => ['role_id' => $agentRoleId, 'user_id' => $user->id]]);
            Auth::attempt(['email'=>$email,'password'=>$passwordInput,'status'=>1]); //default login removed uncomment if requre.
//            return ['msg'=>'success','trial_expiry_date'=>$user->created_at->addDays(15)->format('M-d-Y')];
            return ['msg'=>'success','trial_expiry_date'=>$user->created_at->addDays(-1)->format('M-d-Y')];
        }catch (\Exception $e){
            // return $e->getMessage();
            return ['msg'=>'fail'];
        }//end tryCatch.
    }//end agentRegister function.
    public function freeAgentRegister(Request $request){
        extract($request->all());
        $passwordInput = $password;
        try{
            $image    ='';
            try{
                $image    = Storage::disk('public')->put('uploads/users',$file);
                $image = str_replace('uploads/users/','',$image);
            }catch(\Exception $e){}//end trycatch.
            $user = User::create(['name'=>$first_name.' '.$last_name,'first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'password'=>$password = bcrypt($password),'picture'=>$image,'status'=>1]);
            Profile::create(['user_id'=>$user->id,'pic'=>$image??"default.jpg",'address'=>$autocomplete??"",'long_address'=>$autocomplete??"",'city'=>$city??"",'postal'=>$zip??"",'lat'=>$latitude,'lng'=>$longitude,'state'=>array_reverse(explode(',', $autocomplete))[1]??"",'country'=>array_reverse(explode(',', $autocomplete))[0]]);
            User::where('id',$user->id)->update(['trial_expiry_date'=>$user->created_at->addDays(730)->format('M-d-Y')]);
            $agentRoleId = 3;//this is agent role id from roles table.
            $user->roles()->attach([1 => ['role_id' => $agentRoleId, 'user_id' => $user->id]]);
            return ['msg'=>'success','trial_expiry_date'=>$user->created_at->addDays(730)->format('M-d-Y')];
        }catch (\Exception $e){
            // return $e->getMessage();
            return ['msg'=>'fail'];
        }//end tryCatch.
    }//end freeAgentRegister function.

    public function myForum(Request $request){
        return view('forum.index');
    }//end myForum function.
    public function contactProcess(Request $request){
        extract($request->all());
        if (Contact::create($request->all())) {
            return redirect()->back()->with(['type'=>'success', 'msg'=>'Thank You For Contacting Us, We Will Contact You Soon']);
        }else{
            return redirect()->back()->with(['type'=>'fail','msg'=> 'Unable To Submit Request, Try Again']);
        }//end ifelse
    }//end contactProcess function
    public function messageProcess(Request $request){
        extract($request->all());
        if (Review::create($request->all())) {
            return redirect()->back()->with(['type'=>'success', 'msg'=>'Thank You For Messaging Us']);
        }else{
            return redirect()->back()->with(['type'=>'fail','msg'=> 'Unable To Submit Request, Try Again']);
        }//end ifelse
    }//end contactProcess function
    public function requestType($type){
        Session::forget('request_type');
        return Session::put('request_type',$type);
    }//end requestType function.
    public function leadType($type){
        //return BuySaleProperty::all();
        Session::forget('lead_type');
        return Session::put('lead_type',$type);
    }//end requestType function.

    public function referalType($type){
        Session::forget('referal_type');
        return Session::put('referal_type',$type);
    }//end requestType function.
    public function buyPackage(){

        $packages = Package::wherestatus(1)->get();
        return view('website.packages',compact('packages'));
    }//end buyPackage function.
  
     public function handleonlinepay(Request $request) {
       
    }


    public function buyPackageProcess(Request $request){
        extract($request->all());
//        return $request->all();
        try{
                $input = $request->input();
                $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
                $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
                $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

                // Set the transaction's refId
                $refId = 'ref' . time();
                $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);
                $card_number=$cardNumber;
                $card_expirY_date=trim(str_replace(' / ', '-', trim($input['expiration'])));
                $cvv_number=$input['cvv'];

                // Subscription Type Info
                $subscription = new AnetAPI\ARBSubscriptionType();
                $subscription->setName(Auth::user()->name??"Not Available");

                $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
                $interval->setLength(30);
                $interval->setUnit("days");

                $paymentSchedule = new AnetAPI\PaymentScheduleType();
                $paymentSchedule->setInterval($interval);
                $paymentSchedule->setStartDate(new DateTime(date('Y-m-d')));
                $paymentSchedule->setTotalOccurrences("12");
    //            $paymentSchedule->setTrialOccurrences("0");

                $subscription->setPaymentSchedule($paymentSchedule);
                $subscription->setAmount($input['amount']);
    //            $subscription->setTrialAmount("0.00");

                $creditCard = new AnetAPI\CreditCardType();
                $creditCard->setCardNumber($card_number);
                $creditCard->setExpirationDate($card_expirY_date);
                $creditCard->setCardCode($cvv_number);

                $payment = new AnetAPI\PaymentType();
                $payment->setCreditCard($creditCard);
                $subscription->setPayment($payment);

                $order = new AnetAPI\OrderType();
                $order->setInvoiceNumber(rand(10000,99999));
                $order->setDescription($package_name??"Not Available.");
                $subscription->setOrder($order);

                $billTo = new AnetAPI\NameAndAddressType();
                $billTo->setFirstName(Auth::user()->name??"Not Available");
                $billTo->setLastName(Auth::user()->name??"Not Available");

                $subscription->setBillTo($billTo);

                $request = new AnetAPI\ARBCreateSubscriptionRequest();
                $request->setmerchantAuthentication($merchantAuthentication);
                $request->setRefId($refId);
                $request->setSubscription($subscription);
                $controller = new AnetController\ARBCreateSubscriptionController($request);
                $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
                if ($response != null) {
                    if ($response->getMessages()->getResultCode() == "Ok") {
                       UserPayment::create(['user_id'=>Auth::user()->id,'amount'=>$input['amount'],'amount_captured'=>$input['amount'],'amount_refunded'=>'','captured'=>'','currency'=>'','description'=>'','outcome'=>'','paid'=>'1','payment_method_details'=>'','receipt_url'=>'Not available','card_number'=>$card_number,'cvv'=>$cvv_number,'card_expiration'=>$card_expirY_date,'package_id'=>$package_id,'subscription_status'=>'active','subscription_id'=>$response->getSubscriptionId()]);
                        User::where('id',Auth::id())->update(['package_id'=>$package_id,'paid'=>1]);
                        return response(['result'=>'success','msg'=>'Payment Successful for package '.$package_name.'.']);
                        // return redirect('dashboard')->with(['type'=>'error', 'msg'=>'Payment Successful for package '.$package_name.'.']);
                    }else{
                        return response(['result'=>'fail','msg'=>'Unable To Complete Payment Request, Try Again.']);
                        // return redirect()->back()->with(['type'=>'error', 'msg'=>'Unable To Complete Payment Request, Try Again.']);
                    }//end if 
                }else{
                    return response(['result'=>'fail','msg'=>'Unable To Complete Payment Request, Try Again.']);
                    // return redirect()->back()->with(['type'=>'error', 'msg'=>'Unable To Complete Payment Request, Try Again.']);
                }//end if else.
        }catch(\Exception $e){
             return $e->getMessage();
            return redirect()->back()->with(['type'=>'error', 'msg'=>'Authorize Connectivity Error, Try Again.']);
        }//end trycatch
    }//end buyPackageProcess function.

    public function updatePaymentStatus(Request $request){
        extract($request->all());
        $userPayment = UserPayment::where('id',$user_payment_id)->first();

        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($userPayment->subscription_id);

        $controller = new AnetController\ARBCancelSubscriptionController($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        if(UserPayment::where('id',$user_payment_id)->update(['subscription_status'=>$subscription_status])){
            return redirect()->back()->with(['type'=>'success', 'msg'=>'Status updated successfully.']);
        }else{
            return redirect()->back()->with(['type'=>'error', 'msg'=>'Unable to status try again.']);
        }//end if else.
    }//end updatePaymentStatus function.

    public function updateUserStatus($id,$status){
        User::where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with(['type'=>'success', 'msg'=>'User Status Updates Successfully.']);
    }//end updateUserStatus function.

    public function getReferalNotification(){
        $referals  = Referal::where('is_viewed',0)->get();
        return view('includes.referal_notifications',compact('referals'));
    }//end getReferalNotification function.
     public function giveEmojiPost(Request $request){
                Emoji::updateOrCreate( ['user_id' => $request->user_id, 'post_id' =>$request->id],['emoji' => $request->emoji]);
                
    }//end getReferalNotification function. 
    public function getPostEmojiCount(Request $request){
       $emoji1 = Emoji::where('post_id',$request->id)->where('emoji','128077;')->count();
       $emoji2 = Emoji::where('post_id',$request->id)->where('emoji',"128078;")->count(); 
       $emoji3 = Emoji::where('post_id',$request->id)->where('emoji',"x1F621;")->count();
       $emoji4 = Emoji::where('post_id',$request->id)->where('emoji',"x1F601;")->count(); 
       $emoji5 = Emoji::where('post_id',$request->id)->where('emoji',"x1F60A;")->count();
       $get_my = Emoji::where('post_id',$request->id)->where('user_id',Auth::user()->id)->first();
       if($get_my){
       return response(['emoji1'=>$emoji1,'emoji2'=>$emoji2,'emoji3'=>$emoji3,'emoji4'=>$emoji4,'emoji5'=>$emoji5,'get_my'=>$get_my]);
       }else{
        return response(['emoji1'=>$emoji1,'emoji2'=>$emoji2,'emoji3'=>$emoji3,'emoji4'=>$emoji4,'emoji5'=>$emoji5,'get_my'=>1]);
       }
        
                
    }//end getReferalNotification function.

    public function contactUs(Request $request){
        $contactUsPageContent = Page::where('slug','contact_us_page_content')->first();
        return view('website.contact_up',compact('contactUsPageContent'));
    }//end contactUs function. 
     public function weNeedKnow(){
        return view('website.ajax.we_need_know');
    }//end contactUs function. 
    public function estimatedSent(){
        return view('website.ajax.estimate_sent');
    }//end contactUs function.
    public function contactUsProcess(Request $request){
        return $request->all();
        return view('website.contact_up');
    }//end
     public function sellingSoon(){
        return view('website.ajax.selling_soon');
    }//end     
    public function conditionOfHome(){
      $homeConditions = HomeCondition::where('status',1)->get();
        return view('website.ajax.condition_of_home',compact('homeConditions'));
    }//end 
    public function contractWithAgent(){
     
        return view('website.ajax.contract_with_real');
    }//end

    public function termsAndConditions(){
        $termsAndConditions         = Page::where('slug','terms_and_conditions')->first();
        return view('website.terms_and_conditions',compact('termsAndConditions'));
    }//end termsAndConditions function.
    public function privacyPolicy(){
        $privacyPolicy         = Page::where('slug','privacy_policy')->first();
        return view('website.privacy_policy',compact('privacyPolicy'));
    }//end privacyPolicy function.
    public function disableAccountSettingPopover(){
        return User::where('id',Auth::id())->update(['popover_disabled'=>1]);
    }//end disableAccountSettingPopover function.
    public function disableAccountNextPopover(){
        return User::where('id',Auth::id())->update(['next_disabled'=>1]);
    }//end disableAccountNextPopover function.

    public function assignLead(Request $request, $leadId){
        $keyword = $request->get('search');
        $perPage = 50;
        if (!empty($keyword)) {
            $agents = User::where('name','!=','Admin')->where('name','!=','ListQuick')->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $agents = User::where('name','!=','Admin')->where('name','!=','ListQuick')->paginate($perPage);
        }//end if else.
        $buySaleProperties = BuySaleProperty::where('request_type',Session::get('request_type'))->get();
        $selectedLead = BuySaleProperty::where('id',$leadId)->first();
        $assignedLeadsAgents = AssignLead::where('buy_sale_property_id',$leadId)->pluck('agent_id')->toArray();
        return view('buySaleProperty.buy-sale-property.assign_lead', compact('buySaleProperties','leadId','agents','selectedLead','assignedLeadsAgents'));
    }//end assignLead function.

    public function assignLeadProcess(Request $request){
        extract($request->all());
        $agent_ids = json_decode($agent_ids);
        foreach($agent_ids as $agent_id){
            AssignLead::updateOrCreate(['agent_id'=>$agent_id,'buy_sale_property_id'=>$buy_sale_property_id]);
        }//end foreach
        return true;
    }//end assignLeadProcess function.

    public function individualAssignLeadProcess(Request $request){
        extract($request->all());
        if($type=='remove'){
            AssignLead::where(['agent_id'=>$agent_id,'buy_sale_property_id'=>$buy_sale_property_id])->delete();
        }else{
             AssignLead::create(['agent_id'=>$agent_id,'buy_sale_property_id'=>$buy_sale_property_id]);
        }//end if else.
        return true;
    }//end assignLeadProcess function.
    public function mailchimpSubscribe(Request $request){
        extract($request->all());
        try{
            if(Newsletter::isSubscribed($subscriber_email)){
                //already subscribed.
                return redirect()->back()->with(['type'=>'info', 'msg'=>'you are already subscribed to our newsletter.']);
            }else{
                if(Newsletter::subscribe($subscriber_email, ['FNAME'=>$subscriber_name??"Not Available", 'LNAME'=>$subscriber_name??"Not Available"])){
                    Subscriber::create(['first_name'=>$subscriber_name,'last_name'=>$subscriber_name,'email'=>$subscriber_email,'status'=>'subscribed']);
                    return redirect()->back()->with(['type'=>'success', 'msg'=>'Successful, Thanks for subscription.']);
                
                }else{
                    return redirect()->back()->with(['type'=>'error', 'msg'=>'Sorry, Invalid email address.']);
                }//end if else.
            }//end if else.
        }catch(\Exception $e){
            return $e->getMessage();;
            return redirect()->back()->with(['type'=>'error', 'msg'=>'Sorry, Email does not exitsts.']);
        }//end try catch.
    }//end mailchimpSubscribe function.
    public function mailchimpUnsubscribe(Request $request,$subscriber_email){
        extract($request->all());
        try{
            if(Newsletter::getMember($subscriber_email)){
                //already subscribed.
                Newsletter::unsubscribe($subscriber_email);
                Subscriber::where('email',$subscriber_email)->update(['status'=>'unsubscribed']);                
                return redirect()->back()->with(['type'=>'success', 'msg'=>'Successfully unsubscribed.']);
            }else{
                return redirect()->back()->with(['type'=>'error', 'msg'=>'Sorry, Invalid email address.']);
            }//end if else.
        }catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with(['type'=>'error', 'msg'=>'Sorry, Email does not exitsts.']);
        }//end try catch.
    }//end mailchimpSubscribe function.

    public function assignEstimate(Request $request, $estimateId){
        $keyword = $request->get('search');
        $perPage = 50;
        if (!empty($keyword)) {
            $agents = User::where('name','!=','Admin')->where('name','!=','ListQuick')->where('name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $agents = User::where('name','!=','Admin')->where('name','!=','ListQuick')->paginate($perPage);
        }//end if else.
        $homeEstimates = HomeExtimate::get();
        $selectedEstimate = HomeExtimate::where('id',$estimateId)->first();
        $assignedEstimateAgents = AssignEstimate::where('estimate_id',$estimateId)->pluck('agent_id')->toArray();
        return view('homeExtimate.home-extimate.assign_estimate', compact('homeEstimates','estimateId','agents','selectedEstimate','assignedEstimateAgents'));
    }//end assignEstimate function.

    public function assignEstimateProcess(Request $request){
        extract($request->all());
        $agent_ids = json_decode($agent_ids);
        foreach($agent_ids as $agent_id){
            AssignEstimate::updateOrCreate(['agent_id'=>$agent_id,'estimate_id'=>$estimate_id]);
        }//end foreach
        return true;
    }//end assignEstimateProcess function.

    public function individualAssignEstimateProcess(Request $request){
        extract($request->all());
        if($type=='remove'){
            AssignEstimate::where(['agent_id'=>$agent_id,'estimate_id'=>$estimate_id])->delete();
        }else{
            AssignEstimate::create(['agent_id'=>$agent_id,'estimate_id'=>$estimate_id]);
        }//end if else.
        return true;
    }//end assignEstimateProcess function.

    public function changeReferralStatus(Request $request,$id,$status){
        try{
            $referal = Referal::findOrFail($id);
            if($referal->referal_by != Auth::id()){
                Referal::where('id',$id)->update(['status'=>$status ,'is_viewed'=>1]);
            }//end if else.
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back();
        }//end trycatch.
    }//end changeReferralStatus function.
    public function completeReferralProcess(Request $request){
        try{
            extract($request->all());
            Referal::where('id',$id)->update(
                [
                    'status'=>'closed',
                    'closing_date'=>$closing_date,
                    'closing_price'=>$closing_price,
                    'closing_property_address'=>$closing_property_address,
                    'referral_commission_type'=>$referral_commission_type,
                    'commission'=>$commission
                ]);
            return redirect()->back()->with(['type'=>'success', 'msg'=>'Referral Closed.']);
        }catch(\Exception $e){
//            return $e->getMessage();
            return redirect()->back()->with(['type'=>'error', 'msg'=>'Unable to Close Referral.']);
        }//end trycatch.
    }//end changeReferralStatus function.


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //TEST FUNCTIONS START HERE.
    public function test(Request $request){
        try{
            echo "<pre>";
            var_dump(Newsletter::deletePermanently('aftabwordpress@gmail.com'));
            die;
            var_dump(Newsletter::subscribe('aftabwordpress@gmail.com', ['FNAME'=>'Aftab Ali ', 'LNAME'=>'Ali']));
die;
print_r(           Newsletter::unsubscribe('development.aftab@gmail.com'));die;

            print_r(Newsletter::getMember('development.aftab@gmail.com'));
die;

            die;
        }catch(\Exception $e){
            return $e->getMessage();
        }

die;


        echo 'Aftab';die;


        echo "<pre>";
        return $this->createSubscription(30);
    }//end test function.
//cancel subscription
    function cancelSubscription($getSubscriptionId){
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($getSubscriptionId);

        $controller = new AnetController\ARBCancelSubscriptionController($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $successMessages = $response->getMessages()->getMessage();
            echo "SUCCESS : " . $successMessages[0]->getCode() . "  " .$successMessages[0]->getText() . "\n";
        }else{
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";

        }
        return $response;
    }//end

//Update a Subscription
    function updateSubscription($getSubscriptionId){
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        $subscription = new AnetAPI\ARBSubscriptionType();

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber("4111111111111111");
        $creditCard->setExpirationDate("2038-12");

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        //set profile information
        $profile = new AnetAPI\CustomerProfileIdType();
        $profile->setCustomerProfileId("121212");
        $profile->setCustomerPaymentProfileId("131313");
        $profile->setCustomerAddressId("141414");

        $subscription->setPayment($payment);

        //set customer profile information
        //$subscription->setProfile($profile);

        $request = new AnetAPI\ARBUpdateSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($getSubscriptionId);
        $request->setSubscription($subscription);

        $controller = new AnetController\ARBUpdateSubscriptionController($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            $errorMessages = $response->getMessages()->getMessage();
            echo "SUCCESS Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";

        }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }

        return $response;
    }//end

//Get Subscription Status
    function getSubscriptionStatus($subscriptionId){
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        $request = new AnetAPI\ARBGetSubscriptionStatusRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);

        $controller = new AnetController\ARBGetSubscriptionStatusController($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok"))
        {
            echo "SUCCESS: Subscription Status : " . $response->getStatus() . "\n";
        }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }

        return $response;
    }

//Get Subscription
    function getSubscription($subscriptionId){
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        // Creating the API Request with required parameters
        $request = new AnetAPI\ARBGetSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscriptionId($subscriptionId);
        $request->setIncludeTransactions(true);

        // Controller
        $controller = new AnetController\ARBGetSubscriptionController($request);

        // Getting the response
        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if ($response != null)
        {
            if($response->getMessages()->getResultCode() == "Ok")
            {
                // Success
                echo "SUCCESS: GetSubscription:" . "\n";
                // Displaying the details
                echo "Subscription Name: " . $response->getSubscription()->getName(). "\n";
                echo "Subscription amount: " . $response->getSubscription()->getAmount(). "\n";
                echo "Subscription status: " . $response->getSubscription()->getStatus(). "\n";
                echo "Subscription Description: " . $response->getSubscription()->getProfile()->getDescription(). "\n";
                echo "Customer Profile ID: " .  $response->getSubscription()->getProfile()->getCustomerProfileId() . "\n";
                echo "Customer payment Profile ID: ". $response->getSubscription()->getProfile()->getPaymentProfile()->getCustomerPaymentProfileId() . "\n";
                $transactions = $response->getSubscription()->getArbTransactions();
                if($transactions != null){
                    foreach ($transactions as $transaction) {
                        echo "Transaction ID : ".$transaction->getTransId()." -- ".$transaction->getResponse()." -- Pay Number : ".$transaction->getPayNum()."\n";
                    }
                }
            }
            else
            {
                // Error
                echo "ERROR :  Invalid response\n";
                $errorMessages = $response->getMessages()->getMessage();
                echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
            }
        }
        else
        {
            // Failed to get response
            echo "Null Response Error";
        }

        return $response;
    }

//Create a Subscription
    function createSubscription($intervalLength){
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();


        // Subscription Type Info
        $subscription = new AnetAPI\ARBSubscriptionType();
        $subscription->setName("Aftab Ali");

        $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
        $interval->setLength($intervalLength);
        $interval->setUnit("days");

        $paymentSchedule = new AnetAPI\PaymentScheduleType();
        $paymentSchedule->setInterval($interval);
        $paymentSchedule->setStartDate(new DateTime('2035-12-30'));
        $paymentSchedule->setTotalOccurrences("12");
        $paymentSchedule->setTrialOccurrences("1");

        $subscription->setPaymentSchedule($paymentSchedule);
        $subscription->setAmount(rand(1,99999)/12.0*12);
        $subscription->setTrialAmount("0.00");

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber("4007000000027");
        $creditCard->setExpirationDate("2038-12");
        $creditCard->setCardCode(123);

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);
        $subscription->setPayment($payment);

        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber("1234354");
        $order->setDescription("Description of the subscription");
        $subscription->setOrder($order);

        $billTo = new AnetAPI\NameAndAddressType();
        $billTo->setFirstName("Aftab Ali");
        $billTo->setLastName("Ali");

        $subscription->setBillTo($billTo);

        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($request);

        $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
        {
            echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
        }
        else
        {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }

        return $response;
    }

//Get a List of Subscriptions
    function getListOfSubscriptions(){
        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));
        // Set the transaction's refId
        $refId = 'ref' . time();

        $sorting = new AnetAPI\ARBGetSubscriptionListSortingType();
        $sorting->setOrderBy("id");
        $sorting->setOrderDescending(false);

        $paging = new AnetAPI\PagingType();
        $paging->setLimit("1000");
        $paging->setOffset("1");

        $request = new AnetAPI\ARBGetSubscriptionListRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSearchType("subscriptionInactive");
        $request->setSorting($sorting);
        $request->setPaging($paging);


        $controller = new AnetController\ARBGetSubscriptionListController($request);

        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            echo "SUCCESS: Subscription Details:" . "\n";
            foreach ($response->getSubscriptionDetails() as $subscriptionDetails) {
                echo "Subscription ID: " . $subscriptionDetails->getId() . "\n";
            }
            echo "Total Number In Results:" . $response->getTotalNumInResultSet() . "\n";
        } else {
            echo "ERROR :  Invalid response\n";
            $errorMessages = $response->getMessages()->getMessage();
            echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
        }

        return $response;
    }

}//end class.