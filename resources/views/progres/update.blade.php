@extends('layouts.app', [
    'namePage' => 'Update Progres',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header"><h5>Update progres</h5></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="containter"> 
                    @if($status === true)
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-center">No.</td>
                                        <td>Item</td>
                                        <td class="text-center">Status</td>
                                        <td class="text-center">Persentase</td>
                                        <td class="text-center">Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td >{{$item->item_name}}</td>
                                        <td class="text-center">
                                        @if($item->status=='0') 
                                            Belum diterima
                                        @elseif ($item->status=="0.5")
                                            Belum dipasang
                                        @else
                                            Selesai
                                        @endif
                                        </td>
                                        <td class="text-center">{{$item->itemPersentase_name}}</td>
                                        <td class="text-center"><a href="#" class="badge badge-primary text-white edit" icon="edit" title="Edit item"
                                        data-toggle="modal" data-target="#modal-edit"                                        
                                        ><i class="fa fa-edit"></a></i></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>   
                @else
                <div class="text-center card-body">
                    Surat Perintah Kerja belum Diisi
                </div>
                
                @endif                 
                </div>  
                <!-- end container   -->
        <!-- Modal -->
        <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Update progres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="/boq/" method="post">
              @csrf              
                <div class="modal-body">  
                <input type="hidden" id="id" name="id">
                <input type="hidden" value="" name="boq_id">
                  <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>
                      <input type="text" id="item_name" name="item_name" class="text-capitalize form-control badge-pill @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" required>
                      @error('item_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>

                  <div class="form-group">
                      <label  >{{__(" Tanggal")}}</label>
                      <div class="row">
                            <div class="col">
                                    <input type="date" id="date" name="date" class="text-capitalize form-control badge-pill @error('date') is-invalid @enderror" value="{{ old('date') }}" required>                                    
                            </div>
                            <div class="col">
                                <div class="pt-2">
                                    <input type="checkbox">
                                    <label for="">Hari ini</label>
                                </div>
                            </div>
                      </div>
                      @error('date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>

                  <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label  >{{__(" Qty")}}</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control badge-pill @error('quantity') is-invalid @enderror" maxlength="3" required>
                            @error('quantity') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        </div>                    
                        <div class="col">
                        <div class="form-group">
                            <label  >{{__(" Status")}}</label><br>
                            <div class="pt-2">
                                <input type="checkbox" name="status" value="1" id="status">
                                <label for="status">Terpasang</label>
                            </div>                            
                        </div>
                        </div>                    
                </div>  

                  <div class="">
                      <label for="item" >{{__(" Upload foto")}}</label><br>
                      <input type="file" id="item">
                  </div>
              

              <div class="modal-footer">
                <button type="submit" name="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Perbaharui')}}</button>
                <button type="button" class="btn btn-round btn-warning" data-dismiss="modal">Tutup</button>
             
              </div>
              </form>
            </div>
          </div>
        </div>    
        
@endsection
