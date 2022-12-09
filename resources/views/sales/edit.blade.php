@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>売上編集</h1>
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
            <form action="{{ route('update',$sale->id) }}" method="POST" class="form-group"
                oninput="total_price.value = Math.round(Number(price.value) * Number(amount.value) /1 );">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $sale->name }}">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <select type="number" class="form-control" id="type" name="type">
                            @foreach (App\Models\Sale::$types as $key => $value)
                                @if ($sale->type === $key)
                                    <option type="number" value="{{ $key }}" selected>{{ $value }}</option>
                                @else
                                    <option type="number" value="{{ $key }}" >{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control" name="price" value="{{ $sale->price }}">
                    </div>

                    <div class="form-group">
                        <label for="amount">売上数</label>
                        <input type="number" class="form-control" name="amount" value="{{ $sale->amount }}">
                    </div>

                    <div class="form-group">
                        <label for="total_price">合計金額</label>
                        <input type="number" class="form-control"  name="total_price" value="{{ $sale->total_price }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>
                
            </form>
            <form action="{{ route('destroy',$sale->id) }}" method="POST" class="form-group">
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