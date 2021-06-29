<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $review = Review::where('reviewed_by_id', 'LIKE', "%$keyword%")
                ->orWhere('reviewed_to_id', 'LIKE', "%$keyword%")
                ->orWhere('revieweer_name', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('rating', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $review = Review::paginate($perPage);
            }

            return view('review.review.index', compact('review'));
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $reviewed = User::where('status',1)->get();
            return view('review.review.create',compact('reviewed'));
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Review::create($requestData);
            return redirect('review/review')->with('flash_message', 'Review added!');
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $review = Review::findOrFail($id);
            return view('review.review.show', compact('review'));
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $review = Review::findOrFail($id);
            $reviewed = User::where('status',1)->get();
            return view('review.review.edit', compact('review','reviewed'));
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $review = Review::findOrFail($id);
             $review->update($requestData);

             return redirect('review/review')->with('flash_message', 'Review updated!');
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
        $model = str_slug('review','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Review::destroy($id);

            return redirect('review/review')->with('flash_message', 'Review deleted!');
        }
        return response(view('403'), 403);

    }
}
