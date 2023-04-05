@extends('layouts.app')
@section('title','MyTable')
@section('content')


<h1 class="mb-3 mt-3 text-primary" style="text-align : center">Tambahkan Datamu!</h1>
    <form method="POST" action="{{url('/')}}" >
        @csrf
    <div class="mb-3">
        <label  for="title" class="form-label text-dark">Nama</label>
        <input type="text" class="form-control p-3" id="nama" name="nama" placeholder="Tulis Namanya!" required>
      </div>
      <div class="mb-3">
        <label  for="content" class="form-label text-dark">Kelas</label>
        <textarea class="form-control" id="kelas" rows="1" name="kelas" placeholder="Tambahkan kelasnya!" required></textarea>
      <button type="submit" class="btn btn-primary mt-5">Tambahkan</button>
    </form>


@endsection