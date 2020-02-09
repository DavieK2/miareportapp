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
                MIA Centre List
                </h4>
             </div><!--col-->
        


            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                 <a href="{{ route('schools.school.create') }}" 
                 class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><i class="fas fa-plus-circle"></i>
                 </a>
            </div><!--btn-toolbar-->
            </div><!--row-->
        </div><!--row-->
        
        @if(count($schools) == 0)
        <div class="row mt-4">
            <div class="col">
            <div class="table-responsive text-center">
                <h4>No School Available.</h4>
            </div>
        @else
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>School's Address</th>
                            <th>Contact Information</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{ $school->name }}</td>
                            <td style=" white-space:normal;" >{{ $school->location }}</td>
                            <td>{{ $school->phone_no }}</td>

                            <td>

                                <form method="POST" action="{!! route('schools.school.destroy', $school->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        
                                        <a href="{{ route('schools.school.edit', $school->id ) }}" class="btn btn-primary" title="Edit School">
                                        <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete School" onclick="return confirm(&quot;Click Ok to delete School.&quot;)">
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
            {!! $schools->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection