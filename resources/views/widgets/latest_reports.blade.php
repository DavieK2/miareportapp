<div class="row">
<div class="col-sm-6 col-md-4">
<div class="card">
<div class="card-header">My Account</div>
<div class="card-body">

<img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">
    <h4 class="card-title">
        {{ $logged_in_user->name }}<br/>
    </h4>

    <p class="card-text">
        <small>
            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
            <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
        </small>
    </p>

    <p class="card-text">

        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
            <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
        </a>
    </p>
</div>
</div>
</div>


<div class="col-sm-6">
<div class="card">
<div class="card-header">Latest Reports</div>
<div class="card-body">
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>

    <p class="card-text">
        <a href="{{ route('reports.report.index')}}" class="btn btn-info btn-sm mb-1">
            <i class="fas fa-eye"></i> View Reports
        </a>
    </p>
    </div>
        </div>

        <div class="panel-footer">
            {!! $reports->render() !!}
        </div>
        @endif       
        </div>  
    </div>
</div>

















