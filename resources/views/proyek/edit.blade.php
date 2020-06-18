@extends('layouts.app', [
    'namePage' => 'Update Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')
  
  <div class="content">
  <form method="post" action="/proyek/{{$proyek->id}}" autocomplete="off" enctype="multipart/form-data">  
      @method('patch')
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
                      <input type="text"class="form-control badge-pill @error('project_no') is-invalid @enderror" value="{{ $proyek->project_no }}" readonly>
                      @error('project_no') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" Tahun Proyek")}}</label>
                      <input type="text" name="project_year" class="form-control badge-pill @error('project_year') is-invalid @enderror" value="{{ $proyek->project_year }}">
                      @error('project_year') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>            

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" name="project_title" class="form-control badge-pill @error('project_title') is-invalid @enderror" value="{{ $proyek->project_title }}">
                      @error('project_title') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control @error('deskripsi') badge-pill is-invalid @enderror" name="deskripsi" rows="3" >{{ $proyek->deskripsi }}</textarea>
                      @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" name="user_cc" class="form-control badge-pill @error('user_cc') is-invalid @enderror" value="{{ $proyek->user_cc }}" >
                      @error('user_cc') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <select name="plant" class="form-control badge-pill @error('plant') is-invalid @enderror">
                        <option value="">- Pilih Plant -</option>                        
                        <option value="All Plant"<?=$proyek->plant == 'All Plant' ? 'selected' : ''?>>All Plant</option>                        
                        <option value="Plant A" <?=$proyek->plant == 'Plant A' ? 'selected' : ''?>>Plant A</option>                        
                        <option value="Plant BHI" <?=$proyek->plant == 'Plant BHI' ? 'selected' : ''?>>Plant BHI</option>                        
                        <option value="Plant C" <?=$proyek->plant == 'Plant C' ? 'selected' : ''?>>Plant C</option>                        
                        <option value="Plant DK" <?=$proyek->plant == 'Plant DK' ? 'selected' : ''?>>Plant DK</option>                        
                        <option value="Plant M" <?=$proyek->plant == 'Plant M' ? 'selected' : ''?>>Plant M</option>                        
                        <option value="Plant E" <?=$proyek->plant == 'Plant E' ? 'selected' : ''?>>Plant E</option>                        
                        <option value="Plant R" <?=$proyek->plant == 'Plant R' ? 'selected' : ''?>>Plant R</option>                        
                        <option value="Plant J" <?=$proyek->plant == 'Plant J' ? 'selected' : ''?>>Plant J</option>                        
                        <option value="Other" <?=$proyek->plant == 'Other' ? 'selected' : ''?>>Other</option>                        
                      </select>
                      @error('plant') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
              <div class="text-right pr-4">
                 <button type="submit" name="submit" class="btn badge-pill btn-primary btn-round">{{__('Simpan')}}</button></form>
                 <form action="/proyek" class="d-inline" method="post">
                 @method('patch')
                 @csrf 
                    <input type="hidden" name="status" value="Suspend">
                    <input type="hidden" name="id" value="{{$proyek->id}}">
                    <button type="submit" name="submit" class="btn badge-pill btn-warning btn-round">{{__('Tunda')}}</button>
                 </form>
                 <form action="/proyek/{{ $proyek->id }}" method="post" class="d-inline">    
                 @method('delete')
                 @csrf            
                    <button type="submit" name="submit" class="btn badge-pill btn-danger btn-round" onclick="return confirm('Yakin menghapus?');">{{__('Hapus')}}</button>
                 </form>  
                 <a href="/proyek/{{$proyek->id}}" class="btn badge-pill btn-info btn-round">{{__('Kembali')}}</a>
              </div>
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
                  <a href="/boq" title="Klik untuk menambah" class="">+Bill of Quantity</a>
                  </td>
                  <td>
                  <div class="col-md-10">                    
                    <span class="btn badge-pill btn-sm btn-round btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/drawing" title="Klik untuk menambah" class="">+Drawing</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn badge-pill btn-sm btn-round btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/purchase" title="Klik untuk menambah" class="">+Purchase Req</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn badge-pill btn-sm btn-round btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/spk" title="Klik untuk menambah" class="">+SPK</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn badge-pill btn-sm btn-round btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
@endsection