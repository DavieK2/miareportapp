@extends('backend.layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-sm-5">
                <h4 class="card-title mb-0">
                {{ !empty($school->name) ? $school->name : '' }}
                </h4>
             </div><!--col-->
        


            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                 <a href="{{ route('class_registers.class_register.create') }}"
                 class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><i class="fas fa-plus-circle"></i>
                 </a>
            </div><!--btn-toolbar-->
            </div><!--row-->
        </div><!--row-->
        
        @if(count($classRegisters) == 0)
        <div class="row mt-4">
            <div class="col">
            <div class="table-responsive text-center">
                <h4>No Data Available.</h4>
            </div>
        @else
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>School</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classRegisters as $classRegister)
                        <tr>
                            <td>{{ $classRegister->name }}</td>
                            <td>{{ $classRegister->gender }}</td>
                            <td>{{ $classRegister->class }}</td>
                            <td>{{ optional($classRegister->school)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('class_registers.class_register.destroy', $classRegister->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                        
                                        <a href="{{ route('class_registers.class_register.edit', $classRegister->id ) }}" class="btn btn-primary" title="Edit Class Register">
                                        <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Class Register" onclick="return confirm(&quot;Click Ok to delete Class Register.&quot;)">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $classRegisters->render() !!}
        </div>
        
        @endif
    
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
    $('#table_id').DataTable();
} );
  </script>
  
@endsection