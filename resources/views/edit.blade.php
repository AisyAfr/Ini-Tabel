@extends('layouts.app')
@section('title','MyTable')
@section('content')

<h1 class="mb-3 mt-3 text-warning" style="text-align: center;">Edit Datamu!</h1>
<div class="container">
    <form method="POST" action='{{url("/$p->id")}}'>
        @csrf
        @method('PATCH')
    <div class="mb-3">
        <label  for="nama" class="form-label text-black">Nama</label>
        <input type="text" class="form-control p-3" id="nama" name="nama" value="{{$p->nama}}" required>
      </div>
      <div class="mb-3">
        <label  for="kelas" class="form-label text-black">Kelas</label>
        <textarea  class="form-control" id="content" rows="1" name="kelas" value="{{$p->kelas}}" required>{{$p->kelas}}</textarea>
      </div>
      <button type="submit" class="btn btn-warning mt-5">Update</button>
    </form>
</div>
@endsection 
