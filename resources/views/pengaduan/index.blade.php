@extends('layouts.app')
@section('content')
    <h1 class="m-0 text-dark">Pengaduan</h1>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <div theme="success" title="Sukses">
               {{session('status')}}
            </div>
       @endif
       @if ($errors->any())
           <div theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
            </div>
       @endif
       <a href="{{route('pengaduan.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah Pengaduan</a> 
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_pengaduan" class="table table-striped table-hover table-condensed table-bordered">
               <thead style="background-color: darkgrey">
                   <tr>
                       <th>Tanggal_pengaduan</th>
                       <th>Nama</th>
                       <th>Isi_Laporan</th>
                       <th>Tgl_tanggapan</th>
                       <th>Tanggapan</th>
                       <th>Nama_petugas</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($pengaduan as $pengaduan)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$pengaduan->Tgl_pengaduan}}</td>
                       <td>{{$pengaduan->Nama}}</td>
                       <td>{{$pengaduan->isi_laporan}}</td>
                       <td>{{$pengaduan->Tgl_tanggapan}}</td>
                       <td>{{$pengaduan->Tanggapan}}</td>
                       <td>{{$pengaduan->Nama_petugas}}</td>
                           <td>
                               <a href="{{route('pengaduan.edit',$pengaduan->id)}}" class="btn btn-md btn-primary" title="Edit"><i class="fa-solid fa-edit"></i></a>
                                   <div class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapususer{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger">
                                       {{-- Custom --}}
                                   <div-modal id="hapuspengaduan{{$loop->iteration}}" title="Hapus Pengaduan" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('pengaduan.delete',$pengaduan->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus user ini?</div>
                                   <x-slot name="footerSlot">
                                       <div type="submit" class="mr-auto" theme="danger" label="Hapus">
                                       <div theme="primary" label="Batal" data-dismiss="modal">
                                       </form>
                                   </x-slot>
                                </div>
                           </td>
                

                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>


@stop
@section('plugins.Datatables', true)
@section('js')
   <script> $('#tabel_user').DataTable();</script>
@stop