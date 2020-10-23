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
										<h2>Compras</h2>
										<p>Lista de Compras</p>
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
                                        <th>Usuário</th>
                                        <th>Valor Total</th>
                                        <th>Data de Emissão</th>
                                        <th>Data de Vencimento</th>
                                        <th>Descontos</th>
                                        <th>Valor Pago</th>
                                        <th>Operações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCompras as $compra)
                                       
                                    <tr>
                                    <td>{{$compra->usuario->pessoa->nome}}</td>
                                        <td>{{$compra->valor_total}}</td>
                                        <td>{{$compra->data_emissao}}</td>
                                        <td>{{$compra->data_vencimento}}</td>
                                        <td>{{$compra->desconto}}</td>
                                        <td>{{$compra->valor_pago}}</td>
                                        <td>
                                            <a href="/compras/show/{{$compra->id}}" class="btn btn-success btn-sm">Ver mais</a>
                                            <a href="/compras/edit/{{$compra->id}}" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                             
                                    @endforeach
                                         </tbody>
                            <div class="links">
                                {{$getCompras->links()}}
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