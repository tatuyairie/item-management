<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sale;
use App\Models\Item;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $sort = $request->sort;
        $sales = Sale::simplePaginate(20);
        return view('sales.list', [
            'sales' => $sales, 
            'sort' => $sort,
        ]);
    }
    /**
     * 売上登録
     */
    public function register(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'price' => 'required|max:100',
            ]);

            // 売上登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reg(Request $request)
    {
        // Validationをする
        $request->validate([
            'name' => ['required'], #名前
            'price' => ['required','integer'], #金額
            'type' => ['required', 'string'], #種類、カテゴリー
            'quantity' => ['required','integer'] #在庫数
        ]);
        $item = new Item();
        $item->fill($request->all())->save();
        return redirect()->route('item_list',compact('item'))->with('success','新規登録完了しました');   
}

    /**
     * Store a newly sales_registerd resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validationをする
        $request->validate([
            'name' => ['required'], #名前
            'price' => ['required','integer'], #金額
            'type' => ['required', 'string'], #種類、カテゴリー
            'quantity' => ['required','integer']
        ]);
        // 登録
        $sale = new Sale();
        $sale->fill($request->all())->save();

        return redirect()->route('item_list')->with('success','新規登録完了しました');
        
        
    }

    /**
     * Show the form for sales_editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sales.sales_edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sale $sale)
    {
        $sale->fill($request->all())->save();
        return redirect()->route('sales_list',$sale)->with('success','編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::where('id',$id)->delete();
        return redirect()->route('sales_list')->with('success','削除完了しました');
    }
}
