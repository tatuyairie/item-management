@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                   @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                   @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-primary">
            <form action="{{ route('itemUpdate',$item->id) }}" method="POST" class="form-group">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <select type="number" class="form-control" id="type" name="type">
                            @foreach (App\Models\Item::$types as $key => $value)
                                @if ($item->type === $key)
                                    <option type="number" value="{{ $key }}" selected>{{ $value }}</option>
                                @else
                                    <option type="number" value="{{ $key }}" >{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
                    </div>

                    <div class="form-group">
                        <label for="quantity">在庫数</label>
                        <input type="number" class="form-control" id="price" name="quantity" value="{{ $item->quantity }}">
                    </div>

                    <div class="form-group">
                        <label for="status">表示/非表示</label>
                        <select type="text" class="form-control" id="status" name="status">
                            @foreach (App\Models\Item::$status as $value)
                                <option type="number" value="{{ $value }}" >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </div>
                
            </form>
            <form action="{{ route('itemDestroy',$item->id) }}" method="POST" class="form-group">
                @csrf
                @method('DELETE') 
                <div class="card-body">
                    <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");' >削除</button>
                </div>
            </form>  
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop