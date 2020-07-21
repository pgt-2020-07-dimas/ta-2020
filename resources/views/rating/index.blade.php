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
                    
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="container row" id="data">
    @include('rating.page')
    </div>

       
<script>
  $(document).ready(function(){
    var str=  $("#search").val();
            // alert('loaded');
			$.get( "{{ url('/rating/search?cari=') }}"+str, function( data ) {
			$( "#data" ).html( data );  
	    });
      
    });

  $(document).ready(function(){
	$("#search").keyup(function(){
	  var str=  $("#search").val();
            // alert(str);
			$.get("{{ url('/rating/search?cari=') }}"+str, function( data ) {
			$( "#data" ).html( data );  
	    });
	  
	});  
  }); 


$(document).ready(function(){ 

$(document).on('click', '.pagination a', function(event){
 event.preventDefault(); 
 var page = $(this).attr('href').split('page=')[1];
 var str=  $("#search").val();
 fetch_data(page, str);
});

function fetch_data(page, str)
{
 $.ajax({
  url:"/pagination/rating/fetch_data?page="+page+"&cari="+str,
  success:function(data)
  {
   $('#data').html(data);
  }
 });
}


});

</script>

@endsection
