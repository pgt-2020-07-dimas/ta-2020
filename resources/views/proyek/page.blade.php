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
            <label for="" class="card-title">Proyek Tidak Ditemukan</label>
            </div>
        </div>
    </div>
    </div>
    @endif 
    @foreach ($pro as $j)
    @php   
            $row[]=$j->persentase;
            $cek = count($row);
    @endphp
    @endforeach
    <div class="col-md-12">
        <div class="">
            <p>Total Proyek : {{ $cek }} </p>
        </div>
    </div>
    
    <div class="row">
            <div class="col-lg-12">
                {{ $proyek->links() }}
        </div>
     </div>

    <script class="">
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