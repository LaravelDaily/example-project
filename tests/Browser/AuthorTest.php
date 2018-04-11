<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthorTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authors/create')
                    ->type('name', 'John')
                    ->type('lastname', 'Doe')
                    ->press('Save')
                    ->assertPathIs('/authors')
                    ->assertSee('John')
                    ->assertSee('Doe');
        });
    }

    public function testCreateValidation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authors/create')
                    ->press('Save')
                    ->assertSee('The name field is required');
        });
    }

    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $author = factory(\App\Author::class)->create();

            $browser->visit('/authors/' . $author->id . '/edit')
                    ->type('name', 'John1')
                    ->type('lastname', 'Doe1')
                    ->press('Save')
                    ->assertPathIs('/authors')
                    ->assertSee('John1')
                    ->assertSee('Doe1');
        });
    }

    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $author = factory(\App\Author::class)->create();

            $browser->visit('/authors/' . $author->id)
                    ->assertSee($author->name)
                    ->assertSee($author->lastname);
        });
    }

    public function testDelete()
    {
        $this->browse(function (Browser $browser) {
            $author = factory(\App\Author::class)->create();

            $browser->visit('/authors')
                    ->click('table tr td input[value=Delete]')
                    ->assertDontSee($author->name)
                    ->assertDontSee($author->lastname);

        });
    }
}
