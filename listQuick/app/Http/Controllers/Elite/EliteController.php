<?php

namespace App\Http\Controllers\Elite;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\Elite;
use Illuminate\Http\Request;

class EliteController extends Controller
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $elite = Elite::where('heading', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $elite = Elite::paginate($perPage);
            }

            return view('elite.elite.index', compact('elite'));
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('elite.elite.create');
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'heading' => 'required',
			'description' => 'required'
		]);
            try{
                $image = Storage::disk('website')->put('elite', $request->image);
            }catch(\Exception $e){}//end trycatch.
            $requestData = $request->all();
            $requestData['image'] =$image??"";  
            Elite::create($requestData);
            return redirect('elite/elite')->with('flash_message', 'Elite added!');
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $elite = Elite::findOrFail($id);
            return view('elite.elite.show', compact('elite'));
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $elite = Elite::findOrFail($id);
            return view('elite.elite.edit', compact('elite'));
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'heading' => 'required',
			'description' => 'required'
		]);
            $image = $request->oldImage??'';
            if($request->hasFile('image')){
                try{
                    $image = Storage::disk('website')->put('leadership', $request->image);
                    Storage::disk('website')->delete($request->oldImage); 
                }catch(\Exception $e){}//end trycatch.
            }//end if else.
            $requestData = $request->all();
            $requestData['image']=$image;
            $elite = Elite::findOrFail($id);
             $elite->update($requestData);

             return redirect('elite/elite')->with('flash_message', 'Elite updated!');
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
        $model = str_slug('elite','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Elite::destroy($id);

            return redirect('elite/elite')->with('flash_message', 'Elite deleted!');
        }
        return response(view('403'), 403);

    }
}
