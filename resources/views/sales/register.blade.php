@extends('adminlte::page')

@section('title', '売上登録')

@section('content_header')
    <h1>売上登録</h1>
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
                <form method="POST"
                oninput="total_price.value = Math.round(Number(price.value) * Number(quantity.value) /1 );">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select type="number" class="form-control" id="type" name="type">
                                @foreach (App\Models\Item::$types as $key => $value)
                                    @if( $item->type === $key)
                                        <option type="number" value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option type="number" value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="number">売上数</label>
                            <input type="number" class="form-control" id="quantity" name="type" placeholder="売上数">
                        </div>

                        <div class="form-group">
                            <label for="number">金額</label>
                            <input type="number" class="form-control" id="price" name="type" placeholder="金額">
                        </div>


                        <div class="form-group">
                            <label for="number">合計金額</label>
                            <input type="number" class="form-control" id="total_price" name="type" placeholder="合計金額">
                        </div>
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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

        <form action="{{ route('store') }}" method="POST" class="form-group"
        oninput="total_price.value = Math.round(Number(price.value) * Number(quantity.value) /1 );">
            @csrf
            <p>商品名<br>
                <input type="text" name="name" class="input" value="{{ $item->name }}">
                @if ($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
            </p>
            <p>種別<br>
                {{-- <select name="type" type="number" value="{{ $item->type }}" class="input">
                    @foreach ($category as $key => $value)
                        <option type="number" value="{{ $key }}" >{{ $value }}</option>
                    @endforeach
                </select> --}}
                <select name="type" type="number" value="" class="input">
                    @foreach (App\Models\Item::$types as $key => $value)
                        @if( $item->type === $key)
                            <option type="number" value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option type="number" value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>

            </p>
            <p>金額<br>
                <input type="number" name="price" value="{{ $item->price }}" class="input">
                @if ($errors->has('price'))
                    <p class="text-danger">{{$errors->first('price')}}</p>
                    @endif
            </p>
            <p>個数<br>
                <input type="number" name="quantity" value="{{ $item->quantity }}" class="input">
                @if ($errors->has('quantity'))
                    <p class="text-danger">{{$errors->first('quantity')}}</p>
                    @endif
            </p>
            <p>詳細<br>
                <input type="text" name="detail" value="{{ $item->detail }}" class="input">
            </p>
            <p>合計金額<br>
            <input name="total_price" type="number" placeholder="自動で計算されます" class="input"><br></output>
            </p>
            <br> 
            <p>
            <input type="submit" class="submit" value="登録する">
            </p>
        </form>
    </div>
@endsection