@extends('layouts.app')

@section('content')
<!-- icon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

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
       <a href="{{route('user.create')}}" class="btn btn-md btn-success mx-1 shadow"><i class="fa fa-lg fa-fw fa-plus"></i> Tambah User</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
               <thead style="background-color: darkgray">
                   <tr>
                       <th>nik</th>
                       <th>name</th>
                       <th>usernama</th>
                       <th>password</th>
                       <th>telpon</th>
                       <th>Level</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($masyarakat as $masyarakat)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$masyarakat->name}}</td>
                       <td>{{$masyarakat->username}}</td>
                       <td>{{$masyarakat->password}}</td>
                       <td>{{$masyarakat->telpon}}</td>
                       <td>{{$user->level}}</td>
                       </td>
                           <td>
                           <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-primary" title="edit"><i class="fa-solid fa-pen"></i></a>
                           <form action="{{ route('user.delete', $user->id) }}" 
                            method="post" class="d-inline">
                             @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                         </form>
                           </td>
                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>