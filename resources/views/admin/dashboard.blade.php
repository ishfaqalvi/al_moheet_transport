@extends('admin.layout.app')

@section('title','Dashboard')
    
@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{ $data['widgets'][0] }}</h3>
                        <h5 class="text-muted m-b-0">Branches</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-info"><i class="icon-people"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{ $data['widgets'][1] }}</h3>
                        <h5 class="text-muted m-b-0">CLients</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-danger"><i class="icons-Open-Book"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{ $data['widgets'][2] }}</h3>
                        <h5 class="text-muted m-b-0">Statments</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round align-self-center round-success"><i class="ti-receipt"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0">{{ $data['widgets'][3] }}</h3>
                        <h5 class="text-muted m-b-0">Inovices</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Money Flow Chart</h5>
                <div>
                    <canvas id="moneyFlowChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Clients Payments</h5>
                <div>
                    <canvas id="clientsChart" height="150"> </canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Month wise Expense</h5>
                <div>
                    <canvas id="expenseChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .right-sidebar -->
<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme working">7</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        new Chart(document.getElementById("moneyFlowChart"),
        {
            "type":"pie",
            "data":{"labels":["Statments","Inovices","Expenses"],
            "datasets":[{
                "label":"My First Dataset",
                "data":@json(array_values($data['moneFlow'])),
                "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]}
            ]}
        });
        new Chart(document.getElementById("clientsChart"),
        {
            "type":"doughnut",
            "data":{"labels":["Statments","Inovices"],
            "datasets":[{
                "label":"My First Dataset",
                "data":@json(array_values($data['clientPayments'])),
                "backgroundColor":["rgb(54, 162, 235)","rgb(255, 205, 86)"]}
            ]}
        });
        new Chart(document.getElementById("expenseChart"),
        {
            "type":"line",
            "data":{"labels":['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            "datasets":[{
                "label":"Monthly",
                "data":@json(array_values($data['monthlyExpenses'])),
                "fill":false,
                "borderColor":"rgb(75, 192, 192)",
                "lineTension":0.1
            }]
        },"options":{}});  
    });
</script>
@endsection