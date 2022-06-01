<?php

namespace App\Models;

use App\Events\UserSavedEvent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1ª opção para mapeamento
    // A nível de Model mapeio os eventos do seu ciclo de vida
    // e disparo o evento registrado do EventServiceProvider
    // "saved": é executado quando o ciclo de vida for created e updated
    protected $dispatchesEvents = [
        'saved' => UserSavedEvent::class,
    ];

    // 2ª opção para mapeamento
    // Using Clousures:
    // Assim que o model estiver "iniciado - booted"
    protected static function booted()
    {
        // amarra ao evento de updated do model uma ação/regra,
        // sempre passando o usuário como parâmetro para o evento
        static::updated(function (self $user) {
            logger('updated via model@booted :: ' . __METHOD__ . ' :: ' . $user->name);
        });
    }

    // 3ª opção para mapeamento
    // Observers
    // Crio um observer, implemento os métodos e registro no EventServiceProvider
}
