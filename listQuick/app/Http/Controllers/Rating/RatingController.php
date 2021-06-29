<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $rating = Rating::where('rating_by', 'LIKE', "%$keyword%")
                ->orWhere('rating_to', 'LIKE', "%$keyword%")
                ->orWhere('rating', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $rating = Rating::paginate($perPage);
            }

            return view('rating.rating.index', compact('rating'));
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('rating.rating.create');
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'rating_by' => 'required',
			'rating_to' => 'required'
		]);
            $requestData = $request->all();
            
            Rating::create($requestData);
            return redirect('rating/rating')->with('flash_message', 'Rating added!');
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $rating = Rating::findOrFail($id);
            return view('rating.rating.show', compact('rating'));
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $rating = Rating::findOrFail($id);
            return view('rating.rating.edit', compact('rating'));
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'rating_by' => 'required',
			'rating_to' => 'required'
		]);
            $requestData = $request->all();
            
            $rating = Rating::findOrFail($id);
             $rating->update($requestData);

             return redirect('rating/rating')->with('flash_message', 'Rating updated!');
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
        $model = str_slug('rating','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Rating::destroy($id);

            return redirect('rating/rating')->with('flash_message', 'Rating deleted!');
        }
        return response(view('403'), 403);

    }
}
