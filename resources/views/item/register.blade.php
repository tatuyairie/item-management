@extends('common.side')

@section('main')
        @if ($message = Session::get('success'))
        <p>{{ message }}</p>
    @endif
{{-- <h1>商品登録画面</h1> --}}
    <form action="{{ route('itemStore') }}" method="POST" class="form-group">
        @csrf
        <p>商品名<br>
            <input type="text" name="name" class="input" >
            @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </p>
        <p>種別<br>
            {{-- <select name="type" type="number" value="" class="input">
                @foreach ($category as $key => $value)
                    <option type="number" value="{{ $key }}" >{{ $value }}</option>
                @endforeach
            </select> --}}
            <select name="type" type="number" value="" class="input">
                @foreach (App\Models\Item::$types as $key => $value)
                    <option type="number" value="{{ $key }}" >{{ $value }}</option>
                @endforeach
            </select>
        </p>
        <p>金額<br>
            <input type="number" name="price" class="input">
            @if ($errors->has('price'))
                <p class="text-danger">{{$errors->first('price')}}</p>
            @endif
        </p>
        <p>個数<br>
            <input type="number" name="quantity" class="input">
            @if ($errors->has('quantity'))
                <p class="text-danger">{{$errors->first('quantity')}}</p>
            @endif
        </p>
        <p>詳細<br>
            <input type="text" name="detail" class="input">
            @if ($errors->has('detail'))
                <p class="text-danger">{{$errors->first('detail')}}</p>
            @endif
        </p>
        <br>
        <p>
            <input type="submit" class="submit" value="登録する">
        </p>
    </form>
@endsection