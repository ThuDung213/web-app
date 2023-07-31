@foreach ($creators as $creator)
    <div class="col-3 col-sm-2 mb-3">
        <div class="d-flex justify-content-start position-relative">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                width="50" class="rounded-circle" style="display: block">
            <div class="overlay">
                <form class="delete-member-form"
                    action="{{ route('admin.project.deleteMember', ['project' => $project->id, 'creator' => $creator->id]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="delete-btn" title="Delete"
                        data-creator-id="{{ $creator->id }}">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="text-left">
            <span class="name">{{ $creator->name }}</span>
        </div>
    </div>
@endforeach
