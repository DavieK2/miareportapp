<div class="col-sm-6">
<div class="card">
<div class="card-header">Latest uploads</div>
<div class="card-body">
@if(count($uploads) == 0)
            <div class="panel-body text-center">
                <h4>No File Uploaded</h4>
            </div>
        @else
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Download file</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($uploads as $upload)
                            <tr>
                                <td>{{ $upload->title }}</td>
                                <td><a href="{{ route('uploads.download', $upload->uuid) }}">{{ $upload->file }}</a></td>
                            </tr>
                        
                        @endforelse
                    </tbody>
                </table>

    <p class="card-text">
        <a href="{{ route('uploads.index')}}" class="btn btn-info btn-sm mb-1">
            <i class="fas fa-eye"></i> View Uploads
        </a>
    </p>
    </div>
        </div>

        <div class="panel-footer">
            {!! $uploads->render() !!}
        </div>
        @endif       
        </div>
        </div></div>





