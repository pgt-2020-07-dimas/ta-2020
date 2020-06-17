@extends('layouts.app', [
    'namePage' => 'Detail Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header">Daftar Proyek</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="containter">
                    <div class="row">
                        <br>
                    </div>
                        <div class="row">
                        @foreach ($proyek as $p)
                            <div class="col-sm-3">
                                <div class="card">                            
                                    <div class="card-body">
                                        <img src="https://imgs.developpaper.com/imgs/596704542-5d006e7389c90_articlex.gif" class="card-img-top" alt="...">
                                        <h5 class="card-title text-center">{{ Auth::user()->departemen }}-{{substr($p->project_year,-2)}}{{ Auth::user()->kode }}-{{$p->project_no}}</h5>
                                        <p class="card-text font-weight-bold">{{$p->project_title}}</p>  
                                        <div style="height:8em">                                      
                                            <p class="card-text">{{ $p->deskripsi }}</p>
                                        </div>
                                        <p class="card-text font-italic"><small>Status : {{ $p->status }} | {{ $p->plant }}</small></p>
                                        <div class="text-right">
                                            <a href="/proyek/{{$p->id}}" class="btn btn-sm btn-primary ">Detail</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>                    
                </div>            
            <div class="card-body ">
            <div id="map" class="map"></div>
            </div>
        </div>         
@endsection
