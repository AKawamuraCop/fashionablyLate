<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }

    public function detail(Request $request)
{
    $id = $request->id;
    $contact = Contact::with('category')->find($id);
    return response()->json($contact);
}

public function search(Request $request)
{
    $contacts = Contact::with('category')->DateSearch($request->date)->GenderSearch($request->gender)->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->paginate(7);
    $categories = Category::all();

    return view('admin', compact('contacts', 'categories'));
}

public function export(Request $request)
    {
        // 検索条件に基づいてデータを取得
        $contacts = Contact::with('category')->DateSearch($request->date)->GenderSearch($request->gender)->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        // CSVファイルのヘッダーを設定
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        // CSVファイルを生成してレスポンスとして返す
        return response()->streamDownload(function () use ($contacts) {
            $file = fopen('php://output', 'w');

            // ヘッダーの書き込み
            fputcsv($file, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類']);

            // データの書き込み
            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->first_name . ' ' . $contact->last_name,
                    $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->category->content,
                ]);
            }

            fclose($file);
        }, 200, $headers);
    }


    public function modal(Request $request)
{
$openModal = $request->only(['openModal()']);
    return view('modal',compact[openModal]);
}

}