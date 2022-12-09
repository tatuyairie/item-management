@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
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
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 75vh">
                    <table class="table table-hover text-nowrap">
                        <thead class="sticky-top bg-white">
                            <tr>
                                <th class="sort" data-sort="id" style="cursor: pointer">商品コード</th>
                                <th class="sort" data-sort="name" style="cursor: pointer">商品名</th>
                                <th class="sort" data-sort="type" style="cursor: pointer">種別</th>
                                <th class="sort" data-sort="price" style="cursor: pointer">価格</th>
                                <th class="sort" data-sort="quantity" style="cursor: pointer">在庫数</th>
                                {{-- <th>詳細</th> --}}
                                <th>編集</th>
                                <th>ステータス</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="type">{{ App\Models\Item::$types[$item->type] }}</td>
                                    <td class="price">{{ $item->price }}</td>
                                    @if ($item->quantity <= 5)
                                        <td class="quantity" style="color:red">{{ $item->quantity }}</td>
                                    @else
                                        <td class="quantity">{{ $item->quantity }}</td>
                                    @endif
                                    <td>
                                        <form action="{{ route('edit',$item->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('GET')
                                            <input type="submit" value="編集">
                                        </form>
                                    </td>
                                    <td>{{ $item->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
