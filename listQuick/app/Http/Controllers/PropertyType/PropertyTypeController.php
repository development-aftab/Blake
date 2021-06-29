<?php

namespace App\Http\Controllers\PropertyType;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $propertytype = PropertyType::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $propertytype = PropertyType::paginate($perPage);
            }

            return view('propertyType.property-type.index', compact('propertytype'));
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('propertyType.property-type.create');
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
            $requestData = $request->all();
            
            PropertyType::create($requestData);
            return redirect('propertyType/property-type')->with('flash_message', 'PropertyType added!');
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $propertytype = PropertyType::findOrFail($id);
            return view('propertyType.property-type.show', compact('propertytype'));
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $propertytype = PropertyType::findOrFail($id);
            return view('propertyType.property-type.edit', compact('propertytype'));
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
            $requestData = $request->all();
            
            $propertytype = PropertyType::findOrFail($id);
             $propertytype->update($requestData);

             return redirect('propertyType/property-type')->with('flash_message', 'PropertyType updated!');
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
        $model = str_slug('propertytype','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            PropertyType::destroy($id);

            return redirect('propertyType/property-type')->with('flash_message', 'PropertyType deleted!');
        }
        return response(view('403'), 403);

    }
}
