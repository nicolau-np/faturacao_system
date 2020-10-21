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
										<h2>Vendas</h2>
										<p>Nova <span class="bread-ntd">Venda</span></p>
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
                    {{Form::open(['method'=>"post", 'name'=>"form_produto", 'url'=>"/vendas/store"])}}
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
                                 
                                        {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome do Produto"])}}
                                        @if($errors->has('nome'))
                                        <span class="text-danger">{{$errors->first('nome')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                        {{Form::text('descricao', null, ['class'=>"form-control", 'placeholder'=>"Descrição"])}}
                                        @if($errors->has('descricao'))
                                        <span class="text-danger">{{$errors->first('descricao')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                  
                                        {{Form::number('valor_compra', null, ['class'=>"form-control", 'placeholder'=>"Valor de Compra"])}}
                                        @if($errors->has('valor_compra'))
                                        <span class="text-danger">{{$errors->first('valor_compra')}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                  
                                        {{Form::number('valor_venda', null, ['class'=>"form-control", 'placeholder'=>"Valor de Venda"])}}
                                        @if($errors->has('valor_venda'))
                                        <span class="text-danger">{{$errors->first('valor_venda')}}</span>
                                        @endif
                                </div>
                            </div>
                         
                          
                         
                        </div>
                        <div class="row">
                           
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                   
                                        {{Form::date('data_caducidade', null, ['class'=>"form-control", 'placeholder'=>"Data de Caducidade"]) }}
                                        @if($errors->has('data_caducidade'))
                                        <span class="text-danger">{{$errors->first('data_caducidade')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    
                                        {{Form::number('quantidade', null, ['class'=>"form-control", 'placeholder'=>"Quantidade"])}}
                                        @if($errors->has('quantidade'))
                                        <span class="text-danger">{{$errors->first('quantidade')}}</span>
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

@endsection
    