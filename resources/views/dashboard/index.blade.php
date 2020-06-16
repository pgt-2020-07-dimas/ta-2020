@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="containter">
                    You are logged in (<span> {{ Auth::user()->departemen }} </span>)
                    </div>                    
                </div>            
            <div class="card-body ">
            <div id="map" class="map"></div>
            </div>
        </div>         
@endsection
