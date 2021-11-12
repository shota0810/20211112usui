<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use App\Models\Content;

class TodoController extends Controller
{
    public function index()
    {
        // データ一覧の取得
        // 表示
        $items = Content::all();
        return view('index', ['items' => $items]);
    }

    public function create(ContentRequest $request)
    {
        // フォームで送信(post)された項目を$formに代入
        // ORMを用いてデータ($form)を追加
        $form = $request->all();
        Content::create($form);
        return redirect('/');
    }

    public function update(ContentRequest $request)
    {
        // フォームで送信(post)された項目を$formに代入
        // idで判別し、該当データを更新
        $form = $request->all();
        unset($form['_token']);
        Content::where('id', $request->id)->update(['content'=>$request->content]);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        // idで判別し、該当データを削除
        Content::find($request->id)->delete();
        return redirect('/');
    }
}
