<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvshowViewModel extends ViewModel
{
    public $tvshow;

    public function __construct($tvshow)
    {
        $this->tvshow = $tvshow;
    }
    
    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500'.$this->tvshow['poster_path'],
            'vote_average'=> $this->tvshow['vote_average'] * 10 .'%',
            'first_air_date'=> Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' =>collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->tvshow['credits']['crew'])->take(2),
            'cast' => collect($this->tvshow['credits']['cast'])->take(5),
            'images' => collect($this->tvshow['images']['backdrops'])->count() > 8
                ? collect($this->tvshow['images']['backdrops'])->random(9)
                : collect($this->tvshow['images']['backdrops']),
            'video_keys' =>collect($this->tvshow['videos']['results'])->random()['key'],

        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits',
            'video_keys', 'images', 'crew', 'cast','created_by',
        ]);
    }
}
