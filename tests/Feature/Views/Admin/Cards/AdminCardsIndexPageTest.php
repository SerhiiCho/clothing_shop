<?php

namespace Tests\Feature\Views\Admin\Cards;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminCardsIndexPageTest extends TestCase
{
    use DatabaseTransactions;

    private $url;

    /**
     * @author Cho
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->url = '/admin/cards';
    }

    /* @test */
    public function page_is_not_accessible_by_guest(): void
    {
        $this->get($this->url)->assertRedirect();
    }

    /* @test */
    public function page_is_not_accessible_by_auth(): void
    {
        $this->actingAs(factory(User::class)->create())
            ->get($this->url)
            ->assertRedirect();
    }

    /* @test */
    public function page_is_accessible_by_admin(): void
    {
        $this->actingAs(factory(User::class)->state('admin')->create())
            ->get($this->url)
            ->assertOk()
            ->assertViewIs('admin.cards.index');
    }
}
