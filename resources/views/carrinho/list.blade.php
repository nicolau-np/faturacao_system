@extends('layote')
@section('content')

	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2></h2>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Quant</th>
                                        <th>Preço Venda</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            <div class="links">
                                
                            </div>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    {{Form::open(['method'=>"put", 'name'=>"form_itemVenda", 'url'=>"/carrinho/store/{$getnotaVenda->id}"])}}
                    {{csrf_field()}}
					@if(session('error'))
					<div class="alert alert-danger">{{session('error')}}</div>
					@endif

					@if(session('success'))
					<div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <div class="form-element-list">
                     
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
        });
    </script>
    @endsection