<?php

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $time = Time::where('duration', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $time = Time::paginate($perPage);
            }

            return view('time.time.index', compact('time'));
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('time.time.create');
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'duration' => 'required'
		]);
            $requestData = $request->all();
            
            Time::create($requestData);
            return redirect('time/time')->with('flash_message', 'Time added!');
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $time = Time::findOrFail($id);
            return view('time.time.show', compact('time'));
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $time = Time::findOrFail($id);
            return view('time.time.edit', compact('time'));
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'duration' => 'required'
		]);
            $requestData = $request->all();
            
            $time = Time::findOrFail($id);
             $time->update($requestData);

             return redirect('time/time')->with('flash_message', 'Time updated!');
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
        $model = str_slug('time','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Time::destroy($id);

            return redirect('time/time')->with('flash_message', 'Time deleted!');
        }
        return response(view('403'), 403);

    }
}
