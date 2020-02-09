@extends('backend.layouts.app')

@section('content')

<div class="col-sm-12 col-xl-6">
<div class="card">
<div class="card-header"> Report</div>
<div class="card-body">
<div class="accordion" id="accordion" role="tablist">
<div class="card mb-0">
<div class="card-header" id="headingOne" role="tab">
<h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">Overview</a></h5>
</div>
<div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
<div class="card-body">
<h6> Name </h6>
                    <p class="mb-3">
                    {{ $report->name  }}
                    </p>

                    <p class="mb-3">
                    <h6> MIA Centre </h6>
                    {{ $report->mia_centre_name  }}
                    </p>

                    <p class="mb-3">
                    <h6> Date </h6>
                    {{ $report->updated_at  }}
                    </p>

                    <p class="mb-3">
                    <h6> Attendance </h6>
                    {{ $report->attendace  }}
                    </p>

                    <p class="mb-3">
                    <h6> Class Total </h6>
                    {{ $report->class_total  }}
                    </p>

                    <p class="mb-3">
                    <h6> MIA Course </h6>
                    {{ $report->mia_course  }}
                    </p>

                    <p class="mb-3">
                    <h6> Lesson Note </h6>
                    {{ $report->lesson_note  }}
                    </p>

</div>
</div>
</div>


<div class="card mb-0">
<div class="card-header" id="headingTwo" role="tab">
<h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Report</a></h5>
</div>
<div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
<div class="card-body">
<p class="mb-3">
                    <h6> Subject </h6>
                    {{ $report->subject  }}
                    </p>

                    <p class="mb-3">
                    <h6> Report Statement </h6>
                    {!! html_entity_decode ($report->report_statement) !!}
                    </p>

                    <p class="mb-3">
                    <h6> Challenges </h6>
                    {!! html_entity_decode ($report->challenges)  !!}
                    </p>

                    <p class="mb-3">
                    <h6> Suggestions </h6>
                    {!! html_entity_decode ($report->suggestions) !!}
                    </p>
</div>
</div>
</div>
</div>
</div>
@endsection

