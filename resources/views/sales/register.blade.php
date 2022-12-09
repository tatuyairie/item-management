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
            <div class="card">
                <form action="{{ route('salesAdd') }}" method="POST" class="form-group">
                        @csrf
                    <div class="card-body table-responsive p-0" style="height: 75vh">
                        <table class="table table-hover text-nowrap">
                            <thead class="sticky-top bg-white">
                                <tr>
                                    <th width="40px">商品コード</th>
                                    <th></th>
                                    <th width="280px">名前</th>
                                    <th>種別</th>
                                    <th>価格</th>
                                    <th>売上数</th>
                                    <th>売上金額</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td name="id[{{ $item->id }}]">{{ $item->id }}</td>
                                        <td>
                                            <input type="hidden" name="item_id[{{ $item->id }}]" class="form-control" id="name" value="{{ $item->id }}" readonly style="border: none;">
                                        </td>
                                        <td>
                                            <input type="text" name="name[{{ $item->id }}]" class="form-control" id="name" value="{{ $item->name }}" readonly style="border: none;">
                                        </td>
                                        <td>
                                            <select type="number" class="form-control" id="type" name="type[{{ $item->id }}]" style="pointer-events: none; border: none;">
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
                                            <input type="number" class="form-control price" name="price[{{ $item->id }}]" value="{{ $item->price }}" readonly style="border: none;">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control amount" name="amount[{{ $item->id }}]" value="0" onchange="reCalc();">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control total" name="total_price[{{ $item->id }}]" placeholder="" value="" readonly style="border: none;">
                                        </td>
                                    </tr>
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
                                        <input type="number" class="form-control" id="total" name="total" readonly value="0" disabled>円
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">一括登録</button>
                    </div>
                </form>
            </div>
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
        $('input[class$=price]').each(function(i){
        $(this).attr('id','price' + (i+1));
        });
    });
    $(function(){
        $('input[class$=amount]').each(function(i){
        $(this).attr('id','amount' + (i+1));
        });
    });
    $(function(){
        $('input[class$=total]').each(function(i){
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