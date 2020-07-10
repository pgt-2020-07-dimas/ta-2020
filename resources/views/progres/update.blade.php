@extends('layouts.app', [
    'namePage' => 'Update Progres',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])
@php
    $c = count($items);
@endphp
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
                                        <td class="text-center">Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $j=1;?>
                                @for($i=0;$i<$c;$i++)
                                    <tr>
                                        <td class="text-center"><?=$j;?></td>
                                        <td >{{$items[$i]->item_name}}</td>
                                        <td class="text-center">
                                        @if($items[$i]->qtyDtg==null)
                                            0/{{$items[$i]->qtyAsli}}
                                        @else
                                                {{$items[$i]->qtyDtg}}/{{$items[$i]->qtyAsli}}
                                        @endif 
                                        </td>
                                        <td class="text-center">
                                        @if($items[$i]->persentase>=50)
                                        <a href="#" class="badge badge-secondary text-white" icon="edit" title="Edit item" disabled><i class="fa fa-edit"></a></i>
                                        @else
                                        <a href="#" class="badge badge-primary text-white edit" icon="edit" title="Edit item"
                                        data-toggle="modal" data-target="#modal-edit"   
                                        data-id="{{ $items[$i]->id}}" data-name="{{$items[$i]->item_name}}"                                     
                                        data-bobot="{{ $items[$i]->bobot}}" data-quantity="{{ $items[$i]->qtyAsli}}" 
                                        data-boq="{{ $items[$i]->boq_id}}"                                    
                                        ><i class="fa fa-edit"></a></i>
                                        @endif
                                        </td>
                                    </tr>
                                    <?php $j++;?>  
                                @endfor

                                </tbody>
                            </table>
                        </div>
                    </div>   
                                    
                <!-- end container   -->
            
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Riwayat kedatangan barang</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>Item</td>
                                    <td class="text-center">Qty</td>
                                    <td class="text-center">Tanggal</td>
                                    <td class="text-center">Opsi</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($history as $h)
                                  <tr <?php if($h->persentase <= 50){echo 'class="table-danger"';}else{echo 'class="table-success"';}?>>
                                        <td>{{$h->item_name}}</td>
                                        <td class="text-center">{{$h->qtyDtg}}</td>
                                        <td class="text-center">{{date('d-m-Y', strtotime($h->date))}}</td>
                                        <td class="text-center"><a href="#" class="badge badge-primary text-white riwayat"><i class="fa fa-edit"></i></a> <a href="#" class="badge badge-danger text-white riwayat"><i class="fa fa-close"></i></a></td>
                                  </tr>  
                            @endforeach
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Update kedatangan barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="/progres/" method="post" enctype="multipart/form-data">
              @csrf              
                <div class="modal-body">  
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="boq_id" name="boq_id">
                  <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>                     
                      <input type="text" id="item_name" name="item_name" class="text-capitalize form-control badge-pill @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" readonly>                      
                  </div>

                  <div class="form-group">
                      <label  >{{__(" Tanggal")}}</label>
                      <div class="row">
                            <div class="col">
                                    <input type="date" name="date" class="date text-capitalize form-control badge-pill @error('date') is-invalid @enderror" value="{{ old('date') }}">                                    
                            </div>
                            <div class="col">
                                <div class="pt-2">
                                    <input class="today" type="checkbox">
                                    <label for="today">Hari ini</label>
                                </div>
                            </div>
                      </div>
                      @error('date') <div class="invalid-feedback">{{ $message }}</div>@enderror
                  </div>

                  <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label  >{{__(" Qty")}}</label>
                            <input type="hidden" id="quantity" name="quantity">
                            <input type="number" id="qty" name="qty" value="{{ old('qty') }}" class="form-control badge-pill @error('qty') is-invalid @enderror" maxlength="3" required>
                            @error('qty') <div class="invalid-feedback">{{ $message }}</div>@enderror
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
                      <input type="file" accept="image/*" name="item" id="item">
                  </div>
              

              <div class="modal-footer">
                <button type="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Perbaharui')}}</button>
                <button type="button" class="btn btn-round btn-warning reset" data-dismiss="modal">Tutup</button>
             
              </div>
              </form>
            </div>
          </div>
        </div> 
        @else
                <div class="text-center card-body">
                    Surat Perintah Kerja belum Diisi
                </div>               
        @endif 
<script type="text/javascript">
        $('.today').click(function(){
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            // alert('ok');
            $('.date').val(today);
        });
        $('.reset').click(function(){            
            $('.date').val(null);
            $('.today')[0].checked = false;
        });
        $('.edit').click(function(){
            var item_id = $(this).attr('data-id');
            $('#id').val(item_id);
            var item_name = $(this).attr('data-name');
            $('#item_name').val(item_name);
            var quantity = $(this).attr('data-quantity');
            $('#quantity').val(quantity);                       
            var boq = $(this).attr('data-boq');
            $('#boq_id').val(boq);           
            
        })
</script>
@endsection
