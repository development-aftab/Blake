<?php

namespace App\Http\Controllers\AssignLead;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\AssignLead;
use Illuminate\Http\Request;

class AssignLeadController extends Controller
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $assignlead = AssignLead::where('buy_sale_property_id', 'LIKE', "%$keyword%")
                ->orWhere('agent_id', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $assignlead = AssignLead::paginate($perPage);
            }

            return view('assignLead.assign-lead.index', compact('assignlead'));
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('assignLead.assign-lead.create');
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            AssignLead::create($requestData);
            return redirect('assignLead/assign-lead')->with('flash_message', 'AssignLead added!');
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $assignlead = AssignLead::findOrFail($id);
            return view('assignLead.assign-lead.show', compact('assignlead'));
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $assignlead = AssignLead::findOrFail($id);
            return view('assignLead.assign-lead.edit', compact('assignlead'));
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $assignlead = AssignLead::findOrFail($id);
             $assignlead->update($requestData);

             return redirect('assignLead/assign-lead')->with('flash_message', 'AssignLead updated!');
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
        $model = str_slug('assignlead','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            AssignLead::destroy($id);

            return redirect('assignLead/assign-lead')->with('flash_message', 'AssignLead deleted!');
        }
        return response(view('403'), 403);

    }
}
