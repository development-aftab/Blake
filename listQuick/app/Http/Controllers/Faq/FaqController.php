<?php

namespace App\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Type;
use App\Faq;
use Illuminate\Http\Request;
use Storage;
class FaqController extends Controller
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $faq = Faq::where('type_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $faq = Faq::paginate($perPage);
            }

            return view('faq.faq.index', compact('faq'));
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $types = Type::where('status',1)->get();
            return view('faq.faq.create',compact('types'));
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'type_id' => 'required',
			'title' => 'required',
			'description' => 'required'
		]);
            try{
                $image = Storage::disk('website')->put('faq', $request->image);
            }catch(\Exception $e){}//end trycatch.
            $requestData = $request->all();
            $requestData['image'] =$image??""; 
            Faq::create($requestData);
            return redirect('faq/faq')->with('flash_message', 'Faq added!');
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $faq = Faq::findOrFail($id);
            return view('faq.faq.show', compact('faq'));
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $types = Type::where('status',1)->get();
            $faq = Faq::findOrFail($id);
            return view('faq.faq.edit', compact('faq','types'));
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'type_id' => 'required',
			'title' => 'required',
			'description' => 'required'
		]);
             $image = $request->oldImage??'';
            if($request->hasFile('image')){
                try{
                    $image = Storage::disk('website')->put('faq', $request->image);
                    Storage::disk('website')->delete($request->oldImage); 
                }catch(\Exception $e){}//end trycatch.
            }//end if else.
            $requestData = $request->all();
            $requestData['iamge']=$image??"";
            $faq = Faq::findOrFail($id);
             $faq->update($requestData);

             return redirect('faq/faq')->with('flash_message', 'Faq updated!');
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
        $model = str_slug('faq','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Faq::destroy($id);

            return redirect('faq/faq')->with('flash_message', 'Faq deleted!');
        }
        return response(view('403'), 403);

    }
}
