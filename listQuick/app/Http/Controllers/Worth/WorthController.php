<?php

namespace App\Http\Controllers\Worth;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Worth;
use Illuminate\Http\Request;

class WorthController extends Controller
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $worth = Worth::where('price', 'LIKE', "%$keyword%")
                ->orWhere('currency', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $worth = Worth::paginate($perPage);
            }

            return view('worth.worth.index', compact('worth'));
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('worth.worth.create');
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'price' => 'required'
		]);
            $requestData = $request->all();
            
            Worth::create($requestData);
            return redirect('worth/worth')->with('flash_message', 'Worth added!');
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $worth = Worth::findOrFail($id);
            return view('worth.worth.show', compact('worth'));
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $worth = Worth::findOrFail($id);
            return view('worth.worth.edit', compact('worth'));
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'price' => 'required'
		]);
            $requestData = $request->all();
            
            $worth = Worth::findOrFail($id);
             $worth->update($requestData);

             return redirect('worth/worth')->with('flash_message', 'Worth updated!');
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
        $model = str_slug('worth','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Worth::destroy($id);

            return redirect('worth/worth')->with('flash_message', 'Worth deleted!');
        }
        return response(view('403'), 403);

    }
}
