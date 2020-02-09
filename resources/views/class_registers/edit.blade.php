@extends('backend.layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    {{ !empty($classRegister->name) ? $classRegister->name : 'Update Student Information' }}      
                    </h4>
            </div>


        <div class="col-sm-7 pull-right">
                <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('class_registers.class_register.index') }}"
                 class="btn btn-primary"  title="Show All Schools">
                 <i class="fas fa-eye"></i>
                 </a>

                 <a href="{{ route('class_registers.class_register.create') }}"
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
            <form method="POST" action="{{ route('class_registers.class_register.update', $classRegister->id) }}" id="edit_class_register_form" name="edit_class_register_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('class_registers.form', [
                                        'classRegister' => $classRegister,
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