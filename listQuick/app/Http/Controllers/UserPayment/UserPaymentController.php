<?php

namespace App\Http\Controllers\UserPayment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $userpayment = UserPayment::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('amount_captured', 'LIKE', "%$keyword%")
                ->orWhere('amount_refunded', 'LIKE', "%$keyword%")
                ->orWhere('captured', 'LIKE', "%$keyword%")
                ->orWhere('currency', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('outcome', 'LIKE', "%$keyword%")
                ->orWhere('paid', 'LIKE', "%$keyword%")
                ->orWhere('payment_method_details', 'LIKE', "%$keyword%")
                ->orWhere('receipt_url', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $userpayment = UserPayment::paginate($perPage);
            }

            return view('userPayment.user-payment.index', compact('userpayment'));
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('userPayment.user-payment.create');
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            UserPayment::create($requestData);
            return redirect('userPayment/user-payment')->with('flash_message', 'UserPayment added!');
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $userpayment = UserPayment::findOrFail($id);
            return view('userPayment.user-payment.show', compact('userpayment'));
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $userpayment = UserPayment::findOrFail($id);
            return view('userPayment.user-payment.edit', compact('userpayment'));
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'user_id' => 'required'
		]);
            $requestData = $request->all();
            
            $userpayment = UserPayment::findOrFail($id);
             $userpayment->update($requestData);

             return redirect('userPayment/user-payment')->with('flash_message', 'UserPayment updated!');
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
        $model = str_slug('userpayment','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            UserPayment::destroy($id);

            return redirect('userPayment/user-payment')->with('flash_message', 'UserPayment deleted!');
        }
        return response(view('403'), 403);

    }
}
