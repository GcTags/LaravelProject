<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HighCharts</title>
</head>
<body>
    
<div id="chart-container"></div>
<!-- include 'C:\xampp\htdocs\LaravelProject\app\Http\Controllers\ChartController.php'; -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var datas = <?php echo json_encode($datas) ?>

    Highcharts.chart('chart-container',{
        title:{
            text:'New Users Increase, 2021'
        },
        subtitle:{
            text:'Source: Surfside Media'
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
                    }
                ]
            }
    })
</script>

</body>
</html>