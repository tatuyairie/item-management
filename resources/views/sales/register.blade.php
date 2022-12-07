@extends('adminlte::page')

@section('title', '売上登録')

@section('content_header')
    <h1>売上登録</h1>
@stop

@section('content')
<body onload="reCalc();">
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
            <form method="POST">
            {{-- oninput="total_price.value = Math.round(Number(price.value) * Number(amount.value));"> --}}
                    @csrf
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="40px">商品コード</th>
                                <th></th>
                                <th width="280px">名前</th>
                                <th>種別</th>
                                <th>価格</th>
                                <th>売上数</th>
                                <th>売上金額</th>
                                <th>登録</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <form action="{{ route('salesAdd',$item->id) }}" method="POST" class="form-group">
                                @csrf
                                <tr>
                                    <td name="id">{{ $item->id }}</td>
                                    <td>
                                        <input type="hidden" name="item_id" class="form-control" id="name" value="{{ $item->id }}" readonly style="border: none;">
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" readonly style="border: none;">
                                    </td>
                                    <td>
                                        <select type="number" class="form-control" id="type" name="type" style="pointer-events: none; border: none;">
                                            @foreach (App\Models\Sale::$types as $key => $value)
                                                @if ($item->type === $key)
                                                    <option type="number" value="{{ $key }}" selected>{{ $value }}</option>
                                                @else
                                                    <option type="number" value="{{ $key }}">{{ $value }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="price" value="{{ $item->price }}" readonly style="border: none;">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="amount" value="0" onchange="reCalc();">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="total_price" placeholder="" value="" readonly style="border: none;">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">登録</button>
                                    </td>
                                 </tr>
                                </form>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="float: right">総合計</td>
                                <td>
                                    <input type="number" class="form-control" id="total" name="total" readonly value="0">円
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">一括登録</button>
                </div>
            </form>
            {{-- <div class="card card-primary">
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
            </div> --}}
        </div>
    </div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('td[name="id"]').each(function(i){
        $(this).attr('id','id' + (i+1));
        });
    });
    $(function(){
        $('input[name="price"]').each(function(i){
        $(this).attr('id','price' + (i+1));
        });
    });
    $(function(){
        $('input[name="amount"]').each(function(i){
        $(this).attr('id','amount' + (i+1));
        });
    });
    $(function(){
        $('input[name="total_price"]').each(function(i){
        $(this).attr('id','total_price' + (i+1));
        });
    });
    
    // 指定したエレメント(input)が所属する行(tr)を取得
    function gyo(obj)
    {
        return obj.parentElement.parentElement ;
    }
    // 指定したエレメント(input)と同じ行にある単価を取得
    function price(obj)
    {
        return gyo(obj).querySelectorAll("input[id^=price]")[0].value ;
    }

    // 指定したエレメント(input)と同じ行にある数量を取得
    function amount(obj)
    {
        return gyo(obj).querySelectorAll("input[id^=amount]")[0].value ;
    }

    // 指定したエレメント(input)の横計(単価×数量)を再計算してから取得
    function total_price(obj)
    {
        result = Number(price(obj)) * Number(amount(obj));
        gyo(obj).querySelectorAll("input[id^=total_price]")[0].value = result ;
        return result ;
    }
    // 総合計を再計算
    function tatekei()
    {
        prices = Array.from(document.querySelectorAll("input[id^=total_price]")).map(element => Number(total_price(element))) ;
        result = prices.reduce(function(sum,element){
            return sum + element ;
        });
        return result;
    }

    // 再計算
    function reCalc()
    {
        document.getElementById("total").value = tatekei();
        return;
    }
</script>
</body>
@stop

@section('css')
@stop

@section('js')
@stop