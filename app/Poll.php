<?php

namespace App;

use App\Events\PollCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Poll extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
        'created' => PollCreated::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class)->orderBy('position');
    }

    public function addQuestion($question)
    {
        $this->question()->create($question);
    }
    public function cookie()
    {
        return substr(Cookie::get('dogel_umfragen_session'),3,32);
    }
}
