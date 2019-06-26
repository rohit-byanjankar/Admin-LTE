<?php

namespace App\Providers;

use App\Policies\EventsPolicy;
use App\Policies\PhoneCategoriesPolicy;
use App\Policies\PhoneDirectoriesPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PostPolicy;
use Modules\Article\Entities\Post;
use Modules\Events\Entities\Event;
use Modules\TelephoneDirectory\Entities\PhoneCategory;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Event::class => EventsPolicy::class,
        PhoneCategory::class => PhoneCategoriesPolicy::class,
        PhoneDirectory::class => PhoneDirectoriesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
