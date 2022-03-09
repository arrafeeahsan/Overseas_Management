<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Observers\VendorObserver;
use App\Models\Vendor;

use App\Observers\SupplierObserver;
use App\Models\Supplier;

use App\Observers\TaskObserver;
use App\Models\Task;

use App\Observers\VisaObserver;
use App\Models\Visa;

use App\Observers\VisarateObserver;
use App\Models\Visarate;

use App\Observers\PaymentObserver;
use App\Models\Payment;

use App\Observers\ExpenseObserver;
use App\Models\Expense;

use App\Observers\ExpenseTypeObserver;
use App\Models\ExpenseType;

use App\Observers\SliderImageObserver;
use App\Models\SliderImage;

use App\Observers\VisaNewsObserver;
use App\Models\VisaNews;

use App\Observers\PassportObserver;
use App\Models\Passport;

use App\Observers\ClientObserver;
use App\Models\Client;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Vendor::observe(VendorObserver::class);
        Supplier::observe(SupplierObserver::class);
        Task::observe(TaskObserver::class);
        Visa::observe(VisaObserver::class);
        Visarate::observe(VisarateObserver::class);
        Payment::observe(PaymentObserver::class);
        Expense::observe(ExpenseObserver::class);
        ExpenseType::observe(ExpenseTypeObserver::class);
        SliderImage::observe(SliderImageObserver::class);
        VisaNews::observe(VisaNewsObserver::class);
        Passport::observe(PassportObserver::class);
        Client::observe(ClientObserver::class);



    }
}
