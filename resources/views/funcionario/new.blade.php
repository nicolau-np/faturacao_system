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
										<h2>Funcionários</h2>
										<p>Novo Funcionário</p>
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
                    {{Form::open(['method'=>"post", 'name'=>"form_notaCompra", 'url'=>"/compras/store"])}}
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
                                    {{Form::date('data_emissao', null, ['class'=>"form-control", 'placeholder'=>"Data de Emissão"])}}
                                        @if($errors->has('data_emissao'))
                                        <span class="text-danger">{{$errors->first('data_emissao')}}</span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                        {{Form::date('data_vencimento', null, ['class'=>"form-control", 'placeholder'=>"Data de Entrega"])}}
                                        @if($errors->has('data_vencimento'))
                                        <span class="text-danger">{{$errors->first('data_vencimento')}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
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

@endsection
    