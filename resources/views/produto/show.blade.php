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
										<i class="notika-icon notika-edit"></i>
									</div>
									<div class="breadcomb-ctn">
                                    <h2>{{$getProduto->nome}}</h2>
										<p>Descriçao</p>
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
    <!-- Image Cropper area Start-->
    <div class="images-cropper-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="image-cropper-wp">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <div class="bigDescricao">
                                 @if ($getProduto->descricao=="")
                                     Nenhuma descrição para este produto
                                @else
                                {{$getProduto->descricao}}
                                 @endif
                                 
                               </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="preview-img-pro-ad">
                                   <div class="descicao">

                                   Nome do produto: {{$getProduto->nome}}<br/>
                                   Tipo de Produto: {{$getProduto->tipo_produto->tipo}}<br/>
                                   Classe do Produto: {{$getProduto->classe_produto->classe}}<br/>
                                   Quantidade: {{$getProduto->quantidade}}<br/>
                                    Data de Caducidade: {{date('d-m-Y', strtotime($getProduto->data_caducidade))}} <br/>
                                   Valor de Compra:
                                   @if ($getProduto->item_compra->count()>=1)
                                       {{number_format($getProduto->item_compra->last()->valor_compra,2,',','.')}}
                                    @else
                                       Sem valor de compra
                                   @endif 
                                   <br/>
                                   Valor de Venda: 
                                   @if ($getProduto->item_compra->count()>=1)
                                       {{number_format($getProduto->item_compra->last()->valor_venda,2,',','.')}}
                                    @else
                                       Sem valor de venda
                                   @endif 
                                   <br/>
                                   </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Image Cropper area End-->
    <!-- Start Footer area-->
    @endsection