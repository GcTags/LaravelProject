@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="display:table;"> 
                        <div class="column" style=" float:left;padding: 10px 0px">
                            <div class="card" style="top:-10px;width:550px;">
                                <div id="chart-container"></div>
                            </div>
                        </div> 
                                <!-- include 'C:\xampp\htdocs\LaravelProject\app\Http\Controllers\ChartController.php'; -->
                                <script src="https://code.highcharts.com/highcharts.js"></script>
                                <script type="text/javascript">
                                $(document).ready(function(){

                                    var datas = <?php echo json_encode($new_user)?>;   
                                    console.log(datas)
                                    Highcharts.chart('chart-container',{
                                        title:{
                                            text:'ElectrOrder'
                                        },
                                        subtitle:{
                                            text:'New Users Chart'
                                        },
                                        xAxis:{
                                            categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
                                        },
                                        yAxis:{
                                            title:{
                                                text: 'Number of New Users'
                                            }
                                        },
                                        legend:{
                                            layout:'vertical',
                                            align:'right',
                                            verticalAlign:'middle'
                                        },
                                        plotOptions:{
                                            series:{
                                                allowPointSelect:true
                                            }
                                        },
                                        series:[{
                                            name:'New User',
                                            data:datas
                                        }],
                                        responsive:{
                                            rules:[
                                                {
                                                    condition:{
                                                        maxWidth:500
                                                    },
                                                    chartOptions:{
                                                        legend:{
                                                            layout:'horizontal',
                                                            align:'center',
                                                            verticalAlign:'bottom'
                                                    }
                                                }
                                            }]
                                        }
                                    });
                                });
                                </script>
                         
                    
                        <div class="column" style="float:right;padding: 0 10px;">          
                            <div class="card">
                                <canvas id="myChart" style="height:400px;width:520px;"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script type="text/javascript">
                                    $(document).ready(function(){

                                    var ord_user = <?php echo json_encode(count($ord_user)) ?>;
                                    var pro_user = <?php echo json_encode(count($pro_user)) ?>;
                                    var act_user = <?php echo json_encode(count($act_user)) ?>;
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Ordered Products', 'User Products', 'Active Users'],
                                            datasets: [{
                                                label: 'User Activity Chart',
                                                data: [ord_user,pro_user,act_user],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                });
                                    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection