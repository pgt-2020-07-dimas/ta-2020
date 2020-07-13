@extends('layouts.app', [
    'namePage' => 'Histori Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'histori_proyek',
   
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
                    <div class="col-sm-6 mb-2 mr-2">
                    <h5 class="title">Pencarian proyek</h5>
                        <form action="" class="form">
                            <input value="" type="text" name="search" class="form-control col-sm-10" placeholder="Masukan kata kunci pencarian" id="search">                            
                        </form>                        
                    </div>
                    <div class="col-sm-5">
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
                        
                      </div>
                        <!-- <label for="">Tahun</label>
                        <label for="">Status</label>
                        <label for="">Plant</label> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="container row" id="mydata">
    @include('histori.page')
    </div>
    
     {{ $proyek->links() }}
       
<script>
  $(document).ready(function(){
    var str=  $("#search").val();
	  
			$.get( "{{ url('/histori/search?cari=') }}"+str, function( data ) {
			$( "#mydata" ).html( data );  
	    });
      
    });

  $(document).ready(function(){
	$("#search").keyup(function(){
	  var str=  $("#search").val();
    var tahun=  $("#tahun").val();
    var plant= $("#plant").val();
	  
			$.get( "{{ url('/histori/search?cari=') }}"+str+"&&"+"tahun="+tahun+"&&"+"plant="+plant, function( data ) {
			$( "#mydata" ).html( data );  
	    });
	  
	});  
  }); 

  $(document).ready(function(){
	$(".filter").click(function(){
	  var str=  $("#tahun").val();
	  var str1=  $("#plant").val();
    var cari=  $("#search").val();
	  
		$.get( "{{ url('/histori/filter?tahun=') }}"+str+"&&"+"plant="+str1+"&&"+"cari="+cari, function( data ) {
			$( "#mydata" ).html( data );  
	  });
	  
	});  
  }); 
  

  

$(document).ready(function(){

$(document).on('click', '.pagination a', function(event){
 event.preventDefault(); 
 var page = $(this).attr('href').split('page=')[1];
 var tahun =$("#tahun").val();
 var plant= $("#plant").val();
 var str=  $("#search").val();
 fetch_data(page, tahun, plant, str);
});

function fetch_data(page,tahun, plant, str)
{
 $.ajax({
  url:"/histori/fetch_data?page="+page+"&tahun="+tahun+"&plant="+plant+"&cari="+str,
  success:function(data)
  {
   $('#mydata').html(data);
  }
 });
}


});

</script>

@endsection
