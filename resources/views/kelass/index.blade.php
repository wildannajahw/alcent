@extends('layouts.global')

@section('title') Category list @endsection

@section('content')
<div class="row col-sm-12">
    <div class="col-sm-6">
      <form action="{{route('kelass.index')}}">

        <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Filter by category name"
              value="{{Request::get('name')}}"
              name="name">

            <div class="input-group-append">
              <input
                type="submit"
                value="Filter"
                class="btn btn-primary">
            </div>
        </div>
      </form>
    </div>
    <div class="col-sm-6 text-right">
        <a href="{{route('kelass.create')}}" class="btn btn-primary">Create kelas</a>
    </div>
</div>
<br><br>
<br>
<div class="col-sm-12">
  <table class="table table-bordered table-stripped">
    <thead>
      <tr>
        <th><b>Name</b></th>
        <th><b>Tingkat</b></th>
        <th><b>Tahun Ajar</b></th>
        <th><b>Actions</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kelass as $kelas)
        <tr>
          <td>{{$kelas->name}}</td>
          <td>{{$kelas->tingkat}}</td>
          <td>{{$kelas->thnajar}}</td>
          <td>
            <a
              href="{{route('kelass.edit', ['id' => $kelas->id])}}"
              class="btn btn-info btn-sm"> Edit </a>
            <a
              href="{{route('kelass.show', ['id' => $kelas->id])}}"
              class="btn btn-primary btn-sm"> Show </a>
            <form
              class="d-inline"
              action="{{route('kelass.destroy', ['id' => $kelas->id])}}"
              method="POST"
              onsubmit="return confirm('Move category to trash?')"
              >
              @csrf
              <input
                type="hidden"
                value="DELETE"
                name="_method">
              <input
                type="submit"
                class="btn btn-danger btn-sm"
                value="Trash">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colSpan="10">
          {{$kelass->appends(Request::all())->links()}}
        </td>
      </tr>
    </tfoot>
  </table>
</div>
{{--
  <div class="row">
    <div class="col-md-6">
      <form action="{{route('kelass.index')}}">

        <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Filter by category name"
              value="{{Request::get('name')}}"
              name="name">

            <div class="input-group-append">
              <input
                type="submit"
                value="Filter"
                class="btn btn-primary">
            </div>
        </div>

      </form>
    </div>

    <div class="col-md-6">
      <ul class="nav na<div class="col-md-6">
      <form action="{{route('kelass.index')}}">

        <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Filter by category name"
              value="{{Request::get('name')}}"
              name="name">

            <div class="input-group-append">
              <input
                type="submit"
                value="Filter"
                class="btn btn-primary">
            </div>
        </div>

      </form>
    </div>

    <div class="col-md-6">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('kelass.index')}}">Published</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </div>

  <hr class="my-3">

  @if(session('status'))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-warning">
          {{session('status')}}
        </div>
      </div>
    </div>
  @endif

  <div class="">
    <div class="col-md-12 text-right">
      <a href="{{route('kelass.create')}}" class="btn btn-primary">Create kelas</a>
    </div>
  </div>
  <br>v-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link active" href="{{route('kelass.index')}}">Published</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>

  </div>

  <hr class="my-3">

  @if(session('status'))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-warning">
          {{session('status')}}
        </div>
      </div>
    </div>
  @endif

  <div class="">
    <div class="col-md-12 text-right">
      <a href="{{route('kelass.create')}}" class="btn btn-primary">Create kelas</a>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th><b>Name</b></th>
            <th><b>Tingkat</b></th>
            <th><b>Tahun Ajar</b></th>
            <th><b>Actions</b></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($kelass as $kelas)
            <tr>
              <td>{{$kelas->name}}</td>
              <td>{{$kelas->tingkat}}</td>
              <td>{{$kelas->thnajar}}</td>

              <td>
                <a
                  href="{{route('kelass.edit', ['id' => $kelas->id])}}"
                  class="btn btn-info btn-sm"> Edit </a>

                <a
                  href="{{route('kelass.show', ['id' => $kelas->id])}}"
                  class="btn btn-primary btn-sm"> Show </a>

                <form
                  class="d-inline"
                  action="{{route('kelass.destroy', ['id' => $kelas->id])}}"
                  method="POST"
                  onsubmit="return confirm('Move category to trash?')"
                  >

                  @csrf

                  <input
                    type="hidden"
                    value="DELETE"
                    name="_method">

                  <input
                    type="submit"
                    class="btn btn-danger btn-sm"
                    value="Trash">

                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colSpan="10">
              {{$kelass->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>

      </table>
    </div>
  </div> --}}
@endsection
