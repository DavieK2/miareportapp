@extends('backend.layouts.app')

@section('content')

<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Update Report     
                    </h4>
            </div>

            <div class="col">
                
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
            <form method="POST" action="{{ route('reports.report.update', $report->id) }}" id="edit_report_form" name="edit_report_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('reports.form', [
                                        'report' => $report,
                                      ])

         </div><!--col-->
        </div><!--form-group-->

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
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