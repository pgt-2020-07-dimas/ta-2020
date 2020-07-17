@extends('layouts.app', [
    'namePage' => 'Riwayat kedatangan barang',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header">Detail riwayat kedatangan barang </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="containter">
                        <table class="table table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <td class="text-center">No.</td>
                                    <td>Item</td>
                                    <td class="text-center">Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arrives as $arrive)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$arrive->item_name}}</td>
                                    <td class="text-center">{{$arrive->quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>            
        </div>         
@endsection
