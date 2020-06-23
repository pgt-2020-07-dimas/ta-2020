@extends('layouts.app', [
    'namePage' => 'Purchase Requisition',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')  
      
@php
$path = str_replace('public','storage',$purchaseRequisition->path);
$imgName = str_replace('storage/pr/','',$path);
@endphp

  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Isi Purchase Requisition")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="/pr/{{$purchaseRequisition->id}}" autocomplete="off" enctype="multipart/form-data" required>
              @method('patch')
              @csrf
              @include('alerts.success')
              <div class="row">
              </div>           

              <div class="row ">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" PR No.")}}</label>
                      <input  type="number" name="pr_no" class="form-control @error('pr_no') is-invalid @enderror" value="{{ $purchaseRequisition->pr_no}}" required>
                      @error('pr_no') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                    <label  >{{__(" Aanwijzing Date")}}</label>
                      <input type="date" name="aanwijzing_date" class="form-control @error('aanwijzing_date') is-invalid @enderror" value="{{$purchaseRequisition->aanwijzing_date }}" required>
                      @error('aanwijzing_date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                    <label  >{{__(" Bid Submission Date")}}</label>
                      <input type="date" name="bid_submission_date" class="form-control @error('bid_submission_date') is-invalid @enderror" value="{{ $purchaseRequisition->bid_submission_date }}" >
                      @error('bid_submission_date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row mt-2 my-3 pb-2">
                @if($purchaseRequisition->path<>null)
                <div class="col-md-5 mb-3 text-center">
                  <img id="thumbnail" class="img-thumbnail" src="{{asset($path)}}" alt="{{$purchaseRequisition->path}}">
                  <label for="thumbnail">{{$imgName}}</label>
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
                <div class="col-md-12 text-right ">
                  <button type="submit" title="Simpan" class="btn btn-success btn-round">{{__('Simpan')}}</button>
                  <a href="/proyek/{{$proyek->id}}/edit" title="Kembali" class="btn btn-warning btn-round">{{__('Kembali')}}</a>
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