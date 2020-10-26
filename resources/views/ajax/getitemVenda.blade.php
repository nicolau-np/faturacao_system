<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>Produto</th>
        <th>Quant.</th>
        <th>P. Unit.</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
    @foreach ($getitemVenda as $item_venda)
 
    <tr>
    <td>{{$item_venda->produto->nome}}</td>
    <td>{{$item_venda->quantidade}}</td>
    <td>{{number_format($item_venda->valor_venda,2,',','.')}}</td>
    <td>{{number_format($item_venda->valor,2,',','.')}}</td>
    </tr>
           
    @endforeach
</tbody>
</table>