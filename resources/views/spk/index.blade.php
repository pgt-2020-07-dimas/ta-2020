@extends('layouts.app', [
    'namePage' => 'Bill Of Quantity',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        

  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Isi Purchase Requisition")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              <div class="row">
              </div>           

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
                <div class="row mt-2">
                  <div class="ml-5">
                    <a href="" title="Surat Perintah Kerja" class="">+Upload SPK File</a>
                  </div>
                  <div class="col-md-3 pr-5">
                    <input type="text" name="status" class="form-control text-center" placeholder="belum terisi" readonly>
                  </div>
                </div>
              <div class="card-footer mt-4">
                <button type="submit" title="Simpan" class="btn btn-success btn-round">{{__('Simpan')}}</button>
                <a href="/proyek/tambah" title="Kembali" class="btn btn-warning btn-round">{{__('kembali')}}</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Detail Proyek")}}</h5>
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
    </div>
</div>
  
@endsection
