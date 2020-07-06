@extends('layouts.app', [
    'namePage' => 'Progres',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header"></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                    <figure class="highcharts-figure">
                        <div id="data_progres"></div>
                    </figure>
                    </div>                    
                </div>                        
        </div>   
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>    
        <script type="text/javascript">
            
            
           Highcharts.chart('data_progres', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Progress'
                },
                subtitle: {
                    text: 'JMU-204-02'
                },
                xAxis: {
                    categories: <?=json_encode($arrMinggu);?>,
                    tickmarkPlacement: 'on',
                    title: {
                        enabled: false
                    }
                },
                yAxis: {
                    max: 100,
                    title: {
                        text: 'Persentase'
                    },
                    labels: {
                        format: '{value}%'
                    }
                },
                tooltip: {
                    split: false,
                    valueSuffix: ' %'
                },
                plotOptions: {
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    }
                },
                series: [{
                    name: 'Progres',
                    data: [5,10,15,15,17,50,55,60,65,70,95,97,99,null]
                }]
            });
        </script>  
@endsection
