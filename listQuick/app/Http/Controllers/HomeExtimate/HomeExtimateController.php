<?php

namespace App\Http\Controllers\HomeExtimate;

use App\AssignEstimate;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HomeExtimate;
use Illuminate\Http\Request;
use Auth;
class HomeExtimateController extends Controller
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $homeextimate = HomeExtimate::where('state', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('confirm_location', 'LIKE', "%$keyword%")
                ->orWhere('selling_time', 'LIKE', "%$keyword%")
                ->orWhere('home_condition', 'LIKE', "%$keyword%")
                ->orWhere('contract', 'LIKE', "%$keyword%")
                ->orWhere('other', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $homeextimate = HomeExtimate::paginate($perPage);
            }//end if else.
            $homeEstimateIds = [];
            if(auth()->user()->hasRole('agent')){
                $homeEstimateIds =  AssignEstimate::where('agent_id',Auth::id())->pluck('estimate_id')->toArray();
            }//end if else.
            return view('homeExtimate.home-extimate.index', compact('homeextimate','homeEstimateIds'));
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('homeExtimate.home-extimate.create');
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            HomeExtimate::create($requestData);
            return redirect('homeExtimate/home-extimate')->with('flash_message', 'HomeExtimate added!');
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $homeextimate = HomeExtimate::findOrFail($id);
            return view('homeExtimate.home-extimate.show', compact('homeextimate'));
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $homeextimate = HomeExtimate::findOrFail($id);
            return view('homeExtimate.home-extimate.edit', compact('homeextimate'));
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $homeextimate = HomeExtimate::findOrFail($id);
             $homeextimate->update($requestData);

             return redirect('homeExtimate/home-extimate')->with('flash_message', 'HomeExtimate updated!');
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
        $model = str_slug('homeextimate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            HomeExtimate::destroy($id);

            return redirect('homeExtimate/home-extimate')->with('flash_message', 'HomeExtimate deleted!');
        }
        return response(view('403'), 403);

    }
}
