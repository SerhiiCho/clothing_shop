<?php

namespace Tests\Feature\Views\Admin\Cards;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminCardsCreatePageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @author Cho
     * @test
     */
    public function page_is_not_accessable_by_auth(): void
    {
        $this->actingAs(factory(User::class)->create())
            ->get("/admin/cards/create")
            ->assertRedirect();
    }

    /**
     * @author Cho
     * @test
     */
    public function page_is_not_accessable_by_guest(): void
    {
        $this->get("/admin/cards/create")
            ->assertRedirect();
    }

    /**
     * @author Cho
     * @test
     */
    public function page_is_accessable_by_admin(): void
    {
        $this->actingAs(factory(User::class)->state('admin')->create())
            ->get('/admin/cards/create')
            ->assertOk()
            ->assertViewIs('admin.cards.create');
    }

    /**
     * @author Cho
     * @test
     */
    public function admin_can_add_new_card(): void
    {
        $form_data = [
            'category' => 'men',
            'type' => rand(1, 10),
        ];

        $this->actingAs(factory(User::class)->state('admin')->create())
            ->post(action('Admin\CardController@store'), $form_data);

        $this->assertDatabaseHas('cards', [
            'type_id' => $form_data['type'],
            'category' => $form_data['category'],
        ]);
    }
}
