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
                      <input type="text" name="project_no" class="form-control badge-pill  @error('project_no') is-invalid @enderror" value="{{ old('project_no') }}">
                      @error('project_no') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" Tahun Proyek")}}</label>
                      <input type="text" name="project_year" class="form-control badge-pill  @error('project_year') is-invalid @enderror" value="{{ old('project_year') }}">
                      @error('project_year') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>            

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" name="project_title" class="form-control badge-pill  @error('project_title') is-invalid @enderror" value="{{ old('project_title') }}">
                      @error('project_title') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control badge-pill  @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3" >{{ old('deskripsi') }}</textarea>
                      @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" name="user_cc" class="form-control badge-pill  @error('user_cc') is-invalid @enderror" value="{{ old('user_cc') }}" >
                      @error('user_cc') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>                      
                      <select name="plant" class="form-control  @error('plant') is-invalid @enderror">
                        <option>- Pilih Plant -</option>                        
                        <option value="All Plant">All Plant</option>                        
                        <option value="Plant A">Plant A</option>                        
                        <option value="Plant BHI">Plant BHI</option>                        
                        <option value="Plant C">Plant C</option>                        
                        <option value="Plant DK">Plant DK</option>                        
                        <option value="Plant M">Plant M</option>                        
                        <option value="Plant E">Plant E</option>                        
                        <option value="Plant R">Plant R</option>                        
                        <option value="Plant J">Plant J</option>                        
                        <option value="Other">Other</option>                        
                      </select>
                      @error('plant') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="hidden" value="{{Auth::user()->kode}}" name="kode">
                <input type="hidden" value="Planning" name="status">
                <input type="hidden" value="5" name="persentase">
                <div class="text-right pr-4">
                  <button type="submit" name="submit" class="btn btn-primary btn-round">{{__('Simpan')}}</button>
                  <a href="/dashboard" class="btn btn-info btn-round">{{__('Kembali')}}</a>
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
                  <a href="" title="Klik untuk menambah" class="">+Bill of Quantity</a>
                  </td>
                  <td>
                  <div class="col-md-10">                    
                    <span class="btn btn-sm badge-pill btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="" title="Klik untuk menambah" class="">+Drawing</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn btn-sm badge-pill btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/purchase" title="Klik untuk menambah" class="">+Purchase Req</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn btn-sm badge-pill btn-danger">belum terisi</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="/spk" title="Klik untuk menambah" class="">+SPK</a>
                  </td>
                  <td>
                  <div class="col-md-10">
                  <span class="btn btn-sm badge-pill btn-danger">belum terisi</span>
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
