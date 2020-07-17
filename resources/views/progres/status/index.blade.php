@extends('layouts.app', [
    'namePage' => 'Riwayat kedatangan barang',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
            <div class="card-header">Detail kedatangan {{$item_name}}</div>
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
                                    <td>Tanggal</td>
                                    <td class="text-center">Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$item->date}}</td>
                                    <td class="text-center">{{$item->quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>            
        </div>         
@endsection
