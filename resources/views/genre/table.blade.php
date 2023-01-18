@extends('layouts/master')

@section('judul')
Table Data Genre
@endsection

@push('script')
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush

@push('style')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@section('content')
    <a href="/genre/create" class="btn btn-primary btn-sm my-2">Add Genre</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th class="col-sm-2">Id Genre</th>
              <th>Name</th>
              <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($genre as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                        <form action="/genre/{{$item->id}}" method="POST">
                            <a href="/genre/{{$item->id}}/edit" type="button" class="btn btn-success">Update</a>
                            <a href="/genre/{{$item->id}}" type="button" class="btn btn-info">Detail</a>
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data?')">
                        </form>
                    </td>
                    </tr>
                @empty
                <h1>Empty Data Genre</h1>
                @endforelse
            </tbody>
        </table>
@endsection