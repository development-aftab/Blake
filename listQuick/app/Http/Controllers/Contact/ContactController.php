<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $contact = Contact::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $contact = Contact::paginate($perPage);
            }

            return view('contact.contact.index', compact('contact'));
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) { 
            return view('contact.contact.create');
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'email' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            Contact::create($requestData);
            return redirect('contact/contact')->with('flash_message', 'Contact added!');
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $contact = Contact::findOrFail($id);
            return view('contact.contact.show', compact('contact'));
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $contact = Contact::findOrFail($id);
            $contacts=Contact::where('status',1)->get();
            return view('contact.contact.edit', compact('contact','contacts'));
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'email' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            $contact = Contact::findOrFail($id);
             $contact->update($requestData);

             return redirect('contact/contact')->with('flash_message', 'Contact updated!');
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
        $model = str_slug('contact','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Contact::destroy($id);

            return redirect('contact/contact')->with('flash_message', 'Contact deleted!');
        }
        return response(view('403'), 403);

    }
}
