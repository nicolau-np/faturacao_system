@php
    use App\Http\Controllers\ProdutoController;
    $meses = [1,2,3,4,5,6,7,8,9,10,11,12];  
    $retorno = 0;
    $ano = 2020;

    $produtos = ProdutoController::getProdutos();
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
										<h2>Produtos</h2>
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
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Gráfico demonstrativo de produtos mais vendidos em {{$ano}}'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y:,2f} Akz</b>'
    },
    accessibility: {
        point: {
            valueSuffix: 'Akz'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y:,2f} Akz',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Valor',
        data: [
            <?php 
                foreach($produtos as $produto){
            ?>
            { name: '{{$produto->nome}}', 
            <?php 
            $valor = ProdutoController::getValuesProduto($produto->id, $ano);
            ?>
            y: {{$valor}} 
            <?php ?>
            },
           
            <?php } ?>
        ]
    }]
});
		</script>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    
    @endsection