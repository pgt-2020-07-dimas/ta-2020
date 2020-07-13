@extends('layouts.app', [
    'namePage' => 'Rating Kontaktor',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'rating_kontaktor',
   
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
                    <h5 class="title">Pencarian Kontaktor</h5>
                        <form action="" class="form">
                            <input value="" type="text" name="search" class="form-control col-sm-10" placeholder="Masukan kata kunci pencarian" id="search">                            
                        </form>                        
                    </div>
                    <div class="col-sm-5">
                        <h5 class="title">Filter</h5>
                      <div class="row filter container">
                        <select  name="" id="" class="form-control col-sm-6">
                        <option value="">-- Perusahaan --</option>       
                          <option value="">PT. Kuwakui</option>
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
    @include('rating.page')
    </div>
    
       
<!-- <script>
  $(document).ready(function(){
    var str=  $("#search").val();
	  
			$.get( "{{ url('/rating/search?cari=') }}"+str, function( data ) {
			$( "#mydata" ).html( data );  
	    });
      
    });

  $(document).ready(function(){
	$("#search").keyup(function(){
	  var str=  $("#search").val();
    var tahun=  $("#tahun").val();
    var plant= $("#plant").val();
    var status= $("#status").val();
	  
			$.get( "{{ url('/rating/search?cari=') }}"+str+"&&"+"tahun="+tahun+"&&"+"plant="+plant+"&&"+"status="+status, function( data ) {
			$( "#mydata" ).html( data );  
	    });
	  
	});  
  }); 

  $(document).ready(function(){
	$(".filter").click(function(){
	  var str=  $("#tahun").val();
	  var str1=  $("#plant").val();
    var str2=  $("#status").val();
    var cari=  $("#search").val();
	  
		$.get( "{{ url('/rating/filter?tahun=') }}"+str+"&&"+"plant="+str1+"&&"+"status="+str2+"&&"+"cari="+cari, function( data ) {
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
 var status= $("#status").val();
 var str=  $("#search").val();
 fetch_data(page, tahun, plant, status, str);
});

function fetch_data(page,tahun, plant, status, str)
{
 $.ajax({
  url:"/rating/fetch_data?page="+page+"&tahun="+tahun+"&plant="+plant+"&status="+status+"&cari="+str,
  success:function(data)
  {
   $('#mydata').html(data);
  }
 });
}


});

</script> -->

@endsection
