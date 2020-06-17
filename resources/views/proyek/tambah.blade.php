@extends('layouts.app', [
    'namePage' => 'Tambah Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'tambah_proyek',
   
])

@section('content')
  
  <div class="content">
  <form method="post" action="/proyek" autocomplete="off" enctype="multipart/form-data">  
      @csrf     
      @include('alerts.success')
    <div class="row"></div>
    <div class="row">
      <div class="col-md-4">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Planning")}}</h5>
          </div>
          <div class="card-body">
                
                <div class="row">
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" No Proyek")}}</label>
                      <input type="text" name="project_no" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" Tahun Proyek")}}</label>
                      <input type="text" name="project_year" class="form-control" >
                    </div>
                  </div>
                </div>            

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" name="project_title" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" name="user_cc" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <input type="text" name="plant" class="form-control" >
                      
                    </div>
                  </div>
                </div>
          </div>   
        </div>
      </div>

      <div class="col-md-4">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" BOQ, PR, Desain")}}</h5>
          </div>
          <div class="card-body">
              <div class="row">
              </div>
                <div class="row">
                  <div class="ml-3">
                    <a href="/boq" class="">+Bill Of Quantity</a>
                  </div>
                  <div class="col-md-5 pr-3">
                    <input type="text" name="status" class="form-control" placeholder="belum terisi" readonly>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="ml-3 pr-5">
                    <a href="" class="">+Drawing</a>
                  </div>
                  <div class="col-md-5 pr-3">
                    <input type="text" name="status" class="form-control" placeholder="belum terisi" readonly>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" PR No.")}}</label>
                      <input type="text" name="pr_no" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Aanwijzing Date")}}</label>
                      <input type="date" name="aanwijzing_date" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Bid Submission Date")}}</label>
                      <input type="date" name="bid_submission_date" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <hr>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Surat Perintah Kerja")}}</h5>
          </div>
          <div class="card-body">
              
                  <div class="row">
                    <div class="col-md-10 pr-3">
                      <div class="form-group ">
                        <label>{{__(" No. SPK")}}</label>
                        <input class="form-control " name="spk_no" placeholder="" type="text" >
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-3">
                      <div class="form-group ">
                        <label>{{__(" Contractor Id")}}</label>
                        <input class="form-control " placeholder="" type="number" name="contractor_id">
                        
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group ">
                      <label>{{__(" Start Execution Date")}}</label>
                      <input class="form-control" placeholder="{{ __('') }}" type="date" name="start_execution_date">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group ">
                      <label>{{__(" Estimate Finish Date")}}</label>
                      <input class="form-control" placeholder="{{ __('Estimate Finish Date') }}" type="date" name="estimate_finish_date">
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
              <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
              <input type="hidden" value="{{Auth::user()->kode}}" name="kode">
                 <button type="submit" name="submit" class="btn btn-primary btn-round">{{__('Simpan')}}</button>
              </div>
          </div>
        </div>
      </div> 
    </div>
    
    </form>
  </div>
@endsection
