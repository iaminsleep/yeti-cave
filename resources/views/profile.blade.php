@extends('layout')

@section('title', 'Профиль')

@section('page-content')
    <x-nav></x-nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            @forelse($bets->sortByDesc('bet_date') as $bet)
                <tr class="rates__item @if($bet->lot->winner_id === $id && $bets->where('lot_id', $bet->lot->id)->sortByDesc('bet_price')->first()->bet_price === $bet->bet_price) {{ $status['winner'] }}
                    @elseif(Carbon\Carbon::now()->gte($bet->lot->end_date)) {{ $status['end'] }} @endif">
                    <td class="rates__info">
                        <div class="rates__img">
                            <img src="{{ $bet->lot->url }}" width="54" height="40" alt="{{ $bet->lot->title }}">
                        </div>
                        <h3 class="rates__title">
                            <a href="{{ route('lot-page', ['id' => $bet->lot->id]) }}">{{ $bet->lot->title }}</a>
                        </h3>
                    </td>
                    <td class="rates__category">
                        {{ $bet->lot->category->title }}
                    </td>
                    <td class="rates__timer">
                        @if($bet->lot->winner_id === $id && $bets->where('lot_id', $bet->lot->id)->sortByDesc('bet_price')->first()->bet_price === $bet->bet_price)
                            <div class="timer timer--win">Ставка выиграла</div>
                        @else
                            <div class="timer @if(Carbon\Carbon::parse($bet->lot->end_date)->diff(Carbon\Carbon::parse(date('Y-m-d H:i:s')))->format    ('%d:%H:%i:%s') < ('1:00:00:00') && !Carbon\Carbon::now()->gte($bet->lot->end_date)) {{ 'timer--finishing' }} @endif">
                                @if(Carbon\Carbon::now()->gte($bet->lot->end_date)) {{ 'Завершён' }} 
                                @else {{ Carbon\Carbon::parse($bet->lot->end_date)
                                ->diff(Carbon\Carbon::parse(date('Y-m-d H:i:s')))->format('%d:%H:%i:%s') }}
                                @endif
                            </div>
                        @endif
                    </td>
                    <td class="rates__price">
                        {{ $bet->bet_price }} руб.
                    </td>
                    <td class="rates__time">
                        {{ Carbon\Carbon::parse($bet->bet_date)->diffForHumans() }}
                    </td>
                </tr>
            @empty
                <h1>Ставок нет</h1>
            @endforelse
        </table>
    </section>
@endsection
