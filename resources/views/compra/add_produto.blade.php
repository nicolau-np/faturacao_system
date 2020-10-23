@extends('layote')
@section('content')
    <!-- Main Menu area End-->
	<!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Adicionar Produto</h2>
										<p>Items da Compra</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{Form::open(['method'=>"post", 'name'=>"form_itemCompra", 'url'=>"/compras/store_addProduto"])}}
                    {{csrf_field()}}
					@if(session('error'))
					<div class="alert alert-danger">{{session('error')}}</div>
					@endif

					@if(session('success'))
					<div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    <div class="form-element-list">
                     
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                       {{Form::text('produto', null, ['class'=>"form-control produto_search", 'placeholder'=>"Pesquisar Produto ..."]) }}
                                        @if($errors->has('produto'))
                                        <span class="text-danger">{{$errors->first('produto')}}</span>
                                        @endif
                                </div>
                            </div>

                            
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 carregar_produtos">
                                <input type="radio" name="id_produto" value="" />
                              </div>
                        </div>
                        <hr/>
                        
                        <div class="row">
                       
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                   
                                        {{Form::number('valor_total', null, ['class'=>"form-control", 'placeholder'=>"Valor Total"]) }}
                                        @if($errors->has('valor_total'))
                                        <span class="text-danger">{{$errors->first('valor_total')}}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                   
                                        {{Form::number('desconto', null, ['class'=>"form-control", 'placeholder'=>"Descontos"]) }}
                                        @if($errors->has('desconto'))
                                        <span class="text-danger">{{$errors->first('desconto')}}</span>
                                        @endif
                                </div>
                            </div>

                          
                         
                        </div>
                   
                       
                       <div class="row">
                           <div class="col-md-2">
                               {{Form::submit('Salvar', ['class'=>"btn waves-effect"])}}
                           </div>
                       </div>
                    </div>
                </div>
            </div>
   
        </div>
    </div>
<script>
    
    $(document).ready(function(){
        $('.produto_search').keyup(function (e) { 
            e.preventDefault();
            var data = {
                produto: $(this).val()
            };
            $.ajax({
                type: "post",
                url: "{{route('getProduto')}}",
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
    