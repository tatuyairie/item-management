@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>売上一覧</h1>
@stop
<script src="{{ asset('js/salesList.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="sales">
                <div class="form-group">
                    <div class="search">
                        <form action="{{ route('list') }}" method="GET">
                            @csrf
                        <input class="form-control" placeholder="検索フォーム" />
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">売上一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="sort" data-sort="id" width="50px">商品コード</th>
                                <th class="sort" data-sort="name">商品名</th>
                                <th class="sort" data-sort="type">種別</th>
                                <th class="sort" data-sort="amount">売上数</th>
                                <th class="sort" data-sort="price">価格</th>
                                <th class="sort" data-sort="total_price">売上金額</th>
                                {{-- <th>詳細</th> --}}
                                <th>編集</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="id">{{ $sale->item_id }}</td>
                                    <td class="name">{{ $sale->name }}</td>
                                    <td class="type">{{ App\Models\Sale::$types[$sale->type] }}</td>
                                    <td class="amount">{{ $sale->amount}}</td>
                                    <td class="price">{{ $sale->price }}円</td>
                                    <td class="total_price">{{ $sale->total_price}}円</td>
                                    <td>
                                        <form action="{{ route('salesEdit',$sale->id) }}" method="GET" class="form-group">
                                            @csrf
                                            @method('GET')
                                            <input type="submit" value="編集">
                                        </form>
                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('destroy',$sale->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？");'>
                                        </form>
                                    </td> --}}
                                </tr>
                                
                                {{-- @foreach ( $sale->items as $val )
                                    {{ $val->name }}
                                @endforeach
                                {{ $item>item[0]->name }} --}}
                            @endforeach
                        </tbody>
                    </table>
                    {!! $sales->links() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop