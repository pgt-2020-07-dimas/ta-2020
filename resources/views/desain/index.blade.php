@extends('layouts.app', [
    'namePage' => 'Drawing',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'detail_proyek',
   
])

@section('content')        
<div class="card ">
  <div class="card-header">Upload Desain</div>              
    <div class="card-body">
        <div class="row">
        <div class="col-lg-12 text-right">        
            <form action="/drawing" method="post" enctype="multipart/form-data" >
                @csrf
                <input class="pt-2 @error('drawing[]') is-invalid @enderror" type="file" accept="image/*" name="drawing[]" multiple="true" title="Klik untuk memilih file">
                @error('drawing') <div class="invalid-feedback">{{ $message }}</div>@enderror
                <input type="hidden" value="{{$id}}" name="project_id" required>
                <button type="submit" class="btn btn-sm btn-primary btn-round">Upload</button>
            </form>
            <hr>
            <div class="row mt-2">
            @if(count($drawing)<>null)
            @foreach($drawing as $d)     
            @php
              $path = str_replace('public','storage',$d->path);
              $imgName = str_replace('storage/drawing/','',$path);
            @endphp           
                <div class="col-sm-3">
                    <div class="card">
                        <form action="/drawing/{{$d->id}}" method="POST">
                            <div class="card-body">                                
                                 <div class="text-center">
                                    <img id="thumbnail" class="img-thumbnail" src="{{asset($path)}}" style="height:12em">
                                    <br>
                                    <label class="card-title">{{$d->name}}</label>                                
                                    <input type="hidden" value="{{$d->project_id}}" name="project_id">
                                    <input type="hidden" value="{{$d->id}}" name="id">
                                    @method('delete')
                                    @csrf                                        
                                </div>                                                                
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button class="btn btn-sm btn-danger btn-round" title="Hapus Foto" onclick="return confirm('Yakin Ingin Menghapus?')" type="submit">
                                        Hapus<i class="glyphicon glyphicon-trash"></i>
                                    </button>   
                                  </div> 
                            </div>
                        </form> 
                    </div>
                </div>
              @endforeach
              @else 
              <div class="col-sm-12 my-3 py-2 text-center">
                Belum ada file yang ditambahkan
              </div>
              @endif
            </div>            
        </div>
    </div>
</div>

</div>         
@endsection
