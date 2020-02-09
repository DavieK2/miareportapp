@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new File</div>

                <div class="card-body">

                    <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        Title:
                        <br>
                        <input type="text" name="title" class="form-control">

                        <br>

                        File:
                        <br>
                        <input type="file" name="file">

                        <br><br>

                        <input type="submit" value=" Upload " class="btn btn-primary">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection