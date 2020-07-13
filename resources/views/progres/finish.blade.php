@extends('layouts.app', [
    'namePage' => 'Progres Histori Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'histori_proyek',
   
])
@section('content')        
      <div class="card ">
            <div class="card-header">
                <h5 class="title text-center mt-3">{{$proyek->project_no}}</h5>
                <p class="card-title text-center">{{$proyek->project_title}}</p> 
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        Project year : {{$proyek->project_year}} <br>
                        User/CC : {{$proyek->user_cc}} <br>
                        Plant : {{$proyek->plant}} <br>
                        Progress : {{$proyek->persentase}} <br>
                        
                     <figure class="highcharts-figure">
                        <div id="data_progres"></div>
                    </figure>
                    </div>                    
                </div>  
                <div class="card-footer">
                <div class="text-right">
                    <a href="/drawing/{{$proyek->id}}/file" class="btn btn-warning btn-round">Lihat Desain</a>
                    <a href="/progres/histori/{{ $proyek->id }}" class="btn btn-primary btn-round">Detail Histori</a>
                    <a href="/histori" class="btn btn-info mr-3 btn-round">Kembali</a>
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
                    mib:0,
                    title: {
                        text: 'Persentase'
                    },
                    labels: {
                        format: '{value}%',
                        visible: true,
                    }
                },
                tooltip: {
                    split: false,
                    valueSuffix: ' %'
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    },
                    area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                        }
                    },
                },
                series: [{
                    name: 'Progres',
                    data: [1,1,2,4,7,15,40,55,65,80,85,90,95,99]
                }]
            });
        </script>  
@endsection
