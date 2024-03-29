@php use App\Models\Genre; @endphp
@extends('layouts.app')

@section('content')

    <div class="row justify-content-md-center">
        <div class="d-flex gap-2 justify-content-center py-5">
            @php
                $color = ['', 'light', 'secondary', 'dark', 'success', 'danger', 'warning', 'info']
            @endphp
            @forelse(Genre::all() as $genre)
                <form action="{{ route('genres.destroy', $genre) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-{{ $color[$genre->id] ?? 'primary' }} rounded-pill px-3 position-relative"
                            type="submit">{{ ucfirst($genre->title) }}
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            x
                        </span>
                    </button>
                </form>
                &nbsp;&nbsp;&nbsp;
            @empty
                <p>Жанров пока нет ...</p>
            @endforelse
            <a class="btn btn-link rounded-pill px-3" href="{{ route('genres.index') }}">...</a>
        </div>

        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" style="height: 55vh">
            <div class="col"></div>
            <div class="col">
                <form action="{{ route('genres.store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="title" id="floatingInput"
                               placeholder="Название жанра">
                        <label for="floatingInput">Название жанра</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2" type="submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>

@endsection
