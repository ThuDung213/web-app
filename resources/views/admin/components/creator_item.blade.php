@foreach ($creators as $creator)
    <div class="col-12 col-sm-2">
        <div class="d-flex justify-content-start">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="50" class="rounded-circle">
        </div>
        <div class="text-left">
            <span class="name">{{ $creator->name }}</span>
        </div>
    </div>
@endforeach
