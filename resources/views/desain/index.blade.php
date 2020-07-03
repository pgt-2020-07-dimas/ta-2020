@extends('layouts.app', [
    'namePage' => 'Drawing',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
      <div class="card ">
    <div class="card-header">Upload Desain</div>    
    
    <!-- <div class="row">
          <div class="col-lg-12"> 
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <em>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{!! $error !!}</li>
                  @endforeach
                </ul>
              </em>
            </div>
            @endif
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              <i class="glyphicon glyphicon-ok"></i> <em> {!! session('flash_message') !!}</em>
              </div>
              @endif
            </div>
          </div> -->
          
<div class="card-body">
    <div class="row">
    <div class="col-lg-12">
        <a class="btn btn-sm btn-success modalMd" href="/drawing/{{$project_id}}/file/create" title="Upload Foto"><span class="glyphicon glyphicon-upload"></span> Upload Foto</a>
        <div class="row mt-2">
            @foreach($file as $drawing)
            <div class="col-sm-3 mt-3">
                <div class="thumbnail">
                    <a href="/images/{{$drawing->path}}" class="" target="_blank">
                    {{ Html::image('images/'.$drawing->path,$drawing->name) }}
                    </a>
                    <div class="caption">
                        <h5>{{ $drawing->name }}</h5>
                        <form action="{{ action('DrawingController@destroy',[$project_id, $drawing->id]) }}" method="POST">
                        @method('delete')
                        @csrf  
                            <button class="badge btn-danger" title="Hah5us Foto" onclick="return confirm('Yakin Ingin Menghapus?')" type="submit">
                                Hapus Foto <i class="glyphicon glyphicon-trash"></i>
                            </button>   
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>
</div>

</div>         
@endsection
