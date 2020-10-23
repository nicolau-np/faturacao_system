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
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Fornecedores</h2>
										<p>Lista de Fornecedores</p>
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
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2></h2>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Entidade</th>
                                        <th>Província</th>
                                        <th>Município</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getFornecedores as $fornecedor)
                                       
                                    <tr>
                                    <td>{{$fornecedor->entidade}}</td>
                                        <td>{{$fornecedor->municipio->provincia->provincia}}</td>
                                        <td>{{$fornecedor->municipio->municipio}}</td>
                                        <td>{{$fornecedor->telefone}}</td>
                                        <td>{{$fornecedor->endereco}}</td>
                                        <td>
                                            <a href="/fornecedores/show/{{$fornecedor->id}}" class="btn btn-success btn-sm">Ver mais</a>
                                            <a href="/fornecedores/edit/{{$fornecedor->id}}" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                             
                                    @endforeach
                                         </tbody>
                            <div class="links">
                                {{$getFornecedores->links()}}
                            </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    
    @endsection