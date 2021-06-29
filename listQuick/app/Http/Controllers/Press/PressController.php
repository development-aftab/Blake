<?php

namespace App\Http\Controllers\Press;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\Press;
use Illuminate\Http\Request;

class PressController extends Controller
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $press = Press::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $press = Press::paginate($perPage);
            }

            return view('press.press.index', compact('press'));
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('press.press.create');
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
            try{
                $image = Storage::disk('website')->put('elite', $request->image);
            }catch(\Exception $e){}//end trycatch.
            $requestData = $request->all();
            $requestData['image']=$image??"";
            Press::create($requestData);
            return redirect('press/press')->with('flash_message', 'Press added!');
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $press = Press::findOrFail($id);
            return view('press.press.show', compact('press'));
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $press = Press::findOrFail($id);
            return view('press.press.edit', compact('press'));
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
            $image = $request->oldImage??'';
            if($request->hasFile('image')){
                try{
                    $image = Storage::disk('website')->put('leadership', $request->image);
                    Storage::disk('website')->delete($request->oldImage); 
                }catch(\Exception $e){}//end trycatch.
            }//end if else.
            $requestData            = $request->all();
            $requestData['image']   =$image;
            $press = Press::findOrFail($id);
             $press->update($requestData);

             return redirect('press/press')->with('flash_message', 'Press updated!');
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
        $model = str_slug('press','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Press::destroy($id);

            return redirect('press/press')->with('flash_message', 'Press deleted!');
        }
        return response(view('403'), 403);

    }
}
