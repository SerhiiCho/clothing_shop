<?php

namespace Tests\Feature\Views\Pages;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PagesHomePageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @author Cho
     * @test
     */
    public function page_is_accessable_by_guest(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertViewIs('pages.home');
    }
}
