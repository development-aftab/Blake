<?php

namespace App\Http\Controllers\HeardSource;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HeardSource;
use Illuminate\Http\Request;

class HeardSourceController extends Controller
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $heardsource = HeardSource::where('name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $heardsource = HeardSource::paginate($perPage);
            }

            return view('heardSource.heard-source.index', compact('heardsource'));
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('heardSource.heard-source.create');
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            HeardSource::create($requestData);
            return redirect('heardSource/heard-source')->with('flash_message', 'HeardSource added!');
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $heardsource = HeardSource::findOrFail($id);
            return view('heardSource.heard-source.show', compact('heardsource'));
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $heardsource = HeardSource::findOrFail($id);
            return view('heardSource.heard-source.edit', compact('heardsource'));
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $heardsource = HeardSource::findOrFail($id);
             $heardsource->update($requestData);

             return redirect('heardSource/heard-source')->with('flash_message', 'HeardSource updated!');
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
        $model = str_slug('heardsource','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            HeardSource::destroy($id);

            return redirect('heardSource/heard-source')->with('flash_message', 'HeardSource deleted!');
        }
        return response(view('403'), 403);

    }
}
