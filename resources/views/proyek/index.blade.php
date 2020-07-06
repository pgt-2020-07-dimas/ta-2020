@extends('layouts.app', [
    'namePage' => 'Detail Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="containter">
    <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                    <h5 class="title">Pencarian proyek</h5>
                        <form action="" class="form-inline">
                            <input type="text" name="cari" class="form-control" placeholder="Masukan kata kunci"id="inlineFormInputName2">
                            <button type="submit" class="btn btn-sm btn-primary btn-round ml-2">Cari</button>
                        </form>                        
                    </div>
                    <div class="col-lg-6">
                        <h5 class="title">Filter</h5>
                        <label for="">Tahun</label>
                        <label for="">Status</label>
                        <label for="">Plant</label>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="title">Urutkan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($proyek)<>null)    
        @foreach ($proyek as $p)
            <div class="col-sm-3">
                <div class="card">                            
                    <div class="card-body mt-2">
                        <div class="progress mx-auto" data-value='{{ $p->persentase }}'>
                        <span class="progress-left">
                                        <span class="progress-bar border-warning"></span>
                        </span>
                        <span class="progress-right">
                                        <span class="progress-bar border-warning"></span>
                        </span>
                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                            <div class="h2 font-weight-bold mt-4">{{ $p->persentase }}<sup class="small">%</sup></div>
                        </div>
                        </div>
                        <h5 class="card-title text-center mt-3">{{$p->project_no}}</h5>
                        <p class="card-text text-center font-weight-bold">{{$p->project_title}}</p>  
                        <div class="card-body" style="height:6em">                                      
                            <p class="card-text">{{ $p->deskripsi }}</p>
                        </div>
                        <p class="card-body font-italic"><small>Status : {{ $p->status }} | {{ $p->plant }}</small></p>
                        <div class="text-right">
                            <a href="/proyek/{{$p->id}}" class="btn btn-round btn-primary">Detail</a>
                        </div>
                        
                    </div>
                </div>
            </div>

        @endforeach
    @else
    <div class="col-md-12">
        <div class="card">
            <div class="card-body mt-2 text-center">
            <label for="" class="card-title">Belum ada proyek yang ditambahkan</label>
            </div>
        </div>
    </div>
    </div>
    @endif  
    <script>
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

        return percentage / 100 * 360

        }

    });
</script>
            
@endsection
