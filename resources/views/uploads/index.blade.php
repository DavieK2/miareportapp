@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uploads</div>

                <div class="card-body">

                    <a href="{{ route('uploads.create') }}" class="btn btn-primary">Add New File</a>
                    <br /><br />

                    <table class="table" id="table_name">
                        <tr>
                            <th>Title</th>
                            <th>Download file</th>
                            <th>Delete</th>
                        </tr>
                        @forelse ($uploads as $upload)
                            <tr>
                                <td>{{ $upload->title }}</td>
                                <td><a href="{{ route('uploads.download', $upload->uuid) }}">{{ $upload->file }}</a></td>
                                <td>

                                <form method="POST" action="{!! route('upload.destroy', $upload->uuid) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">

                                        <button type="submit" class="btn btn-danger" title="Delete Report" onclick="return confirm(&quot;Click Ok to delete Report.&quot;)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No files found.</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('stylesdata')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready( function () {
    $('#table_name').DataTable();
} );
  </script>
  
@endsection