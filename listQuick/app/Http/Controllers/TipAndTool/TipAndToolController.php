<?php

namespace App\Http\Controllers\TipAndTool;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\TipAndTool;
use Illuminate\Http\Request;

class TipAndToolController extends Controller
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $tipandtool = TipAndTool::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $tipandtool = TipAndTool::paginate($perPage);
            }

            return view('tipAndTool.tip-and-tool.index', compact('tipandtool'));
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('tipAndTool.tip-and-tool.create');
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
            try{
                $image = Storage::disk('website')->put('tipandtool', $request->image);
            }catch(\Exception $e){}//end trycatch.
            $requestData             = $request->all();
            $requestData['image']    =$image??""; 
            TipAndTool::create($requestData);
            return redirect('tipAndTool/tip-and-tool')->with('flash_message', 'TipAndTool added!');
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $tipandtool = TipAndTool::findOrFail($id);
            return view('tipAndTool.tip-and-tool.show', compact('tipandtool'));
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $tipandtool = TipAndTool::findOrFail($id);
            return view('tipAndTool.tip-and-tool.edit', compact('tipandtool'));
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required'
		]);
             $image = $request->oldImage??'';
            if($request->hasFile('image')){
                try{
                    $image = Storage::disk('website')->put('office', $request->image);
                    Storage::disk('website')->delete($request->oldImage); 
                }catch(\Exception $e){}//end trycatch.
            }//end if else.
            $requestData = $request->all();
            $requestData['image']=$image??"";
            $tipandtool = TipAndTool::findOrFail($id);
             $tipandtool->update($requestData);

             return redirect('tipAndTool/tip-and-tool')->with('flash_message', 'TipAndTool updated!');
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
        $model = str_slug('tipandtool','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            TipAndTool::destroy($id);

            return redirect('tipAndTool/tip-and-tool')->with('flash_message', 'TipAndTool deleted!');
        }
        return response(view('403'), 403);

    }
}
