<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser, FunctionalTestTrait;

    /** @test */
    public function it_validates_the_login_form()
    {
        $this->visit('/login')
            ->type('foo@bar.com', 'email')
            ->type('secret', 'password')
            ->press('submit')
            ->dontSeeIsAuthenticated()
            ->seePageIs('/login');
        $this->see('These credentials do not match our records.');
    }

    /** @test */
    public function it_can_login_to_the_application()
    {
        $this->visit('/admin')
             ->type($this->user->email, 'email')
             ->type('password', 'password')
             ->press('submit')
             ->seeIsAuthenticatedAs($this->user)
             ->seePageIs('/admin');
        $this->see('Welcome back');
    }

    /** @test */
    public function it_can_logout_of_the_application()
    {
        $this->actingAs($this->user)
             ->visit('/admin')
             ->click('logout')
             ->seePageis('/admin')
             ->dontSeeIsAuthenticated();
    }
}
