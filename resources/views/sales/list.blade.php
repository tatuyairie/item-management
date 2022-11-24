@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>売上一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">売上一覧</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <div id="sales">
                        <div class="form-group">
                            <div class="search">
                                <form action="{{ route('list') }}" method="GET">
                                    @csrf
                                <input class="form-control input-lg" placeholder="検索フォーム" />
                            </form>
                        </div>
                    </div>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="name">名前</th>
                                <th class="sort" data-sort="type">種別</th>
                                <th class="sort" data-sort="quantity">個数</th>
                                <th class="sort" data-sort="price">価格</th>
                                <th class="sort" data-sort="total_price">合計金額</th>
                                <th>詳細</th>
                                <th>編集</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="id">{{ $sale->id }}</td>
                                    <td class="name">{{ $sale->name }}</td>
                                    <td class="type">{{ App\Models\Item::$types[$sale->type] }}</td>
                                    <td class="quantity">{{ $sale->quantity}}</td>
                                    <td class="price">{{ $sale->price }}</td>
                                    <td class="total_price">{{ $sale->total_price}}円</td>
                                    <td>{{ $sale->detail }}</td>
                                    <td>
                                        <form action="{{ route('edit',$sale->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('GET')
                                            <input type="submit" value="編集">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroy',$sale->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？");'>
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

            {{-- @php
            $sum = 0;
            $total = 0;
            @endphp --}}
            {{-- @php
                $total += $sale->total_price ;
            @endphp --}}
            {{-- <td>合計</td>
            <td>{{$total ?? ''}}円</td> --}}
        
    
