@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 970.281px;">

    <section class="content-header">
        <h1>
            Tổng quan về trang web
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
    </section>

    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ count($order) }}</h3>
                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $view }}</h3>
                        <p>Số lượt truy cập</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ number_format($dt, 0, '', ',')}} đ</h3>
                        <p>Doanh thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ceil(((count($order)/$view)*100))}}<sup style="font-size: 20px">%</sup></h3>
                        <p>Tỉ lệ chuyển đổi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

        </div>


        <div class="row">

            <section class="col-lg-7 connectedSortable ui-sortable">

                <div class="nav-tabs-custom" style="cursor: move;">

                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                    </ul>
                    <div class="tab-content no-padding">

                        <div class="chart tab-pane active" id="revenue-chart"
                            style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg height="300" version="1.1" width="838" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative; top: -0.609375px;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0
                                </desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text
                                    x="49.529296875" y="261" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M62.029296875,261H813" stroke-width="0.5"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.529296875"
                                    y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none"
                                    fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M62.029296875,202H813" stroke-width="0.5"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.529296875"
                                    y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none"
                                    fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M62.029296875,143H813" stroke-width="0.5"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.529296875"
                                    y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4.000000000000028"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M62.029296875,84.00000000000003H813"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="49.529296875" y="25.00000000000003" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal">
                                    <tspan dy="4.000000000000028"
                                        style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan>
                                </text>
                                <path fill="none" stroke="#aaaaaa" d="M62.029296875,25.00000000000003H813"
                                    stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="675.2155818081714" y="273.5" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text><text x="341.2480516213548" y="273.5" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text>
                                <path fill="#74a5c2" stroke="none"
                                    d="M62.029296875,219.05493333333334C83.01632746051033,219.56626666666668,124.99038863153098,222.62345,145.9774192170413,221.10026666666667C166.96444980255163,219.57708333333335,208.9385109735723,209.13558251366123,229.92554155908263,206.86946666666668C250.68445224692437,204.6279825136612,292.20227362260783,204.88215,312.96118431044954,203.06986666666666C333.7200949982913,201.25758333333332,375.23791637397477,194.9129178506375,395.99682706181653,192.3712C416.9838576473269,189.80155118397084,458.9579188183475,182.51721666666668,479.94494940385783,182.6244C500.93197998936813,182.73158333333333,542.9060411603888,204.1805712204007,563.8930717458991,193.22866666666667C584.6519824337408,182.39580455373405,626.1698038094244,101.94395359116025,646.9287144972661,95.48533333333336C667.4595052874392,89.09768692449359,708.5210868677856,135.13802307692308,729.0518776579587,141.8436C750.038908243469,148.69818974358975,792.0129694144897,147.7554,813,149.726L813,261L62.029296875,261Z"
                                    fill-opacity="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="none" stroke="#3c8dbc"
                                    d="M62.029296875,219.05493333333334C83.01632746051033,219.56626666666668,124.99038863153098,222.62345,145.9774192170413,221.10026666666667C166.96444980255163,219.57708333333335,208.9385109735723,209.13558251366123,229.92554155908263,206.86946666666668C250.68445224692437,204.6279825136612,292.20227362260783,204.88215,312.96118431044954,203.06986666666666C333.7200949982913,201.25758333333332,375.23791637397477,194.9129178506375,395.99682706181653,192.3712C416.9838576473269,189.80155118397084,458.9579188183475,182.51721666666668,479.94494940385783,182.6244C500.93197998936813,182.73158333333333,542.9060411603888,204.1805712204007,563.8930717458991,193.22866666666667C584.6519824337408,182.39580455373405,626.1698038094244,101.94395359116025,646.9287144972661,95.48533333333336C667.4595052874392,89.09768692449359,708.5210868677856,135.13802307692308,729.0518776579587,141.8436C750.038908243469,148.69818974358975,792.0129694144897,147.7554,813,149.726"
                                    stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="62.029296875" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="145.9774192170413" cy="221.10026666666667" r="4" fill="#3c8dbc"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="229.92554155908263" cy="206.86946666666668" r="4" fill="#3c8dbc"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="312.96118431044954" cy="203.06986666666666" r="4" fill="#3c8dbc"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="395.99682706181653" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="479.94494940385783" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="563.8930717458991" cy="193.22866666666667" r="4" fill="#3c8dbc"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="646.9287144972661" cy="95.48533333333336" r="4" fill="#3c8dbc"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="729.0518776579587" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="813" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <path fill="#eaf3f6" stroke="none"
                                    d="M62.029296875,240.02746666666667C83.01632746051033,239.8072,124.99038863153098,241.35496666666666,145.9774192170413,239.1464C166.96444980255163,236.93783333333334,208.9385109735723,223.33676429872497,229.92554155908263,222.35893333333334C250.68445224692437,221.39173096539162,292.20227362260783,233.23263333333333,312.96118431044954,231.36626666666666C333.7200949982913,229.4999,375.23791637397477,209.2890577413479,395.99682706181653,207.428C416.9838576473269,205.54649107468123,458.9579188183475,214.43916666666667,479.94494940385783,216.39600000000002C500.93197998936813,218.35283333333334,542.9060411603888,232.37947613843352,563.8930717458991,223.08266666666668C584.6519824337408,213.88690947176684,626.1698038094244,148.22682412523022,646.9287144972661,142.42573333333334C667.4595052874392,136.6883907918969,708.5210868677856,170.47037838827842,729.0518776579587,176.92893333333336C750.038908243469,183.53101172161175,792.0129694144897,190.23343333333335,813,194.66826666666668L813,261L62.029296875,261Z"
                                    fill-opacity="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="none" stroke="#a0d0e0"
                                    d="M62.029296875,240.02746666666667C83.01632746051033,239.8072,124.99038863153098,241.35496666666666,145.9774192170413,239.1464C166.96444980255163,236.93783333333334,208.9385109735723,223.33676429872497,229.92554155908263,222.35893333333334C250.68445224692437,221.39173096539162,292.20227362260783,233.23263333333333,312.96118431044954,231.36626666666666C333.7200949982913,229.4999,375.23791637397477,209.2890577413479,395.99682706181653,207.428C416.9838576473269,205.54649107468123,458.9579188183475,214.43916666666667,479.94494940385783,216.39600000000002C500.93197998936813,218.35283333333334,542.9060411603888,232.37947613843352,563.8930717458991,223.08266666666668C584.6519824337408,213.88690947176684,626.1698038094244,148.22682412523022,646.9287144972661,142.42573333333334C667.4595052874392,136.6883907918969,708.5210868677856,170.47037838827842,729.0518776579587,176.92893333333336C750.038908243469,183.53101172161175,792.0129694144897,190.23343333333335,813,194.66826666666668"
                                    stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="62.029296875" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="145.9774192170413" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="229.92554155908263" cy="222.35893333333334" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="312.96118431044954" cy="231.36626666666666" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="395.99682706181653" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="479.94494940385783" cy="216.39600000000002" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="563.8930717458991" cy="223.08266666666668" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="646.9287144972661" cy="142.42573333333334" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="729.0518776579587" cy="176.92893333333336" r="4" fill="#a0d0e0"
                                    stroke="#ffffff" stroke-width="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="813" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff"
                                    stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                            <div class="morris-hover morris-default-style"
                                style="left: 600.569px; top: 56px; display: none;">
                                <div class="morris-hover-row-label">2012 Q4</div>
                                <div class="morris-hover-point" style="color: #a0d0e0">
                                    Item 1:
                                    15,073
                                </div>
                                <div class="morris-hover-point" style="color: #3c8dbc">
                                    Item 2:
                                    5,967
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><svg
                                height="300" version="1.1" width="868" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.3.0
                                </desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <path fill="none" stroke="#3c8dbc"
                                    d="M434,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,522.227755194977,180.44625304313007"
                                    stroke-width="2" opacity="0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                <path fill="#3c8dbc" stroke="#ffffff"
                                    d="M434,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,525.0636473262442,181.4248826052307L561.6151459070204,194.03833029452744A135,135,0,0,1,434,285Z"
                                    stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <path fill="none" stroke="#f56954"
                                    d="M522.227755194977,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,350.28484627831415,108.73398312817662"
                                    stroke-width="2" opacity="1"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
                                <path fill="#f56954" stroke="#ffffff"
                                    d="M525.0636473262442,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,347.59400205154566,107.40757544301087L308.42726941747117,88.10097469226493A140,140,0,0,1,566.3416327924656,195.6693795646951Z"
                                    stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <path fill="none" stroke="#00a65a"
                                    d="M350.28484627831415,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,433.97067846904883,243.333328727518"
                                    stroke-width="2" opacity="0"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                <path fill="#00a65a" stroke="#ffffff"
                                    d="M347.59400205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,433.96973599126824,246.3333285794739L433.9575884998742,284.9999933380171A135,135,0,0,1,312.9120097954186,90.31165416754118Z"
                                    stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text
                                    x="434" y="140" text-anchor="middle" font-family="&quot;Arial&quot;"
                                    font-size="15px" stroke="none" fill="#000000"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;"
                                    font-weight="800" transform="matrix(1,0,0,1,0,0)">
                                    <tspan dy="140" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store
                                        Sales</tspan>
                                </text><text x="434" y="160" text-anchor="middle" font-family="&quot;Arial&quot;"
                                    font-size="14px" stroke="none" fill="#000000"
                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;"
                                    transform="matrix(1,0,0,1,0,0)">
                                    <tspan dy="160" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan>
                                </text>
                            </svg></div>
                    </div>
                </div>









            </section>


            <section class="col-lg-5 connectedSortable ui-sortable">









            </section>

        </div>

    </section>

</div>




@stop