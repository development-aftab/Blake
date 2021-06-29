<?php

namespace App\Http\Controllers\AssignEstimate;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AssignEstimate;
use Illuminate\Http\Request;

class AssignEstimateController extends Controller
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $assignestimate = AssignEstimate::where('estimate_id', 'LIKE', "%$keyword%")
                ->orWhere('agent_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $assignestimate = AssignEstimate::paginate($perPage);
            }

            return view('assignEstimate.assign-estimate.index', compact('assignestimate'));
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('assignEstimate.assign-estimate.create');
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            AssignEstimate::create($requestData);
            return redirect('assignEstimate/assign-estimate')->with('flash_message', 'AssignEstimate added!');
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $assignestimate = AssignEstimate::findOrFail($id);
            return view('assignEstimate.assign-estimate.show', compact('assignestimate'));
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $assignestimate = AssignEstimate::findOrFail($id);
            return view('assignEstimate.assign-estimate.edit', compact('assignestimate'));
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $assignestimate = AssignEstimate::findOrFail($id);
             $assignestimate->update($requestData);

             return redirect('assignEstimate/assign-estimate')->with('flash_message', 'AssignEstimate updated!');
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
        $model = str_slug('assignestimate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AssignEstimate::destroy($id);

            return redirect('assignEstimate/assign-estimate')->with('flash_message', 'AssignEstimate deleted!');
        }
        return response(view('403'), 403);

    }
}
