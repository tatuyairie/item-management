<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // $sales = Item::find($count)->sales;
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
            // $this->validate($request, [
            //     'name' => 'required|max:$count00',
            //     'price' => 'required|max:$count00',

            // ]);
            // $items = DB::table('items')->get();
            $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();
            // foreach($request->all() as $id => $item){
                $count=0;
            foreach($items as $item){
                // dd($request->all());
                $count ++;
                $sale = New sale;
                if ($request->input('amount.'.$count)>0){
                    Sale::create([
                        'user_id' => $request->input('user_id.'.$count),
                        'item_id' => $request->input('item_id.'.$count),
                        'name' => $request->input('name.'.$count),
                        'type' => $request->input('type.'.$count),
                        'amount' => $request->input('amount.'.$count),
                        'price' => $request->input('price.'.$count),
                        'total_price' => $request->input('total_price.'.$count),
                    ]);
                }
                
                // $sale->user_id = Auth::id();
                // $sale->where('id', '=', $id);
                // $sale->save();
                // $sale->amount = $amount;
            
            }
            
            return redirect('sales/list');
        }
                
        return view('sales.register');
    }
    
    public function salesStore(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:$count00',
                'price' => 'required|max:$count00',

            ]);
            // $items = DB::table('items')->get();
            $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();
            // foreach($items as $item){
                // dd($request->all());
                $sale = New sale;
                // Sale::create([
                //     'user_id' => $request->input('user_id'),
                //     'item_id' => $request->input('item_id'),
                //     'name' => $request->input('name'),
                //     'type' => $request->input('type'),
                //     'price' => $request->input('price'),
                //     'amount' => $request->input('amount'),
                //     'total_price' => $request->input('total_price'),
                // ]);
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
