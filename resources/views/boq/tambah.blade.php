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
            <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @include('alerts.success')
              <div class="row">
              </div>           

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>
                      <input type="text" name="item_name" class="form-control badge-pill " >
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label>{{__(" Spesifikasi")}}</label>
                      <textarea class="form-control badge-pill " name="specification" rows="3" placeholder="Brand, Size, Type, Other......"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Tipe")}}</label>
                      <select name="tipe" class="form-control badge-pill" id="exampleFormControlSelect1">
                        <option value="">-Pilih-</option>
                        <option value="Material">Material</option>
                        <option value="Jasa">Jasa</option>
                      </select>                      
                    </div>
                  </div>
                  <div class="col-md-4 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Quantity")}}</label>
                      <input type="number" name="quantity" class="form-control badge-pill " maxlength="3" >
                      
                    </div>
                  </div>
                  <div class="col-md-4 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Unit")}}</label>
                      <input type="text" name="unit" class="form-control badge-pill " >
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-11 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Harga/Unit")}}</label>
                      <input type="text" name="price_unit" class="form-control badge-pill " >
                      
                    </div>
                  </div>
                </div>
              <div class="card-footer text-right mr-4">
                <button type="submit" title="Tambah Item" class="btn btn-round btn-success ">{{__('Tambah')}}</button>
                <a href="/proyek/tambah" title="Kembali" class="btn btn-round btn-warning ">{{__('kembali')}}</a>
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
        <table class="table table-striped table-hover">
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
                <tr>
                    <td class="text-center">1</td>
                    <td>Pipa</td>
                    <td>Brand WAVIN; Size 4; dll</td>
                    <td class="text-center">5</td>
                    <td class="text-center">Buah</td>
                    <td class="text-center">Rp5.000.000</td>
                    <td class="text-center">Rp25.000.000</td>
                    <td class="text-center">
                        <a href="#" class="badge badge-primary" title="Edit Item" id="2-tasks-edit" icon="edit"><i class="fa fa-edit"></i> </a>
                        <a href="#" class="badge badge-danger" title="Hapus Item" id="2-tasks-delete" icon="close"><i class="fa fa-close"></i> </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
       </div>
     </div>
</div>
  
@endsection
