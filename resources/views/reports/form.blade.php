
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($report)->name) }}" minlength="1" maxlength="255" placeholder="Enter Full Name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mia_centre_name') ? 'has-error' : '' }}">
    <label for="mia_centre_name" class="col-md-2 control-label">MIA Centre</label>
    <div class="col-md-10">
        <input class="form-control" name="mia_centre_name" type="text" id="mia_centre_name" value="{{ old('mia_centre_name', optional($report)->mia_centre_name) }}" minlength="1" maxlength="255" placeholder="Enter MIA Centre here...">
        {!! $errors->first('mia_centre_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date-input" type="date" id="date-input" value="{{ old('date', optional($report)->date) }}" minlength="1" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('attendace') ? 'has-error' : '' }}">
    <label for="attendace" class="col-md-2 control-label">Attendace</label>
    <div class="col-md-10">
        <input class="form-control" name="attendace" type="number" id="attendace" value="{{ old('attendace', optional($report)->attendace) }}" min="1" max="2147483647" placeholder="Enter attendace here...">
        {!! $errors->first('attendace', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('class_total') ? 'has-error' : '' }}">
    <label for="class_total" class="col-md-2 control-label">Class Total</label>
    <div class="col-md-10">
        <input class="form-control" name="class_total" type="number" id="class_total" value="{{ old('class_total', optional($report)->class_total) }}" min="1" max="2147483647" placeholder="Enter class total here...">
        {!! $errors->first('class_total', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mia_course') ? 'has-error' : '' }}">
    <label for="mia_course" class="col-md-2 control-label">Mia Course</label>
    <div class="col-md-10">
        <select class="form-control" id="mia_course" name="mia_course">
        	    <option value="" style="display: none;" {{ old('mia_course', optional($report)->mia_course ?: '') == '' ? 'selected' : '' }} disabled selected>Select mia course</option>
        	@foreach (['MOS Word 2016' => 'MOS Word 2016',
'MOS Excel 2016' => 'MOS Excel 2016',
'MOS Access 2016' => 'MOS Access 2016',
'MOS Powerpoint 2016' => 'MOS Powerpoint 2016'] as $key => $text)
			    <option value="{{ $key }}" {{ old('mia_course', optional($report)->mia_course) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('mia_course', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('lesson_note') ? 'has-error' : '' }}">
    <label for="lesson_note" class="col-md-2 control-label">Lesson Note</label>
    <div class="col-md-10">
        <input class="form-control" name="lesson_note" type="text" id="lesson_note" value="{{ old('lesson_note', optional($report)->lesson_note) }}" minlength="1" placeholder="Enter lesson note here...">
        {!! $errors->first('lesson_note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
    <label for="subject" class="col-md-2 control-label">Subject</label>
    <div class="col-md-10">
        <input class="form-control" name="subject" type="text" id="subject" value="{{ old('subject', optional($report)->subject) }}" minlength="1" maxlength="255" placeholder="Enter subject here...">
        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('report_statement') ? 'has-error' : '' }}">
    <label for="report_statement" class="col-md-2 control-label">Report Statement</label>
    <div class="col-md-10">
        <textarea class="form-control" name="report_statement" cols="50" rows="10" id="summernote" minlength="1" placeholder="Enter report statement here...">{{ old('report_statement', optional($report)->report_statement) }}</textarea>
        {!! $errors->first('report_statement', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('challenges') ? 'has-error' : '' }}">
    <label for="challenges" class="col-md-2 control-label">Challenges</label>
    <div class="col-md-10">
        <textarea class="form-control" name="challenges" cols="50" rows="10" id="summernote" minlength="1" placeholder="Enter challenges here...">{{ old('challenges', optional($report)->challenges) }}</textarea>
        {!! $errors->first('challenges', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('suggestions') ? 'has-error' : '' }}">
    <label for="suggestions" class="col-md-2 control-label">Suggestions</label>
    <div class="col-md-10">
        <textarea class="form-control" name="suggestions" cols="50" rows="10" id="summernote" minlength="1" placeholder="Enter suggestions here...">{{ old('suggestions', optional($report)->suggestions) }}</textarea>
        {!! $errors->first('suggestions', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

</div>