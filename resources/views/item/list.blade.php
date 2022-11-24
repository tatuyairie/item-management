@extends('common.side')

@section('main')
{{-- <h1>商品一覧画面</h1> --}}
    <div id="sales">
        <div class="search">
        <input class="search-input" placeholder="検索フォーム" />
        <button class="itemRegister"><a href="{{ route('item_register') }}">商品登録</a></button>
        </div>
    <div><br></div>
    <table border="1" cellspacing="0"> 
        <thead>
            <tr>
                <th class="sort" data-sort="id" title="クリックするとソートできます">ID</th>
                <th class="sort" data-sort="name" title="クリックするとソートできます">商品名</th>
                <th class="sort" data-sort="type" title="クリックするとソートできます">種別</th>
                <th class="sort" data-sort="quantity" title="クリックするとソートできます">個数</th>
                <th class="sort" data-sort="price" title="クリックするとソートできます">金額</th>
                <th>詳細</th>
                <th class="wide1"></th>
                <th class="wide2"></th>
                {{-- <th>削除</th> --}}
            </tr>
            
        </thead>
        <tbody class="list">
            @foreach ($items as $item)
                <tr>
                    <td class="id">{{ $item->id }}</td>
                    <td class="name">{{ $item->name }}</td>
                    <td class="type">{{ App\Models\Item::$types[$item->type] }}</td>
                    <td class="quantity">{{ $item->quantity}}</td>
                    <td class="price">{{ $item->price}}円</td>
                    <td>{{ $item->detail }}</td>
                    <td>
                        <form action="{{ route('item_edit',$item->id) }}" method="POST" class="form-group">
                            @csrf
                            @method('GET')
                        <input type="submit" value="編集" id="listEdit">
                        </form>
                    </td>
                    {{-- <td>
                        <form action="{{ route('destroy',$item->id) }}" method="POST" class="form-group">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('destroy',$item->id) }}"></a>
                            <input type="submit" name="" value="削除" class="form-control" onclick='return confirm("本当に削除しますか？");'>
                        </form>
                    </td> --}}
                    <td>
                        <form action="{{ route('sales_register',$item->id) }}" method="POST" class="form-group">
                            @csrf
                            @method('GET')
                        <input type="submit" id="salesRegister" value="売上入力">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $items->links() !!}
@endsection