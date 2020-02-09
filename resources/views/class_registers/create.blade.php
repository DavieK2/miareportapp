@extends('backend.layouts.app')

@section('content')


<div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-sm-5">
                <h4 class="card-title" style="padding-left: 15px;">
                    
                Create a Student Information 
                </h4>
             </div><!--col-->
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
            <form method="POST" action="{{ route('class_registers.class_register.store') }}" accept-charset="UTF-8" id="create_class_register_form" name="create_class_register_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('class_registers.form', [
                                        'classRegister' => null,
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


