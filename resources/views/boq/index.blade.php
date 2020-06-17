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
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Nama Item")}}</label>
                      <input type="text" name="item_name" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label>{{__(" Spesifikasi")}}</label>
                      <textarea class="form-control" name="specification" rows="3" placeholder="Brand, Size, Type, Other......"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Quantity")}}</label>
                      <input type="number" name="quantity" class="form-control" maxlength="3" >
                      
                    </div>
                  </div>
                  <div class="col-md-5 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Unit")}}</label>
                      <input type="text" name="unit" class="form-control" >
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Harga/Unit")}}</label>
                      <input type="text" name="price_unit" class="form-control" >
                      
                    </div>
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" title="Tambah Item" class="btn btn-success btn-round">{{__('Tambah')}}</button>
                <a href="/proyek/tambah" title="Kembali" class="btn btn-warning btn-round">{{__('kembali')}}</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card pl-3 .d-sm-none .d-md-block">
          <div class="card-header">
            <h5 class="title mt-3">{{__(" Detail Proyek")}}</h5>
          </div>
          <div class="card-body">
                
                <div class="row">
                  <div class="col-md-5 pr-3">
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
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Judul Proyek")}}</label>
                      <input type="text" name="project_title" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label>{{__(" Deskripsi")}}</label>
                      <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" User/CC")}}</label>
                      <input type="text" name="user_cc" class="form-control" >
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10 pr-3">
                    <div class="form-group">
                      <label  >{{__(" Plant")}}</label>
                      <input type="text" name="plant" class="form-control" >
                      
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
        <table class="table table-striped">
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
