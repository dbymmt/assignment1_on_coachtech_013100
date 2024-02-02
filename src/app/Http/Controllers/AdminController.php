<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class AdminController extends Controller
{
    //
    public function AdminIndex(Request $request)
    {
        // if($request->isMethod('post')){
        if($request->query()){

            $query = Contact::query();

            if ($request->filled('keyword')) {
                $keyword = $request->input('keyword');
                $query->where(function ($query) use ($keyword) {
                    $query->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('email', 'like', "%$keyword%");
                });
            }

            if ($request->filled('gender')) {
                $query->where('gender', $request->input('gender'));
            }

            if ($request->filled('category_id')) {
                $query->where('category_id', $request->input('category_id'));
            }

            if ($request->filled('date')) {
                $query->whereDate('created_at', $request->input('date'));
            }

            $results = $query->paginate(7)->withQueryString();;

            return view('admin', ['results' => $results]);
        }
        else{
            $results = Contact::Paginate(7);
            return view('admin', ['results' => $results]);
        }
    }

    public function RetJSON($index)
    {
        $result = Contact::find($index);

        if (!$result) {
            return response()->json(['error' => 'データが見つかりませんでした'], 404);
        }

        return response()->json($result);
    }


    public function Destroy($index)
    {
        $contact = Contact::find($index);
        if (!$contact) {
            return response()->json(['message' => '指定されたデータが見つかりませんでした'], 404);
        }

        $contact->delete();
        return response()->json(['message' => 'データが削除されました'], 200);
    }
}

