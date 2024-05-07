@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      <form action="{{ url('students') }}" method="post">
        {!! csrf_field() !!}
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{old ('name')}}"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{old('mobile')}}"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>

 
@stop