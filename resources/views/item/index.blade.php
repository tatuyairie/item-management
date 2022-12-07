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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="sort" data-sort="id">商品コード</th>
                                <th class="sort" data-sort="name">商品名</th>
                                <th class="sort" data-sort="type">種別</th>
                                <th class="sort" data-sort="price">価格</th>
                                <th class="sort" data-sort="quantity">在庫数</th>
                                {{-- <th>詳細</th> --}}
                                <th>編集</th>
                                <th>ステータス</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="id">0000{{ $item->id }}<br>
                                        {{-- @foreach ( $item->sales as $val )
                                            {{ $val->total_price }}<br>
                                        @endforeach --}}
                                    </td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="type">{{ App\Models\Item::$types[$item->type] }}</td>
                                    <td class="price">{{ $item->price }}</td>

                                    @if ($item->quantity <= 5)
                                        <td style="color:red">{{ $item->quantity }}</td>
                                    @else
                                        <td>{{ $item->quantity }}</td>
                                    @endif
                                    <td>
                                        <form action="{{ route('edit',$item->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('GET')
                                            <input type="submit" value="編集">
                                        </form>
                                    </td>
                                    <td>{{ $item->status }}
                                        {{-- <form action="{{ route('status',$item->id) }}" method="POST" class="form-group">
                                            @csrf
                                            @method('POST')
                                            <input type="submit" value="非表示" onclick='return confirm("本当に非表示にしますか？");'>
                                        </form> --}}
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
