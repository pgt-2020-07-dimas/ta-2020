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
            <div class="card-header"><h5>Status barang</h5></div>
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
                                        <td class="text-center">Detail</td>
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
                                            0/{{$items[$i]->qtyAsli}} - {{$items[$i]->persentase}}%
                                        @else
                                            {{$items[$i]->qtyDtg}}/{{$items[$i]->qtyAsli}}
                                        @endif
                                        </td>
                                        <td class="text-center">
                                        <a href="#" class="badge badge-primary text-white persentase" 
                                        data-toggle="modal" data-target="#modal-persentase" title="Detail kedatangan"
                                        data-item="{{$items[$i]->item_name}}">
                                        <i class="fa fa-info-circle"></i>
                                        </a>                         
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
                    <div class="row">
                        <div class="col"><h5>Riwayat kedatangan barang</h5></div>
                        <div class="col text-right">
                        <button class="btn btn-sm btn-success btn-round mb-2" data-toggle="modal" data-target="#modal-edit">Tambah</button>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">                
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">No.</td>
                                    <td>Tanggal</td>
                                    <td class="text-center">Surat Jalan</td>
                                    <td class="text-center">Detail</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($arrives as $a)
                            
                                <tr>
                                    <td  class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$a->date}}</td>
                                    <td class="text-center"><a href="/{{$a->path}}" target="_blank" class="btn btn-sm btn-info btn-round">Lihat</a></td>
                                    <td class="text-center"><button class="btn btn-sm btn-info btn-round" data-toggle="modal" data-target="#modal-detail">Lihat</button></td>
                                </tr>
                            @endforeach
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"><h5>Perkembangan proyek</h5></div>
                        <div class="col text-right">
                        <button class="btn btn-sm btn-success btn-round mb-2" data-toggle="modal" data-target="#modal-perkembangan">Tambah</button>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">                
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">No.</td>
                                    <td>Tanggal</td>
                                    <td class="text-center">%Perkembangan</td>
                                    <td class="text-center">Foto</td>
                                    <td class="text-center">Opsi</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($perkembangan as $p)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$p->date}}</td>
                                    <td class="text-center">{{$p->pemasangan}}</td>
                                    <td class="text-center"><a class="btn btn-sm btn-info btn-round" target="_blank" href="/{{ $p->path }}">Lihat</a></td>
                                    <td class="text-center">hapus</td>
                                </tr>
                            @endforeach
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>   
             
        @else
                <div class="text-center card-body">
                    Surat Perintah Kerja belum Diisi
                </div>               
        @endif 
        <!-- modal detail     -->
        <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Jalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="thumbnail" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-round" data-dismiss="modal">Tutup</button>
                    
                </div>
                </div>
            </div>
        </div>  
        <!-- end modal detail  -->
        <!-- modal perkembangan     -->
        <div class="modal fade" id="modal-perkembangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perkembangan pemasangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/progres/perkembangan" method="post" enctype="multipart/form-data">
                @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{$proyek->boq_id}}" name="boq_id"> 
                            <div class="form-group">
                                <label for="pemasangan">Persentase pemasangan</label>
                                <input type="text" name="pemasangan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label  >{{__(" Tanggal")}}</label>
                                <div class="row">
                                        <div class="col">
                                                <input type="date" name="date" class="date text-capitalize form-control badge-pill @error('date') is-invalid @enderror" value="{{ old('date') }}" required>                                    
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
                            <div class="form-group">
                                <label for="item" >{{__(" Upload foto")}}</label><br>
                            </div>
                                <input type="file" accept="image/*" name="perkembangan" required>       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-round">Simpan</button>                    
                            <button type="button" class="btn btn-warning btn-round reset" data-dismiss="modal">Tutup</button>                    
                        </div>
                </form>
                </div>
            </div>
        </div>  
        <!-- end modal perkembangan  -->
        <!-- modal persentase -->
        <div class="modal fade" id="modal-persentase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail kedatangan barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Jumlah</td>
                            <td>Tanggal</td>
                        </tr>
                    </thead>
                </table>
            </div>
            </div>
        </div>
        </div>
        <!-- end modal persentase -->
        <!-- Modal riwayat -->
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
                <input type="hidden" value="{{$proyek->boq_id}}" name="boq_id"> 
                  <div class="form-group">
                      <label  >{{__(" Tanggal")}}</label>
                      <div class="row">
                            <div class="col">
                                    <input type="date" name="date" class="date text-capitalize form-control badge-pill @error('date') is-invalid @enderror" value="{{ old('date') }}" required>                                    
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
                  <br>
                  <div class="row">
                    <div class="col-md-5">
                        <label  >{{__(" Pilih Item")}}</label>
                    </div>
                    <div class="col-md-3">
                        <label  >{{__(" Terisi")}}</label>
                    </div>
                    <div class="col-md-4">
                        <label  >{{__(" Jumlah")}}</label>
                    </div>
                  </div>
                  <br>
                  @for($i=0;$i<$c;$i++)

                  <div class="container">
                  <div class="row">
                        <div class="col-sm-5">
                        <div class="form-group">
                            <div>
                                <input class="hapus" type="checkbox" name="items[]" value="{{$items[$i]->id}}">
                                <label for="status">{{$items[$i]->item_name}}</label>
                            </div>                            
                        </div>
                        </div>                    
                        <div class="col-sm-3">
                        <div class="form-group">
                            <div>
                                @if($items[$i]->qtyDtg==null)
                                    0/{{$items[$i]->qtyAsli}}
                                @else
                                    {{$items[$i]->qtyDtg}}/{{$items[$i]->qtyAsli}}
                                @endif
                            </div>                            
                        </div>
                        </div>                    
                        <div class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" id="quantity" name="qtyAsli[]" value="{{$items[$i]->qtyAsli}}">
                            <input type="number" id="qty" class="form-control hapus" name="qtyDtg[]" value="{{ old('qty') }}" class="form-control badge-pill @error('qty') is-invalid @enderror" maxlength="3" placeholder="Jumlah">
                            @error('qty') <div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        </div> 
                 </div>
                 </div>  
                    @endfor                
                    <hr>
                  <div>
                      <label for="item" >{{__(" Upload foto")}}</label><br>
                      <input type="file" accept="image/*" name="arrive" required>
                  </div>
              

              <div class="modal-footer">
                <button type="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Perbaharui')}}</button>
                <button type="button" class="btn btn-round btn-warning reset" data-dismiss="modal">Tutup</button>
             
              </div>
              </form>
            </div>
          </div>
        </div> 
        <!-- end modal riwayat -->  
        
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
            // $('.hapus').val(null);       
            // var i=0;  
            // for(i=0; i< <?=$c;?>;i++)  {
            // $('.hapus')[i].checked = false;
            // // alert(i);
            // } 
        });

        // $('.edit').click(function(){
        //     var item_id = $(this).attr('data-id');
        //     $('#id').val(item_id);
        //     var item_name = $(this).attr('data-name');
        //     $('#item_name').val(item_name);
        //     var quantity = $(this).attr('data-quantity');
        //     $('#quantity').val(quantity);                       
        //     var boq = $(this).attr('data-boq');
        //     $('#boq_id').val(boq);           
            
        // });
        $('.persentase').click(function(){
            var item_name = $(this).attr('data-item');
            // alert(item_name);
            $('#item_name').val(item_name);         
            
        });
</script>
@endsection
