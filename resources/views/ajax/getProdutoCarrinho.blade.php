@foreach ($getProduto as $produto)
<input type="radio" name="id_produto" value="{{$produto->id}}" /> 
{{$produto->nome}} - 
<span style="font-weight: bold; color:red;">{{number_format($produto->item_compra->last()->valor_venda,2,',','.')}}</span>
&nbsp;&nbsp;&nbsp;
{{$produto->quantidade}}
<br/>
@endforeach
@if($errors->has('id_produto'))
<span class="text-danger">{{$errors->first('id_produto')}}</span>
@endif
