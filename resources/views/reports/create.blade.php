@extends('backend.layouts.app')

@section('content')

<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Create a New Report     
                    </h4>
            </div>
        </div>

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
            <form method="POST" action="{{ route('reports.report.store') }}" accept-charset="UTF-8" id="create_report_form" name="create_report_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('reports.form', [
                                        'report' => null,
                                      ])
        </div><!--col-->
         </div><!--form-group-->

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection

