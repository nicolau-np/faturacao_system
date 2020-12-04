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
										<h2>Produtos</h2>
										<p>Lista de Produtos</p>
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
                                        <th>Tipo</th>
                                        <th>Classe</th>
                                        <th>Quantidade</th>
                                        <th>Preço Venda</th>
                                        <th>Operações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getProdutos as $produto)
                                       
                                    <tr>
                                    <td>{{$produto->nome}}</td>
                                        <td>{{$produto->tipo_produto->tipo}}</td>
                                        <td>{{$produto->classe_produto->classe}}</td>
                                        <td>{{$produto->quantidade}}</td>
                                        <td>
                                            @if ($produto->item_compra->count()>=1)
                                                {{number_format($produto->item_compra->last()->valor_venda,2,',','.')}}
                                            @else
                                            Sem valor
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/produtos/show/{{$produto->id}}" class="btn btn-success btn-sm">Ver mais</a>
                                            @if (Auth::user()->nivel_acesso=="admin" || Auth::user()->nivel_acesso=="gerente")
                                            <a href="/produtos/edit/{{$produto->id}}" class="btn btn-primary btn-sm">Editar</a>
                                            @endif
                                            @if (Auth::user()->nivel_acesso=="admin" || Auth::user()->nivel_acesso=="gerente")
                                            <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                            @endif
                                        </td>
                                    </tr>
                             
                                    @endforeach
                                         </tbody>
                            <div class="links">
                                {{$getProdutos->links()}}
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