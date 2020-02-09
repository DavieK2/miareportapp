@extends('backend.layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($classRegister->name) ? $classRegister->name : 'Class Register' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('class_registers.class_register.destroy', $classRegister->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('class_registers.class_register.index') }}" class="btn btn-primary" title="Show All Class Register">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('class_registers.class_register.create') }}" class="btn btn-success" title="Create New Class Register">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('class_registers.class_register.edit', $classRegister->id ) }}" class="btn btn-primary" title="Edit Class Register">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Class Register" onclick="return confirm(&quot;Click Ok to delete Class Register.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>
    

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $classRegister->name }}</dd>
            <dt>Gender</dt>
            <dd>{{ $classRegister->gender }}</dd>
            <dt>Class</dt>
            <dd>{{ $classRegister->class }}</dd>
            <dt>School</dt>
            <dd>{{ optional($classRegister->school)->name }}</dd>

        </dl>

    </div>
</div>

@endsection