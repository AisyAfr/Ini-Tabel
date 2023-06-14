@extends('layouts.app')
@section('title','Login')
@section('content')

<div class="row">
    @if (session()->has('error_message'))
                  <div class="">
                          <div class="alert alert-danger alert-dismissible fade show js-alert position-absolute"  role="alert">
                              {{ session()->get('error_message') }}
                          </div>
                  </div>
                      @elseif(session()->has('logout_message'))
                      <div class="">
                          <div class="alert alert-danger alert-dismissible fade show js-alert position-absolute"  role="alert">
                              {{ session()->get('logout_message') }}
                          </div>
                      </div>
                  @endif
      <div class="col-md-4 mx-auto">
          <div class="card mt-5 mb-5 bg-info-subtle">
    <h5 class="card-header text-center bg-dark text-white">Login</h5>
          <div class="card-body bg-warning">
              <form method="POST" action="{{url('login')}}">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old($email)}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                  </div>
                  <div class="text-center">
                  <button type="submit" class="btn btn-primary">Login</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
  @endsection