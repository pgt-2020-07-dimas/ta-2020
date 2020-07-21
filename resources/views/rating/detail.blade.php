@extends('layouts.app', [
    'namePage' => 'Detail Kontraktor',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'rating',
   
])

@section('content')        
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@php
$c = count($detailRating);
@endphp
<div class="content">
    <div class="row">                 
        <div class="col-md-12">
            <div class="card pl-3">
                <div class="card-header">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td>Nama Kontraktor</td>
                                <td>:</td>
                                <td>{{ $contractor->name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $contractor->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td>:</td>
                                <td>{{ $contractor->rating }}/4</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-title">
                        Riwayat pekerjaan
                    </h6>
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr class="thead-dark">
                                <td>No.</td>
                                <td>No. Proyek</td>
                                <td>Judul</td>
                                <td>No. SPK</td>
                                <td>Rating</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $j=1;?>
                            @for($i=0;$i<$c;$i++)
                            <tr>
                                <td>{{$j}}</td>
                                <td>{{$detailRating[$i]->project_no}}</td>
                                <td>{{$detailRating[$i]->project_title}}</td>
                                <td>{{$detailRating[$i]->spk_no}}</td>
                                <td>{{$detailRating[$i]->rating}}</td>
                                <?php $j++;?>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                    <br>
                        <a href="/rating" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>          
        </div>
  </div>
</div>
@endsection
