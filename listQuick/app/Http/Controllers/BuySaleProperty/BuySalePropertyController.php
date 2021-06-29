<?php

namespace App\Http\Controllers\BuySaleProperty;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\BuySaleProperty;
use App\PropertyType;
use App\Worth;
use App\Time;
use App\HeardSource;
use App\User;
use Illuminate\Http\Request;
use App\AssignLead;
use Auth;
class BuySalePropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $buysaleproperty = BuySaleProperty::where('location', 'LIKE', "%$keyword%")
                    ->orWhere('confirm_location', 'LIKE', "%$keyword%")
                    ->orWhere('unit_number', 'LIKE', "%$keyword%")
                    ->orWhere('property_type_id', 'LIKE', "%$keyword%")
                    ->orWhere('worth_id', 'LIKE', "%$keyword%")
                    ->orWhere('sale_time_id', 'LIKE', "%$keyword%")
                    ->orWhere('heard_source_id', 'LIKE', "%$keyword%")
                    ->orWhere('agent_id', 'LIKE', "%$keyword%")
                    ->orWhere('requester_name', 'LIKE', "%$keyword%")
                    ->orWhere('requester_phone', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->orderBy('id','DESC')->paginate($perPage);
            } else {
                $buysaleproperty = BuySaleProperty::orderBy('id','DESC')->paginate($perPage);
            }//end if else.
            $buySalePropertyIds = [];
            if(auth()->user()->hasRole('agent')){
               $buySalePropertyIds =  AssignLead::where('agent_id',Auth::id())->pluck('buy_sale_property_id')->toArray();
            }//end if else.
            return view('buySaleProperty.buy-sale-property.index', compact('buysaleproperty','buySalePropertyIds'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $propertyTypes = PropertyType::where('status',1)->get();
            $worths        = Worth::where('status',1)->get();
            $saleTimes     = Time::where('status',1)->get();
            $heardSources  = HeardSource::where('status',1)->get();
            $agents        = User::where('status',1)->get();
            return view('buySaleProperty.buy-sale-property.create', compact('propertyTypes','worths','saleTimes','heardSources','agents'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $requestData = $request->all();

            BuySaleProperty::create($requestData);
            return redirect('buySaleProperty/buy-sale-property')->with('flash_message', 'BuySaleProperty added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $buysaleproperty = BuySaleProperty::findOrFail($id);
            return view('buySaleProperty.buy-sale-property.show', compact('buysaleproperty'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $buysaleproperty = BuySaleProperty::findOrFail($id);
            $propertyTypes = PropertyType::where('status',1)->get();
            $worths        = Worth::where('status',1)->get();
            $saleTimes     = Time::where('status',1)->get();
            $heardSources  = HeardSource::where('status',1)->get();
            $agents        = User::where('status',1)->get();
            return view('buySaleProperty.buy-sale-property.edit', compact('buysaleproperty','propertyTypes','worths','saleTimes','heardSources','agents'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {

            $requestData = $request->all();

            $buysaleproperty = BuySaleProperty::findOrFail($id);
            $buysaleproperty->update($requestData);

            return redirect('buySaleProperty/buy-sale-property')->with('flash_message', 'BuySaleProperty updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('buysaleproperty','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            BuySaleProperty::destroy($id);

            return redirect('buySaleProperty/buy-sale-property')->with('flash_message', 'BuySaleProperty deleted!');
        }
        return response(view('403'), 403);

    }
}
