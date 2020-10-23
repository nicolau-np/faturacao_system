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
										<h2>Fornecedor</h2>
										<p>Novo Fornecedor</p>
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
                    {{Form::open(['method'=>"put", 'name'=>"form_fornecedor", 'url'=>"/fornecedores/update/{$getFornecedor->id}"])}}
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
                                 
                                        {{Form::text('entidade', $getFornecedor->entidade, ['class'=>"form-control", 'placeholder'=>"Nome do Fornecedor"])}}
                                        @if($errors->has('entidade'))
                                        <span class="text-danger">{{$errors->first('entidade')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                        {{Form::text('descricao', $getFornecedor->descricao, ['class'=>"form-control", 'placeholder'=>"Descrição"])}}
                                        @if($errors->has('descricao'))
                                        <span class="text-danger">{{$errors->first('descricao')}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                 
                                        {{Form::text('endereco', $getFornecedor->endereco, ['class'=>"form-control", 'placeholder'=>"Endereço"])}}
                                        @if($errors->has('endereco'))
                                        <span class="text-danger">{{$errors->first('endereco')}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    
                                        {{Form::select('id_provincia', $getProvincias, $getFornecedor->municipio->id_provincia, ['class'=>"form-control provincia", 'placeholder'=>"Província"]) }}
                                        @if($errors->has('id_provincia'))
                                        <span class="text-danger">{{$errors->first('id_provincia')}}</span>
                                        @endif
                                   
                                </div>
                            </div>
       
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group municipio">
                                    
                                        {{Form::select('id_municipio', [$getFornecedor->id_municipio=>$getFornecedor->municipio->municipio], $getFornecedor->id_municipio, ['class'=>"form-control", 'placeholder'=>"Muncípio"]) }}
                                        @if($errors->has('id_municipio'))
                                        <span class="text-danger">{{$errors->first('id_municipio')}}</span>
                                        @endif
                                   
                                </div>
                            </div>

                             
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                   
                                        {{Form::number('telefone', $getFornecedor->telefone, ['class'=>"form-control", 'placeholder'=>"Nº de Telefone"]) }}
                                        @if($errors->has('telefone'))
                                        <span class="text-danger">{{$errors->first('telefone')}}</span>
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
        $('.provincia').change(function (e) { 
            e.preventDefault();
            var data = {
                id: $(this).val()
            };
            $.ajax({
                type: "post",
                url: "{{route('getMunicipio')}}",
                data: data,
                dataType: "html",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('.municipio').html(response);
                    //console.log(response);
                }
            });
        });
    });
</script>
@endsection
    