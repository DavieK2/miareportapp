
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">School Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($school)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
    <label for="location" class="col-md-2 control-label">School Address</label>
    <div class="col-md-10">
        <input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($school)->location) }}" minlength="1" maxlength="255" placeholder="Enter School's Address here...">
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('phone_no') ? 'has-error' : '' }}">
    <label for="phone_no" class="col-md-2 control-label">Contact Information</label>
    <div class="col-md-10">
        <input class="form-control" name="phone_no" type="text" id="phone_no" value="{{ old('phone_no', optional($school)->phone_no) }}" minlength="1" maxlength="255" placeholder="Enter Contact Information here...">
        {!! $errors->first('phone_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>



