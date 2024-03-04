@php use App\Models\Genre; @endphp
@extends('layouts.app')

@section('content')

    <div class="row justify-content-md-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ошибка!</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row g-3 mb-5" action="{{ route('films.update', $film) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Название фильма <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $film->name }}">
                </div>
                <div class="col-md-6">
                    <label for="inputGenre" class="form-label">Жанр <span class="text-danger">*</span></label>
                    <select id="inputGenre" class="form-select" name="genre">
                        <option value="{{ $film->genres()->orderByPivot('genre_id')->pluck('id')[0] }}" selected>
                            {{ ucfirst($film->genres()->orderByPivot('genre_id')->pluck('title')[0]) }}
                        </option>
                        @forelse(Genre::all() as $genre)
                            <option value="{{ $genre->id }}">{{ ucfirst($genre->title) }}</option>
                        @empty
                            <option>Без жанра</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    <label for="inputPoster" class="form-label">URL постера</label>
                    <input type="text" class="form-control" id="inputPoster" name="url" value="{{ $film->poster }}">
                </div>
                <div class="col-md-6 input-group ">
                    <input type="file" name="poster" class="form-control" placeholder="image">
                </div>
                <div class="form-text mb-3" id="basic-addon4">
                    Размер файла не должен превышать 2 Мб и иметь разрешение 300 x 444 пикселей.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="isPublished">
                    <label class="form-check-label" for="gridCheck">
                        Сразу опубликовать
                    </label>
                </div>
            </div>
            <div class="col-12" style="height: 30vh">
                <button type="submit" class="btn btn-primary">Обновить фильм</button>
            </div>
        </form>
            <div class="col-12 mb-3">
                <form action="{{ route('films.destroy', $film) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"
                            class="btn btn-danger ml-4"
                            onclick="return confirm('Действительно удалить?')">
                        Удалить фильм
                    </button>
                </form>
            </div>
    </div>

@endsection
