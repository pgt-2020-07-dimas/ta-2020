@extends('layouts.app', [
    'namePage' => 'Rating Proyek',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'histori_proyek',
   
])
@section('content') 
<div class="content ">       
<div class="card ">
    <div class="card-header">
        <h5 class="title  mt-3">Beri Rating Proyek</h5>
    </div>
    <div class="col-md-4">
    <div class="card-body mt-2 ml-2">
    <table class="table table-borderless">
        <tr>
            <td><h6 class="card-subtitle text-muted">{{__(" Perusahaan")}}</h6></td>
            <td><h6 class="card-subtitle text-muted">&nbsp;{{__(":")}}&nbsp;</h6></td>
            <td><h6 class="card-subtitle text-muted">{{ $contraktor->name }}</h6></td>
        </tr>
        <tr>
            <td><h6 class="card-subtitle text-muted">{{__(" No Proyek")}}</h6></td>
            <td><h6 class="card-subtitle text-muted">&nbsp;{{__(":")}}&nbsp;</h6></td>
            <td><h6 class="card-subtitle text-muted">{{  $proyek->project_no }}</h6></td>
        </tr>
        <tr>
            <td><h6 class="card-subtitle text-muted">{{__(" Alamat")}}</h6></td>
            <td><h6 class="card-subtitle text-muted">&nbsp;{{__(":")}}&nbsp;</h6></td>
            <td><h6 class="card-subtitle text-muted">{{ $contraktor->alamat }}</h6></td>
    </tr>
    </table>
    </div>
    </div>


    <form method="post" action="/histori/rating" autocomplete="off" enctype="multipart/form-data">  
        @csrf     
        @include('alerts.success')
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                <td scope="col"><h6>No.</h6></td>
                <td scope="col"><h6>Aspek Kinerja</h6></td>
                <td class="text-center" scope="col"><h6>Indikator</h6></td>
                <td class="text-center" scope="col"><h6>Bobot (%)</h6></td>
                <td class="text-center" scope="col"><h6>Nilai</h6></td>
                </tr>
            </thead>
            <tbody>
            <!--No.1-->
                <tr>
                <th>1</th>
                <td ><h6 class="card-subtitle text-muted">Administrasi (10%)</h6></td>
                <td> Ketaatan dan kelengkapan dalam memenuhi Administrasi Persyaratan Kerja Kontraktor (Banner, JSEA, SIB, Perizinan, Papan Proyek, dll). Serta mengikuti Safety Induction</td>
                <td class="text-center">2%</td>
                <td class="">
                    <select class="badge-pill" name="a1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Ketaatan dan kelengkapan dalam memenuhi Administrasi Pekerjaan sesuai Kontrak (Time Schedule, Shop Drawing, Asbuilt Drawing, LaporanLaporan).</td>
                <td class="text-center">3%</td>
                <td class="">
                    <select class="badge-pill" name="a2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Kelengkapan Kantor Administrasi: Surat Jalan, Approval Material.</td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="a3"  required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

            <!--No.2-->
                <tr>
                <th>2</th>
                <td><h6 class="card-subtitle text-muted">Jadwal dan Waktu (25%)</h6></td>
                <td> Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam Kontrak.</td>
                <td class="text-center">10%</td>
                <td class="">
                    <select class="badge-pill" name="b1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Progress/Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan. (Termasuk jika terdapat pekerjaan yang dilakukan saat service tidak terlambat melakukan start up)</td>
                <td class="text-center">15%</td>
                <td class="">
                    <select class="badge-pill" name="b2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

            <!--No.3-->
                <tr>
                <th>3</th>
                <td><h6 class="card-subtitle text-muted">Kualitas dan Kuantitas (20%)</h6></td>
                <td> Uji Fungsi/Test/Uji Teknis/Kesesuaian Teknis dilaksanakan sesuai Kontrak.</td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="c1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Kualitas dan Kuantitas Pekerjaan sesuai dengan Spesifikasi Teknis. Tidak ada kebocoran, dll</td>
                <td class="text-center">15%</td>
                <td class="">
                    <select class="badge-pill" name="c2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>
            
             <!--No.4-->
             <tr>
                <th>4</th>
                <td ><h6 class="card-subtitle text-muted">Material (20%)</h6></td>
                <td> Material yang digunakan sesuai dengan Spesifikasi Teknis</td>
                <td class="text-center">10%</td>
                <td class="">
                    <select class="badge-pill" name="d1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Pengiriman dan Ketersediaan Material selama Pelaksanaan Pekerjaan terpenuhi.</td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="d2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Penyimpanan material aman dan tidak ada kehilangan.</td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="d3" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

            <!--No.5-->
                <tr>
                <th>5</th>
                <td><h6 class="card-subtitle text-muted">Tenaga Kerja dan Peralatan (15%)</h6></td>
                <td> Jumlah Tenaga kerja dan peralatan selama Waktu Pelaksanaan pekerjaan terpenuhi sesuai dengan jenis dan beban pekerjaan. Kemampuan/Keahlian tenaga kerja sesuai dengan jenis dan beban pekerjaan</td>
                <td class="text-center">10%</td>
                <td class="">
                    <select class="badge-pill" name="e1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Kapasitas dan Jenis Peralatan sesuai dengan jenis dan beban pekerjaan</td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="e2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

            <!--No.6-->
                <tr>
                <th>6</th>
                <td><h6 class="card-subtitle text-muted">Keselamatan dan Kesehatan Kerja (5%)</h6></td>
                <td> Kelengkapan K3 selama Pelaksanaan Pekerjaan terpenuhi: Peralatan, Bahan, Pakaian, Sepatu, Helm, Rambu-rambu, Alat Pengaman, dan Catatan kejadian. </td>
                <td class="text-center">5%</td>
                <td class="">
                    <select class="badge-pill" name="f1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

            <!--No.7-->
                <tr>
                <th>7</th>
                <td><h6 class="card-subtitle text-muted">Lingkungan (5%)</h6></td>
                <td> Menjaga kebersihan area selama bekerja maupun sesudah bekerja</td>
                <td class="text-center">2%</td>
                <td class="">
                    <select class="badge-pill" name="g1" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>

                <tr>
                <th></th>
                <td></td>
                <td> Tidak ada Komplain/Permasalahan dengan Lingkungan sekitar</td>
                <td class="text-center">3%</td>
                <td class="">
                    <select class="badge-pill" name="g2" required>
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                 
                    </select>
                </td>
                </tr>
            
            </tbody>
        </table>
    </div>
    </div>
        <input type="hidden" name="kontraktor" class="" value="{{ $contraktor->id }}">
        <div class="card-footer mb-4">
            <div class="text-left col-sm-4 ml-4">
                <textarea class="form-control" placeholder="Masukan Komentar....." name="deskripsi id="" cols="30" rows="10"></textarea>
            </div>
            <div class="text-right mt-2">
            <button type="submit" name="submit" class="btn btn-primary btn-round">{{__('Simpan')}}</button>
                <a href="/histori/" class="btn btn-info mr-3 btn-round">Kembali</a>
            </div> 
    </div>  
    </form>                    
</div> 
</div>
          


@endsection
