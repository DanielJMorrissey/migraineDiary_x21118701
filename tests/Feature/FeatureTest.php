<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FeatureTest extends TestCase
{

    /*
        test diary and gp visit entries without dusk
        test analysis results
    */

    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_homepage_successfully_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page_successfully_loads()
    {
        $response = $this->get('/loginpage');

        $response->assertStatus(200);
    }

    public function test_register_page_successfully_loads()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_redirect_if_not_logged_in_or_registered()
    {
        $response = $this->get('/diary');

        $response->assertRedirect('/loginpage');
    }

    public function test_register_redirects_to_diary_page()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ])->assertSessionHasNoErrors()->assertRedirect('/diary');
    }

    public function test_login_redirects_to_diary_page()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/signout');
        $this->get('/loginpage');
        $this->post('computeLogin', [
            'username' => 'Ben10',
            'password' => 'Daniel1'
        ])->assertSessionHasNoErrors()->assertRedirect('/diary');
    }

    public function test_logout_redirects_to_login_page()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/signout')->assertSessionHasNoErrors()->assertRedirect('/loginpage');
    }

    public function test_gpTracker_page_displays()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker')->assertSessionHasNoErrors()->assertStatus(200);
    }

    public function test_analysis_page_displays()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/analysis')->assertSessionHasNoErrors()->assertStatus(200);
    }

    public function test_home_page_displays_after_register()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/')->assertSessionHasNoErrors()->assertStatus(200);
    }
}
