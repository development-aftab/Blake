<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use App\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $office = Office::where('name', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $office = Office::paginate($perPage);
            }

            return view('office.office.index', compact('office'));
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('office.office.create');
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'location' => 'required',
			
		]);
            try{
                $image = Storage::disk('website')->put('leadership', $request->image);
            }catch(\Exception $e){}//end trycatch.
            $requestData = $request->all();
            $requestData['image'] =$image??"";
            
            Office::create($requestData);
            return redirect('office/office')->with('flash_message', 'Office added!');
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $office = Office::findOrFail($id);
            return view('office.office.show', compact('office'));
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $office = Office::findOrFail($id);
            return view('office.office.edit', compact('office'));
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'location' => 'required',
			
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
            $office = Office::findOrFail($id);
             $office->update($requestData);

             return redirect('office/office')->with('flash_message', 'Office updated!');
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
        $model = str_slug('office','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Office::destroy($id);

            return redirect('office/office')->with('flash_message', 'Office deleted!');
        }
        return response(view('403'), 403);

    }
}
