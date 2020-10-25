@extends('layote')
@section ('content')

<!--@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif-->

<!-- Start Status area -->
<div class="notika-status-area">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="/notas_venda/store">
                
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>{{$getNotaVenda->count()}}</h2>
                    <p>Carrinho de Venda</p>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="">
                     <i class="fa fa-cart-plus fa-4x"></i>
                    </div>
                </div>

            </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">90</span></h2>
                        <p>Fornecedores</p>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="">
                     <i class="fa fa-cogs fa-4x"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">40</span></h2>
                        <p>Produtos</p>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="">
                     <i class="fa fa-paperclip fa-4x"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">1000</span></h2>
                        <p>Vendas Feitas</p>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="">
                     <i class="fa fa-bar-chart fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- End Status area-->
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="sale-statistic-inner notika-shadow mg-tb-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                        <h2>Seja Bem Vindo {{Auth::user()->pessoa->nome}}</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="home_page">

                    <img src="{{asset('assets/images/novo/faturacao-system.jpg')}}" alt="image" style="width: 100%;"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="past-day-statis">
                        <h2>Stoque de produtos</h2>
                        <p>Lista de produtos que apresentam um stoque baixo da média, alerta informativa</p>
                    </div>
                    <div class="dash-widget-visits"></div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">3,20,000</span></h3>
                            <p>prod 1</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar"></div>
                        </div>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">1,03,000</span></h3>
                            <p>prod 2</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-line"></div>
                        </div>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">24,00,000</span></h3>
                            <p>prod 4</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <div class="email-ctn-round">
                        <div class="email-rdn-hd">
                            <h2>Estatísta do dia</h2>
                        </div>
                        <div class="email-statis-wrap">
                            <div class="email-round-nock">
                                <div style="display:inline;width:130px;height:200px;"><canvas width="130" height="200"></canvas><input type="text" class="knob" value="0" data-rel="55" data-linecap="round" data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".10" data-readonly="true" readonly="readonly" style="width: 69px; height: 43px; position: absolute; vertical-align: middle; margin-top: 43px; margin-left: -99px; border: 0px; background: none; font: bold 26px Arial; text-align: center; color: rgb(0, 194, 146); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="email-ctn-nock">
                                <p>Total Compras feitas</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="recent-post-ctn">
                        <div class="recent-post-title">
                            <h2>Vendas em processo</h2>
                        </div>
                    </div>
                    <div class="recent-post-items">
                        <div class="recent-post-signle rct-pt-mg-wp">
                            <a href="#">
                                <div class="recent-post-flex">
                                    <div class="recent-post-img">
                                        <img src="img/post/2.jpg" alt="">
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>Smith</h2>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rct-pt-mg">
                                    <div class="recent-post-img">
                                        <img src="img/post/1.jpg" alt="">
                                    </div>
                                    <div class="recent-post-it-ctn">
                                        <h2>John Deo</h2>
                                        <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                     
                     
                        <div class="recent-post-signle">
                            <a href="#">
                                <div class="recent-post-flex rc-ps-vw">
                                    <div class="recent-post-line rct-pt-mg">
                                        <p>View All</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                    <div class="rc-it-ltd">
                        <div class="recent-items-ctn">
                            <div class="recent-items-title">
                                <h2>Vendas concluídas</h2>
                            </div>
                        </div>
                        <div class="recent-items-inn">
                            <table class="table table-inner table-vmiddle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuário</th>
                                        <th style="width: 60px">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="f-500 c-cyan">4555</td>
                                        <td>Samsung Galaxy Mega</td>
                                        <td class="f-500 c-cyan">$921</td>
                                    </tr>
                                    <tr>
                                        <td class="f-500 c-cyan">4556</td>
                                        <td>Huawei Ascend P6</td>
                                        <td class="f-500 c-cyan">$240</td>
                                    </tr>
                              
                                </tbody>
                            </table>
                        </div>
                        <div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res" style="padding: 0px; position: relative;"><canvas class="flot-base" width="249" height="98" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 249px; height: 98px;"></canvas><canvas class="flot-overlay" width="249" height="98" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 249px; height: 98px;"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection