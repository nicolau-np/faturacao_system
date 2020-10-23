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
                                    <h2>Compra {{$getCompra->fornecedor->entidade}}</h2>
										<p>Produtos da Compra</p>
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
                                        <th>Fornecedor</th>
                                        <th>Usuário</th>
                                        <th>Produto</th>
                                        <th>Valor de Compra</th>
                                        <th>Valor de Venda</th>
                                        <th>Quantidade</th>
                                        <th>Operações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getItemCompra as $itemCompra)
                                       
                                    <tr>
                                        <td>{{$itemCompra->nota_compra->fornecedor->entidade}}</td>
                                    <td>{{$itemCompra->nota_compra->usuario->pessoa->nome}}</td>
                                    <td>{{$itemCompra->produto->nome}}</td>
                                        <td>{{number_format($itemCompra->valor_compra,2,',','.')}}</td>
                                        <td>{{number_format($itemCompra->valor_venda,2,',','.')}}</td>
                                        <td>{{$itemCompra->quantidade}}</td>
                                        <td>
                                            <a href="/compras/item_compra/edit/{{$itemCompra->id}}" class="btn btn-primary btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                             
                                    @endforeach
                                         </tbody>
                            <div class="links">
                                {{$getItemCompra->links()}}
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