@extends('layouts.app', [
    'namePage' => 'Surat Perintah Kerja',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        

  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Isi Surat Perintah Kerja")}}</h5>
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
                        <input class="form-control @error('spk_no') is-invalid @enderror" name="spk_no" placeholder="" type="text" value="{{$spk->spk_no}}">
                        @error('spk_no') <div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>{{__(" Contractor Id")}}</label>
                        <!-- <input class="form-control " placeholder="" type="number" name="contractor_id" value="{{$spk->contractor_id}}"> -->
                        <select class="form-control @error('contractor') is-invalid @enderror" name="contractor" id="">
                          <option value="">A</option>
                        </select>   
                        @error('contractor') <div class="invalid-feedback">{{ $message }}</div>@enderror               
                      </div>
                    </div>
                    <div class="col-md-2 text-right mt-3">
                      <a href="#" class="btn btn-round btn-primary align-bottom tambah" data-toggle="modal" data-target="#modal-tambah">Tambah</a>
                      
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group ">
                      <label>{{__(" Start Execution Date")}}</label>
                      <input class="form-control @error('start_execution_date') is-invalid @enderror"  type="date" name="start_execution_date" value="{{$spk->start_execution_date}}">
                      @error('start_execution_date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group ">
                      <label>{{__(" Estimate Finish Date")}}</label>
                      <input class="form-control @error('estimate_finish_date') is-invalid @enderror" type="date" name="estimate_finish_date" value="{{$spk->start_execution_date}}">
                      @error('estimate_finish_date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-2 my-3 pb-2">
                @if($spk->path<>null)
                <div class="col-md-5 mb-3 text-center">
                  <img id="thumbnail" class="img-thumbnail" src="{{asset($path)}}" alt="{{$purchaseRequisition->path}}">
                  <label for="thumbnail"></label>
                </div>
                @endif
                <div class="col-md-5">
                  <div class="col-md-12 pb-3 pr-3 ">

                      <!-- <label for="inputFile">Pilih file PR</label> -->
                      <input onclick="uploadFunction()"  type="radio" id="up" name="select">
                      <label for="up">Upload file</label>
                      <input class="pt-2" id="upload" type="file" name="pr" id="inputFile" disabled>
                      
                  </div>
                  
                  <div class="col-md-12 pr-3 pb-3">
                      <!-- <label for="inputFile">Pilih file PR</label> -->
                      <input onclick="captureFunction()"  type="radio" id="cap" name="select">
                      <label for="cap">Ambil gambar</label>
                      <input class="pt-2" id="capture" type="file" name="pr" accept="image/*" capture="environment" disabled>
                      
                  </div>
                  </div>
                </div>
              <div class="card-footer mt-4">
              <div class="row">
                <div class="col-md-10 text-right">
                    <button type="submit" title="Simpan" class="btn btn-success btn-round">{{__('Simpan')}}</button>
                    <a href="/proyek/{{$proyek->id}}/edit" title="Kembali" class="btn btn-warning btn-round">{{__('Kembali')}}</a>
                </div>   
              </div>                             
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
                      <input type="text" value="{{$proyek->project_no}}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" Tahun Proyek")}}</label>
                      <input type="text" value="{{$proyek->project_year}}" class="form-control" readonly>
                    </div>
                  </div>
                </div>            

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" value="{{$proyek->project_title}}" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control" rows="3" readonly>{{$proyek->deskripsi}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" value="{{$proyek->user_cc}}" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <input type="text" value="{{$proyek->plant}}" class="form-control" readonly>
                      
                    </div>
                  </div>
                </div>
          </div>   
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Contractor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="#" method="post">
              @csrf
              
                <div class="modal-body">  
                <!-- <input type="hidden" id="id" name="id">
                <input type="hidden" value="" name="boq_id"> -->
                  <div class="form-group">
                      <label  >{{__(" Nama")}}</label>
                      <input type="text" id="name" name="name" class="text-capitalize form-control badge-pill @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                      @error('name') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  
                  <div class="form-group">
                      <label>{{__(" Alamat")}}</label>
                      <textarea id="alamat" class="form-control badge-pill @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="" required>{{ old('alamat') }}</textarea>
                      @error('alamat') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>                      
                </div>   
              <div class="modal-footer">
                <button type="submit" name="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Tambah')}}</button>
                <button type="button" class="btn btn-round btn-warning" data-dismiss="modal">Tutup</button>
             
              </div>
              </form>
            </div>
          </div>
      </div>
</div>
  
@endsection
<script>
function uploadFunction() {
  document.getElementById("capture").disabled = true;
  document.getElementById("upload").disabled = false;
  $('#capture').val('');
}
function captureFunction() {
  document.getElementById("upload").disabled = true;
  document.getElementById("capture").disabled = false;
  $('#upload').val('');
}
</script>
