@extends('backend.layouts.app')

@section('content')

    <<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Update School Information      
                    </h4>
            </div>


        <div class="col-sm-7 pull-right">
                <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('schools.school.index') }}"
                 class="btn btn-primary"  title="Show All Schools">
                 <i class="fas fa-eye"></i>
                 </a>

                 <a href="{{ route('schools.school.create') }}"
                 class="btn btn-success" title="Create New School">
                 <i class="fas fa-plus-circle"></i>
                 </a>
            </div><!--btn-toolbar-->
            </div><!--row-->
        </div><!--row-->



        <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="col-md-10">
            <form method="POST" action="{{ route('schools.school.update', $school->id) }}" id="edit_school_form" name="edit_school_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('schools.form', [
                                        'school' => $school,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection