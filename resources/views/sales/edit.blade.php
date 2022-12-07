{{-- @extends('common.side')

@section('main')
    @if ($message = Session::get('success'))
        <p>{{ message }}</p>
    @endif
    {{-- <h1>売上編集画面</h1> --}}
    {{-- <form action="{{ route('update',$sale->id) }}" method="POST"  class="form-group"
        oninput="total_price.value = Math.round(Number(price.value) * Number(quantity.value) /1 );">
         oninputで合計金額を自動計算しています。
        @csrf
        @method('PUT')
        <p>商品名<br>
            <input type="text" name="name" value="{{ $sale->name }}" class="input">
            @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </p>
        <p>種別<br>
            <select name="type" type="number" value="" class="input">
                @foreach (App\Models\Sale::$types as $key => $value)
                    @if( $sale->type === $key)
                        <option type="text" value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                        <option type="text" value="{{ $key }}">{{ $value }}</option>
                    @endif
                @endforeach
            </select>
        </p>
        <p>金額<br>
            <input type="number" name="price" value="{{ $sale->price }}" class="input">
            @if ($errors->has('price'))
                <p class="text-danger">{{$errors->first('price')}}</p>
            @endif
        </p>
        <p>個数<br>
            <input type="number" name="quantity" value="{{ $sale->quantity }}" class="input">
            @if ($errors->has('quantity'))
                <p class="text-danger">{{$errors->first('quantity')}}</p>
            @endif
        </p>
        <p>詳細<br>
            <input type="text" name="detail" value="{{ $sale->detail }}" class="input">
        </p>
        <p>合計金額<br>
        <input name="total_price" type="number" placeholder="自動で計算されます" class="input"><br></output>
        </p>
        <p><br>
            <input type="submit" value="編集する" id="edit">
        </form>
            <form action="{{ route('destroy',$sale->id) }}" method="POST" class="form-group">
                @csrf
                @method('DELETE')
                <p>
                    <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？");' id="salesDelete">
                </p>
            </form>
@endsection  --}}
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
                {{-- <div class="input-group-append">
                    <input type="submit" value="削除" id="delete" onclick='return confirm("本当に削除しますか？");' >
                </div> --}}
            </form>  
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop