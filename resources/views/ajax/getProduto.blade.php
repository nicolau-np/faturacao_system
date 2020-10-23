@foreach ($getProduto as $produto)
<input type="radio" name="id_produto" value="{{$produto->id}}" /> 
{{$produto->nome}} - {{$produto->classe_produto->classe}} <br/>
@endforeach
@if($errors->has('id_produto'))
<span class="text-danger">{{$errors->first('id_produto')}}</span>
@endif
