@extends('layouts/master')

@section('judul')
All Comment
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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th class="col-sm-1">No</th>
              <th>Comment</th>
              <th class="col-sm-1">Point</th>
              <th class="col-sm-2">Action</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($comment as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->point}}</td>
                        <td>
                        <form action="/comment/{{$item->id}}" method="POST">
                            <a href="/comment/{{$item->id}}" type="button" class="btn btn-info">Detail</a>
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data?')">
                        </form>
                    </td>
                    </tr>
                @empty
                <h1>There is no Comment</h1>
                @endforelse
            </tbody>
        </table>
@endsection