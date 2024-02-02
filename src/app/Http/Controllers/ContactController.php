<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->all();

        return view('confirm', ['data' => $data]);
    }

    public function create(Request $request)
    {

        $query = $request->except('_token');

        $query['tel'] = $query['tel1'].$query['tel2'].$query['tel3'];
        unset($query['tel1']);
        unset($query['tel2']);
        unset($query['tel3']);
        // dd($query);

        if($request->has('back')){
            return redirect('/')->withInput();
        }

        Contact::create([
            'first_name' => $query['first_name'],
            'last_name' => $query['last_name'],
            'gender' => $query['gender'],
            'email' => $query['email'],
            'tel' => $query['tel'],
            'address' => $query['address'],
            'building' => $query['building'],
            'category_id' => $query['category_id'],
            'detail' => $query['detail']            
        ]);

        return view('thanks');
    }
}
