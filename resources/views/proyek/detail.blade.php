@extends('layouts.app', [
    'namePage' => 'Detail Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header">Detail proyek</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="containter">
                        Project No. = {{ $proyek->project_no }}
                        <br>
                        Project Year = {{ $proyek->project_year }}
                        <br>
                        User/cc = {{ $proyek->user_cc}}
                        <br>
                        Plant = {{ $proyek->plant }}
                        <br>
                        Status = {{ $proyek->status }}
                        <br>
                        Progress = {{ $proyek->persentase }}
                        <br>
                        <a href="{{ $proyek->id }}/edit" class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-primary">Update Progress</a>
                    </div>                    
                </div>            
            <div class="card-body ">
            <div id="map" class="map"></div>
            </div>
        </div>         
@endsection
