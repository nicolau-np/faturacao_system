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
										<h2>Produtos</h2>
										<p>Novo <span class="bread-ntd">Produto</span></p>
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
                    {{Form::open(['method'=>"post", 'name'=>"form_produto", 'url'=>"/produtos/store"])}}
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
                                    
                                        {{Form::select('id_classe_produto', $getClasseProduto, null, ['class'=>"form-control", 'placeholder'=>"Classe do Produto"]) }}
                                        @if($errors->has('id_classe_produto'))
                                        <span class="text-danger">{{$errors->first('id_classe_produto')}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        
                          
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    
                                        {{Form::select('id_tipo', $getTipoProduto, null, ['class'=>"form-control", 'placeholder'=>"Tipo do Produto"]) }}
                                        @if($errors->has('id_tipo'))
                                        <span class="text-danger">{{$errors->first('id_tipo')}}</span>
                                        @endif
                                   
                                </div>
                            </div>
                         
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
    