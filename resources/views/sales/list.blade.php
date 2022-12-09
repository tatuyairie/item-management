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
                <div class="card-body table-responsive p-0" style="height: 75vh">
                    <table class="table table-hover text-nowrap">
                        <thead class="sticky-top bg-white">
                            <tr>
                                <th class="sort" data-sort="id" width="50px" style="cursor: pointer">商品コード</th>
                                <th class="sort" data-sort="name" style="cursor: pointer">商品名</th>
                                <th class="sort" data-sort="type" style="cursor: pointer">種別</th>
                                <th class="sort" data-sort="amount" style="cursor: pointer">売上数</th>
                                <th class="sort" data-sort="price" style="cursor: pointer">価格</th>
                                <th class="sort" data-sort="total_price" style="cursor: pointer">売上金額</th>
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
                                </tr>
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