@extends('layouts.app', [
    'namePage' => 'Progres',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
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
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td>Project year</td>
                                            <td>:</td>
                                            <td>{{$proyek->project_year}}</td>
                                        </tr>
                                        <tr>
                                            <td>User/CC</td>
                                            <td>:</td>
                                            <td>{{$proyek->user_cc}}</td>
                                        </tr>
                                        <tr>
                                            <td>Plant</td>
                                            <td>:</td>
                                            <td>{{$proyek->plant}}</td>
                                        </tr>
                                        <tr>
                                            <td>Planned Budged</td>
                                            <td>:</td>
                                            <td>@if ($boq<>null)Rp. {{$boq->planned_budged}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="3">@if ($boq<>null)<a href="/boq/{{$boq->id}}/edit" class="badge badge-success btn-round">Lihat BOQ</a>@endif
                                            @if ($drawing<>null)<a href="/drawing/{{$proyek->id}}/file" class="badge badge-danger btn-round">Lihat Drawing</a>@endif</td>                                            
                                        </tr>
                                        
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td>PR No</td>
                                            <td>:</td>
                                            <td>@if ($pr<>null){{$pr->pr_no}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Aanwijzing date</td>
                                            <td>:</td>
                                            <td>@if ($pr<>null){{$pr->aanwijzing_date}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Bid submission date</td>
                                            <td>:</td>
                                            <td>@if ($pr<>null){{$pr->bid_submission_date}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Actual Budged</td>
                                            <td>:</td>
                                            <td>
                                            @if ($boq<>null)
                                                @if($boq->actual_budged <> null)
                                                    Rp. {{$boq->actual_budged}}
                                                @else 
                                                    <form action="/proyek/actual/{{$boq->id}}" method="post" class="form-inline">
                                                        @csrf
                                                        <input type="number" placeholder="Masukan budged" name="actual_budged" class="form-control" maxlenght="1" size="1">
                                                        <button class="badge btn-success"><i class="fas fa-plus-square"></i></button>
                                                    </form>
                                                @endif
                                            @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td>SPK No.</td>
                                            <td>:</td>
                                            <td>@if ($spk<>null){{$spk->spk_no}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Start date</td>
                                            <td>:</td>
                                            <td>@if ($spk<>null){{$spk->start_execution_date}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Finish date</td>
                                            <td>:</td>
                                            <td>@if ($spk<>null){{$spk->estimate_finish_date}}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Progress</td>
                                            <td>:</td>
                                            <td>@if ($spk<>null){{$proyek->persentase}}%@endif</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>                     
                     <figure class="highcharts-figure">
                        <div id="data_progres"></div>
                    </figure>
                    </div>                    
                </div>  
                <div class="card-footer">
                <div class="text-right">
                    <a href="{{ $proyek->id }}/edit" class="btn btn-warning btn-round">Edit</a>
                    <a href="/progres/proyek/{{ $proyek->id }}" class="btn btn-primary btn-round">Update</a>
                    <a href="/proyek" class="btn btn-info mr-3 btn-round">Kembali</a>
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
                    text: ''
                },
                subtitle: {
                    text: 'Kurva S'
                },
                xAxis: {
                    categories: <?=json_encode($tanggal);?>,
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
                    data: <?=$total;?>
                }]
            });
        </script>  
@endsection
