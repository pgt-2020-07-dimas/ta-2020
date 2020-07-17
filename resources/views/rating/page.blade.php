@if(count($rating)<>null)  
        @foreach ($pro as $j)
        @php   
                $row[]=$j->name;
                $cek = count($row);
        @endphp
        @endforeach  
        @foreach ($rating as $c)
            <div class="col-sm-3">
                <div class="card">                            
                    <div class="card-body mt-2">
                        <h4 class="card-title text-center font-weight-bold mt-3">{{ $c->name }}</h4>
                        <div class="site-logo mr-auto w-55"><img class="img-fluid" src="{{asset('/images/worker.png')}}" alt=""></div>
                        <p class="font-italic card-title ml-4">Rating :</p>
                    <div class="text-center">

                    <!-- <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="4" data-step="0.1" value="{{ $c->rating }}" data-size="xs" disabled> -->
                        
                        <span class="title mt-4">
                            Score: <span class="value">{{ $c->rating }} / 4</span>&nbsp; 
                            </span>
                        </div>
                          
                        <div class="card-body" style="height:6em">                                      
                            <p class="card-text">{{ $c->alamat }}</p>
                        </div> 

                        <div class="text-right">
                            <a href="#" class="btn btn-round btn-primary">Detail</a>
                        </div>
                        
                    </div>
                </div>
            </div>    
            @endforeach

    <div class="col-md-12">
        <div class="">
            <p>Total Kontraktor : {{ $cek}}</p>
        </div>
    </div>
    @else
    <div class="col-md-12">
        <div class="card">
            <div class="card-body mt-2 text-center">
                <label for="" class="card-title">Kontraktor Tidak Ditemukan</label>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="">
            <p>Total Kontraktor : 0 </p>
        </div>
    </div>
   @endif

   <div class="row">
            <div class="col-lg-12">
        </div>
     </div>

    
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>  -->
<script>
$("#input-id").rating();
</script>
