<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sale;
use App\Models\Item;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $sort = $request->sort;
        $sales = Sale::simplePaginate(20);
        // $sales = Sale::all();
        // return view('item.index', compact('items'));
        // $sales = Item::find(1)->sales;
        return view('sales.list', [
            'sales' => $sales, 
            'sort' => $sort,
        ]);
    }
    /**
     * 売上登録
     */
    public function salesAdd(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'price' => 'required|max:100',

            ]);
            $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();
            // foreach($items as $item){
                $sale = New sale;
                $sale->user_id = Auth::id();
                // $sale->where($sale->id, '=', $request->input('item_id'));
                $sale->fill($request->all())->save();
            // }
            
            return redirect('sales/list');
        }

        return view('sales.register');
    }
    
    /**
     * Show the form for sales_editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesEdit($id)
    {
        $sale = Sale::find($id);
        return view('sales.edit',compact('sale'));
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
        return redirect()->route('list',$sale)->with('success','編集完了しました');
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
        return redirect()->route('list')->with('success','削除完了しました');
    }
}
