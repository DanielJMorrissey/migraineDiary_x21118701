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
        unit tests
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

    public function testDiaryAdditionRedirectsToDiaryPage()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '2022-06-05',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/diary');
    }

    public function testDiaryDateIsRequired()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/addDiary');
    }

    public function testDiaryOnlyAcceptsValidDate()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '2022-08-05',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/addDiary');
    }

    public function testAddGPTrackerEntryPageRedirectsToGPVisitPage()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker');
        $this->get('/addGPVisit');

        $this->post('/addGPVisit/entry',[
            'date' => '2022-05-22',
            'gp' => 'Roy Keane'
        ])->assertSessionHasNoErrors()->assertRedirect('/gpTracker');
    }

    public function test_GP_OnlyAcceptsValidDate()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker');
        $this->get('/addGPVisit');

        $this->post('/addGPVisit/entry', [
            'date' => '2022-08-05',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/addGPVisit');
    }

    public function test_GP_RequiresDate()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker');
        $this->get('/addGPVisit');

        $this->post('/addGPVisit/entry', [
            'date' => '',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/addGPVisit');
    }

    public function test_update_redirects_to_diary_page()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '2022-06-05',
            'stress' => 1,

        ]);

        $this->get('/updateDiary/1');
        $this->put('/completeUpdateDiary/1', [
            'date' => '2022-06-05',
            'chocolate' => 1,
            'comment' => 'Eric Cantona'
        ])->assertSessionHasNoErrors()->assertRedirect('/diary');
    }

    public function test_update_redirects_to_gp_page()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker');
        $this->get('/addGPVisit');
        $this->post('/addGPVisit/entry', [
            'date' => '2022-06-05',
            'comment' => 'Roy Keane',

        ]);

        $this->get('/updateGPVisit/1');
        $this->put('/completeGPVisitUpdate/1', [
            'date' => '2022-06-05',
            'comment' => 'Eric Cantona'
        ])->assertSessionHasNoErrors()->assertRedirect('/gpTracker');
    }

    public function testDiaryDeleteRedirectsBackToDiaryPage()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '2022-06-05',
            'stress' => 1,

        ]);
        
        $this->get('/diary');
        $this->get('/deleteDiaryEntry/1')->assertSessionHasNoErrors()->assertRedirect('/diary');
    }

    public function testGPVisitDeleteRedirectsBackToGPTrackerPage()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->get('/gpTracker');
        $this->get('/addGPVisit');
        $this->post('/addGPVisit/entry', [
            'date' => '2022-06-05',
            'comment' => 'Roy Keane',

        ]);

        $this->get('/gpTracker');
        $this->get('/deleteGPVisit/1')->assertSessionHasNoErrors()->assertRedirect('/gpTracker');
    }
}
