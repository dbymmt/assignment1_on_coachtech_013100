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
        // クエリ作成
        $query = Contact::BuildQuery($request->input('keyword'), $request->input('gender'), $request->input('category_id'), $request->input('date'));

        // CSV作成有無、作成する場合toCSVへ
        if($request->input('toCSV')){
            $results = $query->get();
            return $this->toCSV($results);
        }else{
            $results = $query->paginate(7)->withQueryString();
        }

        // 選択肢用カテゴリ一覧付加しviewへ渡す
        $categories = Category::all();
        return view('admin', 
            [
                'results' => $results,
                'categories' => $categories,
            ]);
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

