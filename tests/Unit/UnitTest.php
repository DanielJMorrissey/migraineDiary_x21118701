<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnitTests extends TestCase
{
    /**
     * A basic unit test example.
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
}
