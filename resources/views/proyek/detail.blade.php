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
<div class="content">
  <div class="row">                 
    <div class="col-md-12">
        <div class="card pl-3">
          <div class="card-header">
          <h4 class="title text-center mt-3">{{ Auth::user()->departemen }}-{{substr($proyek->project_year,-2)}}{{ Auth::user()->kode }}-{{$proyek->project_no}}</h4>
            <p class="card-title text-center">{{$proyek->project_title}}</p> 
          </div>
          <div class="card-body">
          <div class="row">
          <div class="col-md-4">
          <div class="card-body mt-1">
              <table class="table table-borderless">
              <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" No Proyek")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->project_no }}</h6></td>
            </tr>
            <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" Tahun Proyek")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->project_year }}</h6></td>
            </tr>
            <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" User/CC")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->user_cc}}</h6></td>
            </tr>
            <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" Plant")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->plant }}</h6></td>
            </tr>
            <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" Status")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->status }}</h6></td>
            </tr>
            <tr>
                <td><h6 class="card-subtitle text-muted mb-2">{{__(" Progress")}}</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">&nbsp;{{__(":")}}&nbsp;</h6></td>
                <td><h6 class="card-subtitle text-muted mb-2">{{ $proyek->persentase }}&nbsp;%</h6></td>
            </tr>
        </table>
          </div>
          </div>

        <div class="col-md-4">
        <div class="card-body mt-1">
                <div class="row">
                  <div class="ml-3">
                    <a class="card-subtitle text-muted" title="Bill Of Quantity">BILL OF QUANTITY</a>
                  </div>
                  <div class="ml-2">
                   <a href="" class="" title="Bill Of Quantity">>Lihat Detail</a>                  
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="ml-3 pr-5">
                  <a class="card-subtitle text-muted" title="Desain Gambar">{{__(" DRAWING")}}&nbsp;</a>
                  </div>
                  <div class="ml-3">
                  <a href="" class="" title="Desain Gambar">>Lihat Detail</a>                  
                  </div>
                </div>
                
                <div class="row mt-4">
                  <div class="ml-3 pr-1">
                  <a class="card-subtitle text-muted" title="Desain Gambar">{{__(" PR NO.")}}&nbsp;</a>
                  </div>
                  <div class="ml-3">
                  <a class="card-subtitle text-muted" title="Desain Gambar">:&nbsp;{{__(" belum diisi")}}</a>                
                  </div>
                </div>
               
                <div class="row mt-3">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label  >{{__(" AANWIJZING DATE")}}</label>
                      <input type="date" name="aanwijzing_date" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label  >{{__(" BID SUBMISSION DATE")}}</label>
                      <input type="date" name="bid_submission_date" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
        </div>
        </div>

        <div class="col-md-4">
        <div class="card-body mt-1">
                
                <div class="row">
                  <div class="ml-3 ">
                  <a class="card-subtitle text-muted" title="Desain Gambar">{{__(" SPK/PO NO.")}}</a>
                  </div>
                  <div class="ml-4">
                  <a class="card-subtitle text-muted" title="Desain Gambar">:&nbsp;{{__(" belum diisi")}}</a>                
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="ml-3 ">
                  <a class="card-subtitle text-muted" title="Desain Gambar">{{__(" CONTRACTOR")}}&nbsp;</a>
                  </div>
                  <div class="ml-1">
                  <a class="card-subtitle text-muted" title="Desain Gambar">:&nbsp;{{__(" belum diisi")}}</a>                
                  </div>
                </div>
               
                <div class="row mt-3">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label  >{{__(" START EXECUTION DATE")}}</label>
                      <input type="date" name="start_execution_date" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label  >{{__(" ESTIMATE FINISH DATE")}}</label>
                      <input type="date" name="estimate_finish_date" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label  >{{__(" Actual Finish Date")}}</label>
                      <input type="date" name="actual_finish_date" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
        </div>
        </div>
        </div>
        <div class="text-right pr-5">
        <a href="{{ $proyek->id }}/edit" class="btn btn-warning btn-round">Edit</a>
         <a href="#" class="btn btn-primary btn-round">Update Progress</a>
         <a href="/proyek" class="btn btn-info mr-3 btn-round">Kembali</a>
         </div>
         </div>
         </div>
      </div>
    

  </div>
</div>
@endsection
