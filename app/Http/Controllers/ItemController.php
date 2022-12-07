<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Sale;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Add a "deleted at" timestamp for the table.
     *
     * @param  string  $column
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    // public function softDeletes($column = 'deleted_at', $precision = 0)
    // {
    //     return $this->timestamp($column, $precision)->nullable();
    // }
    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            // ->withTrashed()#論理削除された項目も含め表示する
            // ->onlyTrashed()#論理削除された項目だけ表示する
            ->get();

        return view('item.index', compact('items'));
    }
    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            // Item::create([
            //     'user_id' => Auth::user()->id,
            //     'name' => $request->name,
            //     'type' => $request->type,
            //     'price' => $request->price,
            //     'quantity' => $request->quantity,
            //     'detail' => $request->detail,
            // ]);
            $item = new Item();
            $item->user_id = Auth::id();
            // $sale->item_id = $request->id();
            $item->fill($request->all())->save();
            return redirect('/items');
        }

        return view('item.add');
    }
    public function status ($id)
    {
        Item::where('id',$id)
        // ->status
        ->delete();
        return redirect('/items');
    }
    public function edit ($id)
    {
        $item = Item::find($id);
        return view('item.edit',compact('item'));
    }
    public function itemUpdate(Request $request, item $item)
    {
        $request->validate([
            'name' => ['required'], #名前
            'price' => ['required','integer'], #金額
            'type' => ['required', 'string'], #種類、カテゴリー
            'quantity' => ['required','integer'] #在庫数
        ]);
        // dd($request);
        $item->fill($request->all())->save();
        return redirect('/items');
        // return redirect()->route('/item',$item)->with('success','編集完了しました');
    }
    public function salesRegister() {
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();
        
        // $item->user_id = Auth::id();
        return view('sales.register',compact('items'));
    }
    public function itemDestroy($id)
    {
        Item::where('id',$id)->delete();
        return redirect('/items');
        // return redirect()->route('/items')->with('success','削除完了しました');
    }
}
