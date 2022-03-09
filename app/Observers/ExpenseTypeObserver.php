<?php

namespace App\Observers;

use App\Models\ExpenseType;
use Illuminate\Support\Facades\Auth;


class ExpenseTypeObserver
{
    /**
     * Handle the ExpenseType "created" event.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return void
     */
    public function creating(ExpenseType $expenseType)
    {
        $expenseType->created_by = 'UserID- '.Auth::id();
    }

    /**
     * Handle the ExpenseType "updated" event.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return void
     */
    public function updated(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Handle the ExpenseType "deleted" event.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return void
     */
    public function deleted(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Handle the ExpenseType "restored" event.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return void
     */
    public function restored(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Handle the ExpenseType "force deleted" event.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return void
     */
    public function forceDeleted(ExpenseType $expenseType)
    {
        //
    }
}
