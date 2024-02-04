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

            if($request->input('toCSV')){
                $results = $query->get();
                return $this->toCSV($results);
            }else{
                $results = $query->paginate(7)->withQueryString();
            }

        }
        else{
            if($request->input('toCSV')){
                $results = $query->get();
                return $this->toCSV($results);
            }else{
                $results = Contact::Paginate(7);
            }
        }

        return view('admin', ['results' => $results]);
    }

    public function toCSV($contacts)
    {
        // CSVファイルを生成し、ヘッダー行を追加
        $csvFileName = 'contacts.csv';
        $csvFile = fopen(public_path($csvFileName), 'w');
        fputcsv($csvFile, ['ID', 'お名前', '性別', 'メールアドレス', 'お問い合わせの種類', '作成日時']);

        // データをCSVファイルに書き込む
        foreach ($contacts as $contact) {
            fputcsv($csvFile, [
                $contact->id,
                $contact->first_name . ' ' . $contact->last_name,
                $contact->gender === 1 ? '男性' : ($contact->gender === 2 ? '女性' : 'その他'),
                $contact->email,
                $contact->category->content,
                $contact->created_at,
            ]);
        }

        fclose($csvFile);

        // ダウンロードリンクを返す
        return response()->download(public_path($csvFileName))->deleteFileAfterSend(true);
    }

    public function RetJSON($index)
    {
        $result = Contact::find($index);

        if (!$result) {
            return response()->json(['error' => 'データが見つかりませんでした'], 404);
        }

        $result['category'] = $result->category->content;

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

