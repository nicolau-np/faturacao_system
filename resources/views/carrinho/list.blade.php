@extends('layote')
@section('content')

	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2></h2>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <div class="form_desc">
                                {{Form::open(['name'=>"form_pag", 'url'=>"/carrinho/finalizar/{$getnotaVenda->id}", 'method'=>"put"]) }}
                                <?php
                                $total = 0;
                               
                                 foreach ($getitemVenda as $item){
                                    $total = $total + $item->valor;
                                  }
                                 ?>
                                 <div class="row">
                                    {{Form::hidden('total_venda', $total, ['placeholder'=>"Total Venda", 'class'=>'total_venda']) }}
                                     <div class="col-md-4">
                                        <span style="font-size: 16px; font-weight:bold; color:#000;">Total:</span> <span style="font-size: 16px; font-weight:bold; color:red;">{{number_format($total,2,',','.')}}</span>
                                     </div>
                                     <div class="col-md-3">
                                        {{Form::number('valor_emposse', null, ['placeholder'=>"Valor em Posse", 'class'=>'form-control valor_emposse']) }}
                                     </div>
                                     <div class="col-md-3">
                                        {{Form::number('desconto', null, ['placeholder'=>"Desconto", 'class'=>'form-control']) }}
                                     </div>
                                     <div class="col-md-2">
                                         <button type="submit"><i class="fa fa-check"></i></button>
                                        
                                     </div>
                                 </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <span style="font-size: 16px; font-weight:bold; color:#000;">Troco:</span> <span style="font-size: 16px; font-weight:bold; color:red;" class="troco"></span>
                                    </div>
                                </div>
                                
                                {{Form::close()}}
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Quant.</th>
                                        <th>Preço Unit.</th>
                                        <th>Total</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($getitemVenda as $item_venda)
                                    {{Form::open(['name'=>"form_changeQuant", 'method'=>"put", 'url'=>"/carrinho/change_quant/{$getnotaVenda->id}/{$item_venda->id}"]) }}
                                    <tr>
                                       <td>{{$item_venda->produto->nome}}</td>
                                       <td>
                                        <div class="form-inline">
                                               <a href="@if($item_venda->quantidade<=1) # @else /carrinho/decrement/{{$item_venda->id}}  @endif">
                                            <i class="fa fa-minus-circle fa-2x"></i>
                                        </a>&nbsp;
                                            {{Form::number('quant', $item_venda->quantidade, ['class'=>"form-control", 'placeholder'=>"Quant", 'style'=>"width:60px"])}}
                                            &nbsp;
                                            <a href="/carrinho/increment/{{$item_venda->id}}">
                                            <i class="fa fa-plus-circle fa-2x"></i>
                                        </a>
                                        </div>
                                     
                                        </td>
                                       <td>{{number_format($item_venda->valor_venda,2,',','.')}}</td>
                                       <td>{{number_format($item_venda->valor,2,',','.')}}</td>
                                       <td>
                                           <a href="#" data-id_item_venda = "{{$item_venda->id}}" class="eliminarProduto"><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                   </tr> 
                                   {{Form::close()}}
                                    @endforeach
                                   
                                   
                                </tbody>
                            <div class="links">
                                
                            </div>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    
					@if(session('error'))
					<div class="alert alert-danger">{{session('error')}}</div>
					@endif

					@if(session('success'))
					<div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <div class="form-element-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{Form::open(['name'=>"form_barra", 'method'=>"put", 'url'=>"/carrinho/barcode/{$getnotaVenda->id}"])}}
                                {{csrf_field()}}
                                {{Form::text('barcode', null, ['class'=>"form-control", 'placeholder'=>"Codigo de Barra"])}}
                                {{Form::close()}}
                            </div>
                        </div>

                        <hr/>
                        {{Form::open(['method'=>"put", 'name'=>"form_itemVenda", 'url'=>"/carrinho/store/{$getnotaVenda->id}"])}}
                        {{csrf_field()}}
                        <div class="row">
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                       {{Form::text('produto', null, ['class'=>"form-control produto_search", 'placeholder'=>"Pesquisar Produto ..."]) }}
                                        @if($errors->has('produto'))
                                        <span class="text-danger">{{$errors->first('produto')}}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                   
                                        {{Form::number('quantidade', null, ['class'=>"form-control", 'placeholder'=>"Quantidade"]) }}
                                        @if($errors->has('quantidade'))
                                        <span class="text-danger">{{$errors->first('quantidade')}}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                {{Form::submit('Salvar', ['class'=>"btn waves-effect"])}}
                                </div>
                            </div>
 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carregar_produtos">
                                <input type="radio" name="id_produto" value="" />
                                @if($errors->has('id_produto'))
                                        <span class="text-danger">{{$errors->first('id_produto')}}</span>
                                @endif
                            </div>
                        </div>
                        {{Form::close()}}
                        <br/>
                        
                   
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <script>
    
        $(document).ready(function(){
            $('.produto_search').keyup(function (e) { 
                e.preventDefault();
                var data = {
                    produto: $(this).val()
                };
                $.ajax({
                    type: "post",
                    url: "{{route('getProdutoCarrinho')}}",
                    data: data,
                    dataType: "html",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('.carregar_produtos').html(response)
                        console.log(response);
                    }
                });
            });

            $('.valor_emposse').keyup(function(){
                var total_venda = $('.total_venda').val();
               var valor_emposse = $(this).val();
                var troco = valor_emposse - total_venda;

                $('.troco').html(troco);
                
            });

            $('.eliminarProduto').click(function(){
                var id_item_venda = $(this).data('id_item_venda');
                var confi = confirm("Deseja eliminar Produto?");
                
                if(confi == 1){
                window.location.href = "{{ url('/carrinho/eliminarProduto/') }}/"+id_item_venda;
                }
            });
        });
    </script>
    @endsection