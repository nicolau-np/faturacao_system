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
										<h2>Vendas</h2>
										<p>Lista de Vendas</p>
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
                                        <th>Nome</th>
                                        <th>Usuário</th>
                                        <th>Valor Total</th>
                                        <th>Descontos</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getnotaVenda as $nota_venda)
                                       
                                    <tr>
                                        <td>{{$nota_venda->usuario->pessoa->nome}}</td>
                                    <td>{{$nota_venda->usuario->username}}</td>
                                        <td>{{number_format($nota_venda->valor_total,2,',','.')}}</td>
                                        <td>{{number_format($nota_venda->desconto,2,',','.')}}</td>
                                        <td>{{date('d-m-Y', strtotime($nota_venda->created_at))}}</td>
                                        <td>{{date('H:i:s', strtotime($nota_venda->created_at))}}</td>
                                        <td>{{$nota_venda->status}}</td>
                                        <td>
                                            <a href="/vendas/show/{{$nota_venda->id}}" class="btn btn-success btn-sm">Ver mais</a>
                                         </td>
                                    </tr>
                             
                                    @endforeach
                                         </tbody>
                            <div class="links">
                                {{$getnotaVenda->links()}}
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