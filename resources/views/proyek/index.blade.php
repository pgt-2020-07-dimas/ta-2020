@extends('layouts.app', [
    'namePage' => 'Detail Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="containter">
    <div class="row">
        @foreach ($proyek as $p)
            <div class="col-sm-3">
                <div class="card">                            
                    <div class="card-body mt-2">
                    <div class="progress mx-auto" data-value='{{ $p->persentase }}'>
                    <span class="progress-left">
                                    <span class="progress-bar border-warning"></span>
                    </span>
                    <span class="progress-right">
                                    <span class="progress-bar border-warning"></span>
                    </span>
                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                        <div class="h2 font-weight-bold">{{ $p->persentase }}<sup class="small">%</sup></div>
                    </div>
                    </div>
                        <h5 class="card-title text-center mt-3">{{ Auth::user()->departemen }}-{{substr($p->project_year,-2)}}{{ Auth::user()->kode }}-{{$p->project_no}}</h5>
                        <p class="card-text text-center font-weight-bold">{{$p->project_title}}</p>  
                        <div class="card-body" style="height:6em">                                      
                            <p class="card-text">{{ $p->deskripsi }}</p>
                        </div>
                        <p class="card-body font-italic"><small>Status : {{ $p->status }} | {{ $p->plant }}</small></p>
                        <div class="text-right">
                            <a href="/proyek/{{$p->id}}" class="btn badge-pill btn-outline-danger">Detail</a>
                        </div>
                        
                    </div>
                </div>
            </div>

        @endforeach
    </div>
                        
@endsection
