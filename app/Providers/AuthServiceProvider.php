<?php

namespace App\Providers;

use App\Policies\AnnouncementPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ClassifiedCategoryPolicy;
use App\Policies\EventsPolicy;
use App\Policies\GoogleAdPolicy;
use App\Policies\PhoneCategoriesPolicy;
use App\Policies\PhoneDirectoriesPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\TagPolicy;
use App\Settings;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PostPolicy;
use Laravel\Passport\Passport;
use Modules\Announcement\Entities\Announcement;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Post;
use Modules\Article\Entities\Tag;
use Modules\Classified\Entities\ClassifiedCategory;
use Modules\Classified\Entities\GoogleAd;
use Modules\Events\Entities\Event;
use Modules\TelephoneDirectory\Entities\PhoneCategory;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;
use Modules\Classified\Entities\Classified;
use App\Policies\ClassifiedPolicy;
use Modules\UserRoles\Entities\Role;

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
        Category::class => CategoryPolicy::class,
        Role::class => RolePolicy::class,
        Tag::class => TagPolicy::class,
        Event::class => EventsPolicy::class,
        Announcement::class => AnnouncementPolicy::class,
        PhoneCategory::class => PhoneCategoriesPolicy::class,
        PhoneDirectory::class => PhoneDirectoriesPolicy::class,
        Classified::class => ClassifiedPolicy::class,
        ClassifiedCategory::class => ClassifiedCategoryPolicy::class,
        GoogleAd::class => GoogleAdPolicy::class,
        Settings::class => SettingPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //
    }
}
