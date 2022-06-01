<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyScore extends Model
{
    use HasFactory;

    const STATUS_FINISHED = 'finished';
    const STATUS_WRONG_WORD = 'wrong_word';

    // booted
    // protected static function booted()
    // {
    //     // quando estiver criando o registro e antes de salvar no DB, faço a transformação do dado, através do listener creating
    //     static::creating(function($model){
    //         $model->game_id = str($model->game_id)->replace('#','');
    //     });
    // }

    // mutators: forma antiga
    // public function setGameIdAttribute($value)
    // {
    //     $this->attributes['game_id'] = str($value)->replace('#','');
    // }

    // mutators: forma atual
    // return new Attribute(
    //     get: get: fn () => 'edu',
    //     set: fn ($value) => str($value)->replace('#', '')
    // );
    public function gameId(): Attribute
    {
        return new Attribute(
            set: fn ($value) => (int)str($value)->replace('#', '')->toString()
        );
    }
}
