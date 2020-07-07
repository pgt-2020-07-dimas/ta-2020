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
                    <div class="col-lg-5 mb-2">
                    <h5 class="title">Pencarian proyek</h5>
                        <form action="" class="form">
                            <input value="" type="text" name="search" class="form-control" placeholder="Masukan kata kunci pencarian" id="search">                            
                        </form>                        
                    </div>
                    <div class="col-lg-7">
                        <h5 class="title">Filter</h5>
                      <div class="row filter container">
                        <select  name="tahun" id="tahun" class="form-control col-sm-4">
                        <option value="">-- Tahun --</option>       
                        @foreach($project_year as $py)
                          <option value="{{$py->project_year}}">{{$py->project_year}}</option>
                        @endforeach                                       
                        </select>
                        <select name="plant" id="plant" class="form-control col-sm-4">
                        <option value="">-- Plant --</option>      
                        @foreach($plant as $p)
                        <option value="{{$p->plant}}">{{$p->plant}}</option>
                        @endforeach
                        </select>
                        <select name="status" id="status" class="form-control col-sm-4">
                        <option value="">-- Status --</option>                        
                        @foreach($status as $s)
                        <option value="{{$s->status}}">{{$s->status}}</option>
                        @endforeach                        
                        </select>
                      </div>
                        <!-- <label for="">Tahun</label>
                        <label for="">Status</label>
                        <label for="">Plant</label> -->
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
