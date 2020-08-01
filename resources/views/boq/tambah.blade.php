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
            <h5 class="title mt-3">{{__(" Isi Bill Of Quantity")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="/boq" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              <div class="row">
              </div>           

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>
                      <input type="text" name="item_name" class="text-capitalize form-control badge-pill @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" required>
                      @error('item_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Spesifikasi")}}</label>
                      <textarea class="form-control badge-pill @error('specification') is-invalid @enderror" name="specification" rows="3" placeholder="Brand, Size, Type, Other......" required>{{ old('specification') }}</textarea>
                      @error('specification') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Tipe")}}</label>
                      <select name="tipe" class="form-control badge-pill @error('tipe') is-invalid @enderror" id="exampleFormControlSelect1" required>
                        <option  value="">- Pilih -</option>
                        <option value="Material" >Material</option>
                        <option value="Jasa" >Jasa</option>
                      </select>  
                      @error('tipe') <div class="invalid-feedback">{{ $message }}</div>@enderror                    
                    </div>
                  </div>
                  <div class="col-md-4 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Quantity")}}</label>
                      <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control badge-pill @error('quantity') is-invalid @enderror" maxlength="3" required>
                      @error('quantity') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-4 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Unit")}}</label>
                      <input type="text" name="unit" value="{{ old('unit') }}" class="text-capitalize form-control badge-pill @error('unit') is-invalid @enderror" required>
                      @error('unit') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Harga/Unit")}}</label>
                      <input type="number" name="price_unit" value="{{ old('price_unit') }}" class="form-control badge-pill @error('price_unit') is-invalid @enderror" required>
                      @error('price_unit') <div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>
              <div class="card-footer text-right mr-4">
                <input type="hidden" value="{{$boq_id}}" name="boq_id">
                <button type="submit" name="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Tambah')}}</button>
                <a href="/proyek/{{$proyek->id}}/edit" title="Kembali" class="btn btn-round btn-warning ">{{__('Kembali')}}</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card pl-3 d-none d-md-block">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Detail Proyek")}}</h5>
          </div>
          <div class="card-body">
                
                <div class="row">
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" No Proyek")}}</label>
                      <input type="text" value="{{ $proyek->project_no }}" class="form-control badge-pill " readonly>
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label>{{__(" Tahun Proyek")}}</label>
                      <input type="text" value="{{$proyek->project_year}}" class="form-control badge-pill " readonly>
                    </div>
                  </div>
                </div>            

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" value="{{$proyek->project_title}}" class="form-control badge-pill " readonly>
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control badge-pill " rows="3" readonly>{{$proyek->deskripsi}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" value="{{$proyek->user_cc}}" class="form-control badge-pill " readonly>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <input type="text" value="{{$proyek->plant}}" class="form-control badge-pill " readonly>
                      
                    </div>
                  </div>
                </div>
          </div>   
        </div>
      </div>
    </div>

    
    <div class="card pl-3">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Data Item")}}</h5>
          </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-sm table-striped table-hover">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Item</th>
                <th class="text-center">Spesifikasi</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Unit</th>
                <th class="text-center">Price/Unit</th>
                <th class="text-center">Total Price</th>                
                <th class="text-center">Opsi</th>
            </tr>
            </thead>
            <tbody>
            @if(count($items) <> 0)
                @foreach($items as $item)                
                <tr>                    
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->item_name}}</td>
                    <td class="text-center">{{$item->specification}}</td>
                    <td class="text-center">{{$item->quantity}}</td>
                    <td class="text-center">{{$item->unit}}</td>
                    <td class="text-center">Rp. {{$item->price_unit}}</td>
                    <td class="text-center">Rp. {{$item->total_price}}</td>
                    <td class="text-center">
                        <a class="badge badge-primary text-white edit" icon="edit" title="Edit item"
                        data-toggle="modal" data-target="#modal-edit"
                        data-id="{{$item->id}}" 
                        data-name="{{$item->item_name}}" 
                        data-quantity="{{$item->quantity}}" 
                        data-tipe="{{$item->tipe}}" 
                        data-unit="{{$item->unit}}" 
                        data-price="{{$item->price_unit}}" 
                        data-spesifikasi="{{$item->specification}}">
                        <i class="fa fa-edit"></i>
                        </a>      
                        <form action="/boq/{{$item->id}}" method="post">
                        @method('delete')
                        @csrf 
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="hidden" name="boq_id" value="{{$item->boq_id}}">
                        <button type="submit" name="submit" class="badge badge-danger" title="Hapus Item" icon="close" onclick="return confirm('Yakin menghapus?');"><i class="fa fa-close"></i> </button>
                        </form>
                    </td>
                </tr>   
                @endforeach                
                <tr>
                  <td colspan="6" class="text-right">Total :</td>
                  <td class="text-center">Rp. {{$total}}</td>
                  <td></td>
                </tr>
              @else
              <tr>
                <td colspan="8" class="text-center">Belum ada item yang ditambahkan</td>
              </tr>
              @endif
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Edit data item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="/boq/{{$boq_id}}" method="post">
              @method('patch')
              @csrf
              
                <div class="modal-body">  
                <input type="hidden" id="id" name="id">
                <input type="hidden" value="{{$boq_id}}" name="boq_id">
                  <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>
                      <input type="text" id="item_name" name="item_name" class="text-capitalize form-control badge-pill @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" required>
                      @error('item_name') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>
                  
                  <div class="form-group">
                      <label>{{__(" Spesifikasi")}}</label>
                      <textarea id="spesifikasi" class="form-control badge-pill @error('specification') is-invalid @enderror" name="specification" rows="3" placeholder="Brand, Size, Type, Other......" required>{{ old('specification') }}</textarea>
                      @error('specification') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>

                  <div class="row">

                    <div class="col">
                      <div class="form-group">
                        <label  >{{__(" Tipe")}}</label>
                        <select name="tipe" class="form-control badge-pill @error('tipe') is-invalid @enderror" id="tipe" required>
                          <option value="" >- Pilih -</option>
                          <option value="Material">Material</option>
                          <option value="Jasa">Jasa</option>
                        </select>  
                        @error('tipe') <div class="invalid-feedback">{{ $message }}</div>@enderror                    
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label  >{{__(" Quantity")}}</label>
                        <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control badge-pill @error('quantity') is-invalid @enderror" maxlength="3" required>
                        @error('quantity') <div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <label  >{{__(" Unit")}}</label>
                        <input type="text" id="unit" name="unit" value="{{ old('unit') }}" class="text-capitalize form-control badge-pill @error('unit') is-invalid @enderror" required>
                        @error('unit') <div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                    </div>
                  
                  </div>
                  <div class="form-group">
                      <label  >{{__(" Harga/Unit")}}</label>
                      <input type="number" id="price_unit" name="price_unit" value="{{ old('price_unit') }}" class="form-control badge-pill @error('price_unit') is-invalid @enderror" required>
                      @error('price_unit') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>

                    
                </div>                
              

              <div class="modal-footer">
                <button type="submit" name="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Perbaharui')}}</button>
                <button type="button" class="btn btn-round btn-warning" data-dismiss="modal">Tutup</button>
             
              </div>
              </form>
            </div>
          </div>
        </div>

       </div>
     </div>
</div>
<script type="text/javascript">
  $('.edit').click(function(){
    var id = $(this).attr('data-id');
    $('#id').val(id);
    var item_name = $(this).attr('data-name');
    $('#item_name').val(item_name);
    var spesifikasi = $(this).attr('data-spesifikasi');
    $('#spesifikasi').val(spesifikasi);
    var quantity = $(this).attr('data-quantity');
    $('#quantity').val(quantity);
    var unit = $(this).attr('data-unit');
    $('#unit').val(unit);
    var price_unit = $(this).attr('data-price');
    $('#price_unit').val(price_unit);
    var tipe = $(this).attr('data-tipe');
    $('#tipe').val(tipe);
    
    
  })
  $(document).ready(function() {
    const tipe = '{{ old('tipe') }}';
    
    if(tipe !== '') {
      $('#tipe').val(tipe);
    }
  });
</script>
@endsection
