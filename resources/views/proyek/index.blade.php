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
                            <input value="" type="text" name="search" class="form-control" placeholder="Masukan kata kunci" id="search">
                            <button type="submit" class="btn btn-sm btn-primary btn-round ml-1">Cari</button>
                        </form>                        
                    </div>
                    <div class="col-lg-5">
                        <h5 class="title">Filter</h5>
                      <div class="row filter">
                        <select  name="tahun" id="tahun" class="form-control col-sm-3">
                        <option value="">-- Tahun --</option>                        
                        <option value="2020">2020</option>                        
                        <option value="2019">2019</option>                        
                        </select>
                        <select name="plant" id="plant" class="form-control col-sm-3">
                        <option value="">-- Plant --</option>                        
                        <option value="Plant A">Plant A</option>                        
                        <option value="Plant DK">Plant DK</option>                        
                        </select>
                        <select name="status" id="status" class="form-control col-sm-3">
                        <option value="">-- Status --</option>                        
                        <option value="Planning">Planning</option>                        
                        <option value="Desain">Desain</option>
                        <option value="SPK">SPK</option>                        
                        </select>
                      </div>
                        <!-- <label for="">Tahun</label>
                        <label for="">Status</label>
                        <label for="">Plant</label> -->
                    </div>
                    <div class="col-lg-2">
                        <h5 class="title">Urutkan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container row" id="mydata"></div>

    <!-- <div class="row">
            <div class="col-lg-12">
                {{ $proyek->links() }}
            </div>
    </div> -->
   
<script>
  $(document).ready(function(){
    var str=  $("#search").val();
	  
			$.get( "{{ url('/proyek/search?cari=') }}"+str, function( data ) {
			$( "#mydata" ).html( data );  
	    });
    });

  $(document).ready(function(){
	$("#search").keyup(function(){
	  var str=  $("#search").val();
	  
			$.get( "{{ url('/proyek/search?cari=') }}"+str, function( data ) {
			$( "#mydata" ).html( data );  
	    });
	  
	});  
  }); 

  $(document).ready(function(){
	$(".filter").click(function(){
	  var str=  $("#tahun").val();
	  var str1=  $("#plant").val();
      var str2=  $("#status").val();
			$.get( "{{ url('/proyek/filter?tahun=') }}"+str+"&&"+"plant="+str1+"&&"+"status="+str2, function( data ) {
			$( "#mydata" ).html( data );  
	    });
	  
	});  
  }); 

</script>


@endsection
