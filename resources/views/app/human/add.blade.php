@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route("humans.store") }}"
        method="POST"
        enctype="multipart/form-data"
        class="p-2"
    >
        @csrf

        <div class="row g-3 pt-4">
            <h5>Имя Отчество Фамилия</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="o_name" placeholder="Отчество" aria-label="Отчество">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="f_name" placeholder="Фамилия" aria-label="Фамилия">
            </div>
        </div>

        <div class="row g-3 pt-4">

            <div class="col">
                <label>РОДовое Древо</label>
                <select class="form-select" aria-label="РОДовое Древо" name="tree_id">
                    @if($tree)
                        <option value="{{ $tree->id }}">{{ $tree->name }}</option>
                    @else
                        <option value="" selected>Не выбран</option>
                        @foreach ($trees as $tree)
                            <option value="{{ $tree->id }}">{{ $tree->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col">
                <label for="location_birth" class="pb-1">Место рождения</label>
                <input type="text" class="form-control" name="location_birth" id="location_birth">
            </div>
            <div class="col">
                <label for="data_birth" class="pb-1">Дата рождения</label>
                <input type="date" class="form-control" name="data_birth" id="data_birth">
            </div>
        </div>

        {{-- Связь --}}
        <div class="row g-3 pt-4">

            @isset($mans)
                <div class="col">
                    <label>Отец</label>
                    <select class="form-select" aria-label="РОД" name="father_id">
                        <option value="0" selected>Не выбран</option>
                        @foreach($mans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                        @endforeach
                    </select>
                </div>
            @endisset

            @isset($womans)
                <div class="col">
                    <label>Мать</label>
                    <select class="form-select" aria-label="РОД" name="mather_id">
                        <option value="0" selected>не выбран</option>
                        @foreach($womans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                        @endforeach
                    </select>
                </div>
            @endisset
        </div>

        <div class="row g-3 pt-4">
            <div class="col mb-3">
                <label for="location_birth" class="pb-1">Пол</label>
                <select class="form-select" aria-label="Пол" name="gender">
                    <option value="" selected>Не выбран</option>
                    <option value="man">Мужской</option>
                    <option value="woman">Женский</option>
                </select>
            </div>

            <div class="col mb-3">
                <label>Поколения</label>
                <select class="form-select" aria-label="Поколения" name="generation">
                    <option value="" selected>Не выбран</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                </select>
            </div>

            <div class="col mb-3">
                <div class="col">
                    <label for="nationality" class="pb-1">Национальность</label>
                    <input type="text" class="form-control" name="nationality" id="nationality">
                </div>
            </div>
        </div>

        <div class="row g-3 pt-3">
            <div class="col-4 mb-3">
                <label for="profile_photo">Фотография</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
        </div>

        <div class="row g-3 pt-3 pb-3">
            <div class="col">
                <label for="myeditorinstance">
                    Биография
                </label>
                <textarea id="myeditorinstance" name="text" class="form-control"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Добавить</button>
    </form>

    @include('components.head.tinymce-config')
@endsection
