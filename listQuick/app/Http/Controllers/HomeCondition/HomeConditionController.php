<?php

namespace App\Http\Controllers\HomeCondition;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HomeCondition;
use Illuminate\Http\Request;

class HomeConditionController extends Controller
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $homecondition = HomeCondition::where('title', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $homecondition = HomeCondition::paginate($perPage);
            }

            return view('homeCondition.home-condition.index', compact('homecondition'));
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('homeCondition.home-condition.create');
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            HomeCondition::create($requestData);
            return redirect('homeCondition/home-condition')->with('flash_message', 'HomeCondition added!');
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $homecondition = HomeCondition::findOrFail($id);
            return view('homeCondition.home-condition.show', compact('homecondition'));
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $homecondition = HomeCondition::findOrFail($id);
            return view('homeCondition.home-condition.edit', compact('homecondition'));
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $homecondition = HomeCondition::findOrFail($id);
             $homecondition->update($requestData);

             return redirect('homeCondition/home-condition')->with('flash_message', 'HomeCondition updated!');
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
        $model = str_slug('homecondition','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            HomeCondition::destroy($id);

            return redirect('homeCondition/home-condition')->with('flash_message', 'HomeCondition deleted!');
        }
        return response(view('403'), 403);

    }
}
