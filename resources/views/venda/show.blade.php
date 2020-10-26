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
                                    <h2>{{$getnotaVenda->usuario->username}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{date('d-m-Y', strtotime($getnotaVenda->created_at))}}
                                        {{date('H:i:s', strtotime($getnotaVenda->created_at))}}
                                    </h2>
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
                                 <h2 style="color:red">{{number_format($getnotaVenda->valor_total,2,',','.')}}</h2>
                               </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="preview-img-pro-ad">
                                   <div class="descicao">

                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th>Quant.</th>
                                                    <th>P. Unit.</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getitemVenda as $item_venda)
                                                  <tr>
                                                  <td>{{$item_venda->produto->nome}}</td>
                                                  <td>{{$item_venda->quantidade}}</td>
                                                  <td>{{number_format($item_venda->valor_venda,2,',','.')}}</td>
                                                  <td>{{number_format($item_venda->valor,2,',','.')}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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