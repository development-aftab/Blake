<?php

namespace App\Http\Controllers\ChatterTopic;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ChatterTopic;
use Illuminate\Http\Request;

class ChatterTopicController extends Controller
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $chattertopic = ChatterTopic::where('parent_id', 'LIKE', "%$keyword%")
                ->orWhere('order', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $chattertopic = ChatterTopic::paginate($perPage);
            }

            return view('chatterTopic.chatter-topic.index', compact('chattertopic'));
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $orderNo = ChatterTopic::orderBy('id','DESC')->first()->order??0;
            return view('chatterTopic.chatter-topic.create',compact('orderNo'));
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            ChatterTopic::create($requestData);
            return redirect('chatterTopic/chatter-topic')->with('flash_message', 'ChatterTopic added!');
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $chattertopic = ChatterTopic::findOrFail($id);
            return view('chatterTopic.chatter-topic.show', compact('chattertopic'));
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $chattertopic = ChatterTopic::findOrFail($id);
            return view('chatterTopic.chatter-topic.edit', compact('chattertopic'));
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $chattertopic = ChatterTopic::findOrFail($id);
             $chattertopic->update($requestData);

             return redirect('chatterTopic/chatter-topic')->with('flash_message', 'ChatterTopic updated!');
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
        $model = str_slug('chattertopic','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            ChatterTopic::destroy($id);

            return redirect('chatterTopic/chatter-topic')->with('flash_message', 'ChatterTopic deleted!');
        }
        return response(view('403'), 403);

    }
}
