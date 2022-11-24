@extends('common.side')

@section('main')
    @if ($message = Session::get('success'))
        <p>{{ message }}</p>
    @endif
    {{-- <h1>売上編集画面</h1> --}}
    <form action="{{ route('update',$sale->id) }}" method="POST"  class="form-group"
        oninput="total_price.value = Math.round(Number(price.value) * Number(quantity.value) /1 );">
        {{--  oninputで合計金額を自動計算しています。 --}}
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
        </p>
@endsection