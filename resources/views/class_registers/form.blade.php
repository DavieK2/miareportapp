
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($classRegister)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
    <label for="gender" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">
        <select class="form-control" id="gender" name="gender">
        	    <option value="" style="display: none;" {{ old('gender', optional($classRegister)->gender ?: '') == '' ? 'selected' : '' }} disabled selected>Select gender</option>
        	@foreach (['male' => 'Male',
'female' => 'Female'] as $key => $text)
			    <option value="{{ $key }}" {{ old('gender', optional($classRegister)->gender) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
    <label for="class" class="col-md-2 control-label">Class</label>
    <div class="col-md-10">
        <input class="form-control" name="class" type="text" id="class" value="{{ old('class', optional($classRegister)->class) }}" minlength="1" placeholder="Enter class here...">
        {!! $errors->first('class', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('school_id') ? 'has-error' : '' }}">
    <label for="school_id" class="col-md-2 control-label">School</label>
    <div class="col-md-10">
        <select class="form-control" id="school_id" name="school_id">
        	    <option value="" style="display: none;" {{ old('school_id', optional($classRegister)->school_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select school</option>
        	@foreach ($schools as $key => $school)
			    <option value="{{ $key }}" {{ old('school_id', optional($classRegister)->school_id) == $key ? 'selected' : '' }}>
			    	{{ $school }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('school_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

