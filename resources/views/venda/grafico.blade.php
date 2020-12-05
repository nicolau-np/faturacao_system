@php
    use App\Http\Controllers\VendaController;
    $meses = [1,2,3,4,5,6,7,8,9,10,11,12];  
    $retorno = 0;
    $ano = 2020;

    $usuarios = VendaController::getUsuarios();
@endphp
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
										<p>Gráfico</p>
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
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                      
                    </figure>
                    <script type="text/javascript">
                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Gráfico demonstrativo de vendas do ano {{$ano}}'
                            },
                            subtitle: {
                                text: 'Source: noCaixa'
                            },
                            xAxis: {
                                categories: [
                                    'Janeiro',
                                    'Fevereiro',
                                    'Março',
                                    'Abril',
                                    'Maio',
                                    'Junho',
                                    'Julho',
                                    'Agosto',
                                    'Setembro',
                                    'Outubro',
                                    'Novembro',
                                    'Dezembro'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Valores (Akz)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} Akz</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [
                            <?php
                            foreach($usuarios as $usuario){
                            ?>    
                            {
                                name: "{{$usuario->username}}",
                                data: [
                                    <?php
                                    foreach($meses as $mes){
                                        $retorno = 0;
                                        $retorno = VendaController::getValueGrafico($mes, $ano, $usuario->id);
                                        echo $retorno.","; 
        
                                    }?>]
                        
                            }
                        <?php
                        echo ",";
                     }?>
                        ]
                        });
                                </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    
    @endsection