@extends('layouts.app')

@section('content')

    <div class="row justify-content-md-center">
        @forelse(\App\Models\Film::query()->whereNotNull('isPublished')->get() as $film)
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">
                            {{ implode(', ', array_map('ucfirst', $film->genres()->orderByPivot('genre_id')->pluck('title')->toArray())) }}
                        </strong>
                        <br>
                        <h3 class="mb-0">{{ $film->name }}</h3>
                        <br>
                        <div
                            class="mb-1 text-body-secondary">{{ date('Y-m-d H:i', $film->created_at->timestamp) }}</div>
                        <br>
                        <p class="card-text mb-auto">
                            Краткое описание сюжета фильма: lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Ab, alias aliquam assumenda consectetur ducimus ea magnam, nisi omnis quam quia quo quos,
                            recusandae rerum sequi sunt ut vel vero voluptatem?
                        </p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Подробнее о фильме
                            <svg class="bi">
                                <use xlink:href="#chevron-right"/>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ $film->poster }}" alt="poster" width="300" height="444">
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <p class="card-text mb-auto">
                        Фильмов пока нет...
                    </p>
                </div>
            </div>
        @endforelse
    </div>

@endsection
