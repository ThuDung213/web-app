@extends('layouts.master')

@section('title', 'Add Project')
@section('content')
    @if ($projects->isEmpty())
    <div class="container">
        <section class="mx-auto my-5" style="max-width: 28rem;">

          <div class="card">
            <div class="card-body">
              <blockquote class="blockquote blockquote-custom bg-white px-3 pt-4">
                <div class="blockquote-custom-icon bg-info shadow-1-strong">
                    <i class="bi bi-heart text-white"></i>
                </div>
                <p class="mb-0 mt-2 font-italic">
                    There is no project available
                </p>
                <footer class="blockquote-footer pt-4 mt-4 border-top text-inherit">
                    Please check again
                </footer>
              </blockquote>
            </div>
          </div>

        </section>
      </div>
    @else
        <div class="container d-flex justify-content-center">
            <div class="row g-3">
                @foreach ($projects as $key => $project)
                    <div class="box">
                        <h3>{{ $project->project_name }}</h3>
                        <p>{{ $project->description }}</p>
                        <a
                            href="{{ route('time.index', ['creator' => $creator, 'project' => $project->id]) }}"><button>Detail</button></a>
                        <span class="count">{{ $key + 1 }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
