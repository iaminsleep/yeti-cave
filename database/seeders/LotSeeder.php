<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lots = [
            [
                'title' => '2014 Rossignol District Snowboard',
                'description' => 'Сноуборд Rossignol District Amptek - это удобная доска для фристайла для начинающих паркеров и пайп-райдеров. Автоматический разворот Amptek от Rossignol в сочетании с небольшим развалом обеспечивает плавную, но стабильную езду. Более мягкий симметричный изгиб делает District легкой в управлении доской, которая игрива и дает вам уверенность в совершенствовании своих навыков.',
                'url' => 'img/lots/lot-1.jpg',
                'price' => 10999,
                'bet_step' => 100,
                'author_id' => 1,
                'category_id' => 1,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ],
            [
                'title' => 'DC Ply Mens 2016/2017 Snowboard',
                'description' => 'Настоящий зимний скейтборд на ваших ногах. Не обремененная весом, отлично спроектированная конструкция, которая проверена годами. Прогиб Lock & Load Camber с классическим кэмбером по середине для устойчивости и отличного щелчка! В этом году размерную линейку доски расширили, добавив пару вайдовых ростовок, чтобы райдеры с большим размером ноги тоже могли получить удовольствие от катания на этой потрясающей доске.',
                'url' => 'img/lots/lot-2.jpg',
                'price' => 159999,
                'bet_step' => 100,
                'author_id' => 2,
                'category_id' => 1,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ],
            [
                'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
                'description' => 'Превратите всю гору в парк с привязкой Union go-to Freestyle. Contact Pro известен своей мягкой и удобной для серфинга опорной плитой с мини-диском, ультратонкими высокими спинками ASYM S2 Team и супер удобными ремешками Forma Elite на щиколотках. Путешествуйте по горам, катайтесь по парку и настраивайте в соответствии с желаниями вашего сердца, Contact Pro будет держать вас в напряжении весь сезон.',
                'url' => 'img/lots/lot-3.jpg',
                'price' => 8000,
                'bet_step' => 100,
                'author_id' => 3,
                'category_id' => 2,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ],
            [
                'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
                'description' => 'Принимая во внимание стиль и быстрое комфортное надевание ботинок Mutiny, можно сказать, что эта модель — скейтовая обувь для сноубордиста. Простота традиционной шнуровки и плотная фиксация пятки за счет внутренней утяжки делают эти ботинки очевидным выбором для любого поклонника фристайла.',
                'url' => 'img/lots/lot-4.jpg',
                'price' => 10999,
                'bet_step' => 100,
                'author_id' => 4,
                'category_id' => 3,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ],
            [
                'title' => 'Куртка для сноуборда DC Amo 13 Blue Jay',
                'description' => 'Ветру не добраться до тела благодаря швам, проклеенным в критических мечтах. Глубокий расширяющийся капюшон можно носить со шлемом. Обилие карманов, в том числе внутренних для маски и плеера, позволяет держать все нужное при себе, не обременяя себя рюкзаком.',
                'url' => 'img/lots/lot-5.jpg',
                'price' => 7500,
                'bet_step' => 100,
                'author_id' => 1,
                'category_id' => 4,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ],
            [
                'title' => 'Маска Oakley Canopy',
                'description' => 'Маска Oakley дает стопроцентную защиту от лишних солнечных лучей, противостоит ударам, не запотевает, позволяет при необходимости быстро сменить линзу.',
                'url' => 'img/lots/lot-6.jpg',
                'price' => 5400,
                'bet_step' => 100,
                'author_id' => 2,
                'category_id' => 6,
                'creation_date' => Carbon::now()->timezone('Europe/Moscow'),
                'end_date' => Carbon::now()->addSeconds(604800)->timezone('Europe/Moscow'),
            ]
        ];
        DB::table('lots')->insert($lots);
    }
}
