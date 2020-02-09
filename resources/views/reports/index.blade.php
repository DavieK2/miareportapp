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
                Reports
                </h4>
             </div><!--col-->

             <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                 <a href="{{ route('reports.report.create') }}" 
                 class="btn btn-success ml-1" data-toggle="tooltip" title="" data-original-title="Create New"><i class="fas fa-plus-circle"></i>
                 </a>
            </div><!--btn-toolbar-->
            </div><!--row-->
        </div><!--row-->
        
        @if(count($reports) == 0)
            <div class="panel-body text-center">
                <h4>No Reports Available.</h4>
            </div>
        @else
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>MIA Centre</th>
                            <th>Submitted</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->mia_centre_name }}</td>
                            <td>{{ $report->updated_at->diffForHumans() }}</td>

                            <td>

                                <form method="POST" action="{!! route('reports.report.destroy', $report->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                     <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('reports.report.show', $report->id ) }}" class="btn btn-info" title="Show Report">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('reports.report.edit', $report->id ) }}" class="btn btn-primary" title="Edit Report">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Report" onclick="return confirm(&quot;Click Ok to delete Report.&quot;)">
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
            {!! $reports->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection