@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form method="POST" action="{{ route('masyarakat.update', $masyarakat->id) }}">
                @csrf
                <h3>Register Masyarakat</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$masyarakat->name }}">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nik" class="form-control" id="nik" placeholder="nik" value="{{$masyarakat->nik }}">
                    <label for="nik">NIK</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{{$masyarakat->nik}}">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tlpn" class="form-control" id="tlpn" placeholder="telpon" value="{{$masyarakat->tlpn}}">
                    <label for="tlpn">Telpon</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                    <label for="password">Password</label>
                </div>
                   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>  
</div>
@endsection