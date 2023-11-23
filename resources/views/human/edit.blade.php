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

    <form action="{{ route("humans.update", $human->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3 pt-4">
            <h5>И.О.Ф</h5>
            <div class="col">
                <input type="text" class="form-control" name="name" placeholder="Имя" aria-label="Имя"
                       value="{{ $human->name }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="o_name" placeholder="Отчество" aria-label="Отчество"
                       value="{{ $human->o_name }}">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="f_name" placeholder="Фамилия" aria-label="Фамилия"
                       value="{{ $human->f_name }}">
            </div>
        </div>

        {{-- Связь --}}
        <div class="row g-3 pt-4">
            @if(empty($mans) AND empty($father))
                <div class="col mb-3">
                    <label>Отец</label>
                    <select class="form-select" aria-label="РОД" name="father_id">
                        <option value="{{ $father->id }}" selected>
                            {{ $father->name }}
                        </option>
                        @foreach($mans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if(empty($womans) AND empty($mother))
                <div class="col mb-3">
                    <label>Мать</label>
                    <select class="form-select" aria-label="РОД" name="mather_id">
                        <option value="{{ $mother->id }}" selected>
                            {{ $mother->name }}
                        </option>
                        @foreach($womans as $human)
                            <option
                                value="{{ $human->id }}">{{ $human->name . " " . $human->o_name . " " . $human->f_name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>

        <div class="row g-3 pt-4">

            <div class="col mb-3">
                <label>РОД</label>
                <select class="form-select" aria-label="РОД" name="rodovayakniga_id">
                    @isset($human->rod_id)
                        <option value="{{ $human->rod_id }}" selected>{{ $rod->find($human->rod_id)->name }}</option>
                    @endisset

                    @foreach($rods as $rod)
                        <option value="{{ $rod->id }}">{{ $rod->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col mb-3">
                <label>Поколения</label>
                <select class="form-select" aria-label="Поколения" name="generation">
                    <option value="{{ $human->generation }}" selected>{{ $human->generation }}</option>
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
                    <input type="text" class="form-control" name="nationality" id="nationality"
                           value="{{ $human->nationality }}">
                </div>
            </div>
        </div>

        <div class="row g-3 pt-3">
            <div class="col mb-3">
                <label for="profile_photo">Фотография</label>
                <input type="file" class="form-control" name="image" id="profile_photo">
            </div>
            {{--            <div class="col mb-3">--}}
            {{--                <label for="files">Сканы документов, Фотографии и т. д.</label>--}}
            {{--                <input type="file" class="form-control" name="files" id="files" multiple>--}}
            {{--            </div>--}}
        </div>

        <div class="accordion card" id="accordionExample">

            <div class="row ">
                <div class="py-4 text-center">
                    <p type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                       aria-controls="collapseOne">
                        <i class="bi bi-arrow-down"></i>
                        <span class="text-success">Добавить остальные данные  </span>
                        <i class="bi bi-arrow-down"></i>
                    </p>
                </div>
            </div>


            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    <div class="row g-3">
                        <div class="col">
                            <label for="location_birth" class="pb-1">Место рождения</label>
                            <input type="text" class="form-control" name="location_birth" id="location_birth"
                                   value="{{ $human->location_birth }}">
                        </div>
                        <div class="col">
                            <label for="data_birth" class="pb-1">Дата рождения</label>
                            <input type="date" class="form-control" name="data_birth" id="data_birth">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="height" class="pb-1">Рост</label>
                            <input type="number" class="form-control" name="height" id="height"
                                   value="{{ $human->height }}">
                        </div>
                        <div class="col">
                            <label for="eye_color" class="pb-1">Цвет глаз</label>
                            <input type="text" class="form-control" name="eye_color" id="eye_color"
                                   value="{{ $human->eye_color }}">
                        </div>
                        <div class="col">
                            <label for="hair_color" class="pb-1">Цвет волос</label>
                            <input type="text" class="form-control" name="hair_color" id="hair_color"
                                   value="{{ $human->hair_color }}">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-success mt-4">Изменить</button>
    </form>
@endsection