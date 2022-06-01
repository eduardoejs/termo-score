<?php

namespace App\Providers;

use App\Events\ChegueiA10Pessoas;
use App\Events\WordOfDayCreatedEvent;
use App\Listeners\AbrirAPortaDoBancoListener;
use App\Listeners\CreateJobsToCheckDailyScoreListener;
use App\Listeners\EnviarEmailDeBoasVindasListener;
use App\Listeners\EnviarUmEmailQualquerListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            EnviarEmailDeBoasVindasListener::class,
        ],
        WordOfDayCreatedEvent::class => [
            CreateJobsToCheckDailyScoreListener::class,
        ],

        /**
         * Providers: Regras da sua aplicação que serão iniciadas juntas 
         * quando o framework Laravel for iniciado
         * 
         * EventServiceProvider: Realiza o Mapeamento dos eventos com os 
         * seus respectivos Listeners.
         * 
         * Mapeamento: Informo para a aplicação que caso ocorra um evento 
         * de ChegueiA10Pessoas dispare/avise o Listener informado
         */
        ChegueiA10Pessoas::class => [
            EnviarUmEmailQualquerListener::class,
            AbrirAPortaDoBancoListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
