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
      <div class="col-md-7">
        <div class="card pl-3 pr-2">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Planning")}}</h5>
          </div>
          <div class="card-body">
                
                <div class="row">
                  <div class="col-md-6 pr-3">
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
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" name="project_title" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" name="user_cc" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <input type="text" name="plant" class="form-control" placeholder="">
                      
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

      <div class="col-md-5">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" BOQ, Desain, PR, SPK")}}</h5>
          </div>
          <div class="card-body">
              <div class="row">
              </div>
              <table class="table table-borderless ml-2">
                <tr>
                  <td>
                    <a href="/boq" title="Bill Of Quantity" class="">+Bill Of Quantity</a>
                  </td>
                  <td>
                  <div class="col-md-8">
                    <input type="text" name="status" class="form-control text-center" placeholder="belum terisi" readonly>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="" title="Desain Gambar" class="">+Drawing</a>
                  </td>
                  <td>
                  <div class="col-md-8">
                    <input type="text" name="status" class="form-control text-center" placeholder="belum terisi" readonly>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/purchase" title="Purchase Requisition" class="">+Purchase Req</a>
                  </td>
                  <td>
                  <div class="col-md-8">
                    <input type="text" name="status" class="form-control text-center" placeholder="belum terisi" readonly>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/spk" title="Surat Perintah Kerja" class="">+SPK</a>
                  </td>
                  <td>
                  <div class="col-md-8">
                    <input type="text" name="status" class="form-control text-center" placeholder="belum terisi" readonly>
                  </div>
                  </td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
    
    </form>
  </div>
@endsection
