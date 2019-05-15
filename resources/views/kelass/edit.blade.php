@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')

  <div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif
    <form
      action="{{route('kelass.update', ['id' => $kelas->id])}}"
      enctype="multipart/form-data"
      method="POST"
      class="bg-white shadow-sm p-3"
      >

      @csrf

      <input
        type="hidden"
        value="PUT"
        name="_method">

        <label>Kelas name</label><br>
        <input
          type="text"
          class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"
          value="{{old('name')}}"
          name="name">
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
        <label>Tahun ajar Kelas</label><br>
        <input
          type="text"
          class="form-control {{$errors->first('thnajar') ? "is-invalid" : ""}}"
          value="{{old('thnajar')}}"
          name="thnajar">
          <label>Tingkat Kelas</label><br>
          <input
            type="text"
            class="form-control {{$errors->first('tingkat') ? "is-invalid" : ""}}"
            value="{{old('tingkat')}}"
            name="tingkat">
      <br><br>

      <input type="submit" class="btn btn-primary" value="Update">

    </form>
  </div>
@endsection
