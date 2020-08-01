@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
   
])

@section('content')        
<div class="content ">
    <div class="card">
    <div class="card-header"><h5 class="title">Informasi Proyek</h5></div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="containter">
         Halaman di akses oleh (<span> {{ Auth::user()->departemen }} </span>) Departemen
        </div>                    
    </div>
    </div>  
    @if(count($proyek)<>null)
    @foreach($proyek as $j )
        @php   
        $row[]=$j->persentase;
        $cek = count($row);
        
        $jum[]=$j->persentase;
        $jumlah = array_sum($jum);
        $hasil = number_format($jumlah/$cek,2)
        @endphp
    @endforeach
    @else
      @php
        $cek = 0;
        $hasil = 0;
      @endphp
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
                <h6 class="card-subtitle text-muted">PROJECT 'Amount'</h6>
            </div>
            <div class="card-body">
                <div class="green">
                    <div class="progress ml-5" style="background-color: orangered;">
                    <div class="inner">
                        <div class="text-center">
                            <p class="title mt-4 mb-0"  style="color: white; font-size: 5em; ">{{ $cek }}</p>
                            <p class="title " style="color: white; font-size: 2em;">Item</p>
                        </div>
                        <div class="glare"></div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center mt-3 mb-2">Total Seluruh Proyek</p>
            </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
            <h6 class="card-subtitle text-muted">PROJECT 'Progress'</h6>
            </div>
            <div class="card-body">
                <div class="green">
                    <div class="progress ml-5">
                    <div class="inner">
                        <div class="percent" style="font-size: 3em;"><span>{{ $hasil }}</span>%</div>
                        <div class="water"></div>
                        <div class="glare"></div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-center mt-3 mb-2">Persentase Keseluruhan Proyek</p>
            </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
            <div class="card-header">
            <h6 class=" card-subtitle text-muted">PROJECT 'Budged'</h6>
            </div>
            <div class="card-body">                
                <figure class="highcharts-figure">
                    <div id="container-2"></div>
                </figure>
            </div>
            <div class="card-footer">
                <p class="text-center mt-3 mb-2">Anggaran dan Penggunaan</p>
            </div>
         </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h6 class=" card-subtitle text-muted">PROJECT 'Status'</h6></div>
        <div class="card-body">
        <figure class="highcharts-figure">
        <div id="bar-container"></div>
        </figure>
        </div>
    </div> 

    <div class="card">
        <div class="card-header"><h6 class=" card-subtitle text-muted">PROJECT Number 'By Plant'</h6></div>
        <div class="card-body">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>              
        </div>
    </div> 
</div>                   

@include('dashboard.rumus')

<script>
var colorInc = 100 / 3;

$(function()
{
  $("#percent-box").click(function()
  {
    $(this).select();
  });
  
  $(document).ready(function()
  {
    //var val = $(this).val();
	var val = <?=$hasil;?>
    
    if(val != ""
      && !isNaN(val)
      && val <= 100
      && val >= 0)
    {
      console.log(val);
      
      var valOrig = val;
      val = 100 - val;
      
      if(valOrig == 0)
      {
        $("#percent-box").val(0);
        $(".progress .percent").text(0 + "%");
      }
      else $(".progress .percent").text(valOrig + "%");
      
      $(".progress").parent().removeClass();
      $(".progress .water").css("top", val + "%");
      
      if(valOrig < colorInc * 1)
        $(".progress").parent().addClass("red");
      else if(valOrig < colorInc * 2)
        $(".progress").parent().addClass("orange");
      else
        $(".progress").parent().addClass("green");
    }
    else
    {
      $(".progress").parent().removeClass();
      $(".progress").parent().addClass("green");
      $(".progress .water").css("top", 100 - 0 + "%");
      $(".progress .percent").text(0 + "%");
      $("#percent-box").val("");
    }
  });
});
</script>

@endsection
