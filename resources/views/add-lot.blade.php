@extends('layout')

@section('title', 'Добавление лота')

@section('head')
    @parent
    <link rel="stylesheet" href="../../public/css/flatpickr.min.css">
@endsection

@section('scripts')
    <script src="../../public/js/flatpickr.js"></script>
    <script src="../../public/js/script.js"></script>
@endsection

@section('page-content')
    <x-nav></x-nav>
    <form class="form form--add-lot container @if($errors->any()) {{ 'form--invalid' }} @endif"
        action="{{ route('add-lot') }}"
        method="post"
        enctype="multipart/form-data">
        @csrf
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item @error('lot-name') {{ 'form__item--invalid' }} @enderror">
                <label for="lot-name">Наименование <sup>*</sup></label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="{{ old('lot-name') }}">
                <span class="form__error">Введите наименование лота</span>
            </div>
            <div class="form__item @error('category') {{ 'form__item--invalid' }} @enderror">
                <label for="category">Категория <sup>*</sup></label>
                <select id="category" name="category">
                    <option select disabled>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <span class="form__error">Выберите категорию</span>
            </div>
        </div>
        <div class="form__item form__item--wide @error('message') {{ 'form__item--invalid' }} @enderror">
            <label for="message">Описание <sup>*</sup></label>
            <textarea id="message" name="message" placeholder="Напишите описание лота">{{ old('message') }}</textarea>
            <span class="form__error">Напишите описание лота</span>
        </div>
        <div class="form__item form__item--file @error('lot-img') {{ 'form__item--invalid' }} @enderror">
            <label>Изображение <sup>*</sup></label>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="lot-img" value="" name="lot-img" value="{{ old('lot-img') }}">
                <label for="lot-img">
                    Добавить
                </label>
            </div>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small @error('lot-rate') {{ 'form__item--invalid' }} @enderror">
                <label for="lot-rate">Начальная цена <sup>*</sup></label>
                <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="{{ old('lot-rate') }}">
                <span class="form__error">Введите начальную цену</span>
            </div>
            <div class="form__item form__item--small @error('lot-step') {{ 'form__item--invalid' }} @enderror">
                <label for="lot-step">Шаг ставки <sup>*</sup></label>
                <input id="lot-step" type="text" name="lot-step" placeholder="0" value="{{ old('lot-step') }}">
                <span class="form__error">Введите шаг ставки</span>
            </div>
            <div class="form__item @error('lot-date') {{ 'form__item--invalid' }} @enderror">
                <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
                <input class="form__input-date" id="lot-date" type="text"
                name="lot-date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="{{ old('lot-date') }}">
                <span class="form__error">Введите корректную дату завершения торгов (Внимание! Аукцион не может длиться дольше 7 дней.)</span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
@endsection
