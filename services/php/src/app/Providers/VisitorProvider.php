<?php

namespace App\Providers;

use App\Models\Visitor;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;

class VisitorProvider extends ServiceProvider
{
    /**
     * If visitor doesn't have a cookie it will set it
     *
     * @return void
     */
    public function boot(): void
    {
        if (!request()->cookie('cs_rotsiv')) {
            try {
                Visitor::updateOrCreateNewVisitor();
                \Cookie::queue('cs_rotsiv', Visitor::whereIp(request()->ip())->value('id'), 1440);
            } catch (QueryException $e) {
                no_connection_error($e, __CLASS__);
            }
        }
    }
}
