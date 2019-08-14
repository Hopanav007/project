@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление категории товара</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('item-category.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Наименование</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}"
                                           required
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="parent_id"
                                       class="col-md-4 col-form-label text-md-right">Родительская категория</label>

                                <div class="col-md-6">
                                    <select name="parent_id"
                                            id="parent_id"
                                            class="form-control @error('parent_id') is-invalid @enderror">
                                        <option>-</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $category->id == old('parent_id')
                                            ) ?
                                            'selected' :
                                             '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Описание</label>

                                <div class="col-md-6">
                                    <textarea id="description"
                                              type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description"
                                              autofocus>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    <input type="checkbox"
                                           name="hidden"
                                           value="1" @if(old('description')) checked @endif>Скрыть
                                </label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection