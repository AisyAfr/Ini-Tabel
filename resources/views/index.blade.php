@extends('layouts.app')
@section('title','IniTabel')
@section('content')
@if (session()->has('login_message'))
<div class="position-relative">
  <div class="alert alert-warning alert-dismissible fade show js-alert position-absolute top-0 start-50 translate-middle" style="z-index: 6;" role="alert">
      {{ session()->get('login_message') }}
  </div> 
  @endif
<h1 class="mb-5 mt-3 text-black" style="text-align: center; font-size:50px">Ini<span style="color:rgb(255, 208, 0)">Tabel</span></h1>

<a href="{{url('create')}}"type="button" class="btn btn-primary mb-3">+ Tambah Data</a>
@php($number = 1)
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
      </tr>
    </thead>
    @foreach($posts as $p)
    <tbody>
      <tr>
        <th scope="row">{{$number}}</th>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->kelas }}</td>
        <td>
              <form action="{{url("$p->id/destroy")}}" method='POST'>
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" >     <i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
            </form>
          </td>
        <td><a href="{{url("$p->id/edit")}}" type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a></td>
      </tr>
      @php($number++)
      @endforeach
    </tbody>
  </table>
</div>
@endsection