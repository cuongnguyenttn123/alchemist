<?php

namespace App\Providers;

use App\Models\Withdrawal;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Relations\Relation;

use App\Models\User;
use App\Models\Project;
use App\Models\Contest;
use App\Models\ChargeCredit;
use App\Models\Deposit;
use App\Observers\DepositObserver;
use App\Observers\WithdrawalObserver;
use App\Observers\ChargeCreditObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
         Withdrawal::observe(WithdrawalObserver::class);
         Deposit::observe(DepositObserver::class);
         ChargeCredit::observe(ChargeCreditObserver::class);
         User::observe(UserObserver::class);


      /*Relation::morphMap([
        'user'    => User::class,
        'project'  => Project::class,
        'contest'  => Contest::class
      ]);*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
