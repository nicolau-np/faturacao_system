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
                                    <h2>{{$getCompra->fornecedor->entidade}} - {{$getCompra->created_at}} </h2>
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
                                 {{$getCompra->data_emissao}}
                                 
                               </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="preview-img-pro-ad">
                                   <div class="descicao">

                                   Fornecedor: {{$getCompra->fornecedor->entidade}}<br/>
                                   Data de Emissão: {{date('d-m-Y', strtotime($getCompra->data_emissao))}}<br/>
                                   Data de Entrega: {{date('d-m-Y', strtotime($getCompra->data_vencimento))}}<br/>
                                   Valor Total: {{number_format($getCompra->valor_total,2,',','.')}}<br/>
                                   Desconto: {{number_format($getCompra->desconto,2,',','.')}} <br/>
                                   
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