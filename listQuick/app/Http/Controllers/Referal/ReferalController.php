<?php

namespace App\Http\Controllers\Referal;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Referal;
use Illuminate\Http\Request;
use Auth;

class ReferalController extends Controller
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $referal = Referal::where('referal_by', 'LIKE', "%$keyword%")
                ->orWhere('referal_to', 'LIKE', "%$keyword%")
                ->orWhere('referal_client', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('fee', 'LIKE', "%$keyword%")
                ->orWhere('time', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('is_viewed', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $referal = Referal::paginate($perPage);
            }

            return view('referal.referal.index', compact('referal'));
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('referal.referal.create');
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Referal::create($requestData);
            return redirect('referal/referal')->with('flash_message', 'Referal added!');
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            //auto accept off
            $referal = Referal::findOrFail($id);
            /*if($referal->referal_by != Auth::id()){
                Referal::where('id',$id)->update(['status'=>'accepted' ,'is_viewed'=>1]);
            }*/
            
            return view('referal.referal.show', compact('referal'));
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $referal = Referal::findOrFail($id);
            return view('referal.referal.edit', compact('referal'));
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $referal = Referal::findOrFail($id);
             $referal->update($requestData);

             return redirect('referal/referal')->with('flash_message', 'Referal updated!');
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
        $model = str_slug('referal','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Referal::destroy($id);

            return redirect('referal/referal')->with('flash_message', 'Referal deleted!');
        }
        return response(view('403'), 403);

    }
}
