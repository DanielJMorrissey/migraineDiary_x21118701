<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    

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
            'date' => '2027-08-05',
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
            'date' => '2027-08-05',
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

    public function testUserInDatabase()
    {
        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ]);

        $this->assertDatabaseHas('users', [
            'username' => 'Ben10'
        ]);


    }

    public function testDiaryInDatabase()
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

        $this->assertDatabaseHas('diaries', [
            'date' => '2022-06-05'
        ]);
    }

    public function testGpVisitInDatabase()
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

        $this->assertDatabaseHas('g_p_trackers', [
            'date' => '2022-06-05'
        ]);
    }

    public function testDiaryUpdatesInDatabase()
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
            'date' => '2022-06-04',
            'chocolate' => 1,
            'comment' => 'Eric Cantona'
        ]);

        $this->assertDatabaseHas('diaries', [
            'date' => '2022-06-04'
        ]);

    }

    public function testGpVisitUpdateInDatabase()
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
            'date' => '2022-06-04',
            'comment' => 'Eric Cantona'
        ]);

        $this->assertDatabaseHas('g_p_trackers', [
            'date' => '2022-06-04'
        ]);
    }

    public function testDeletedDiaryEntryNotInDatabase()
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
        $this->get('/deleteDiaryEntry/1');

        $this->assertDatabaseMissing('diaries', [
            'date' => '2022-06-05'
        ]);
    }

    public function testDeletedGpVisitEntryNotInDatabase()
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
        $this->get('/deleteGPVisit/1');

        $this->assertDatabaseMissing('g_p_trackers', [
            'date' => '2022-06-05'
        ]);
    }

    public function testDataIsBeingDisplayedForDiary()
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
        
        $response = $this->get('/diary');

        $response->assertSeeText('05-06-2022');

    }

    public function testDataIsBeingDisplayedForGpTracker()
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

        $response = $this->get('/gpTracker');

        $response->assertSeeText('05-06-2022');
    }

    public function testUpdatedDataIsDisplayedForDiary()
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
            'date' => '2022-06-04',
            'chocolate' => 1,
            'comment' => 'Eric Cantona'
        ]);
        
        $response = $this->get('/diary');

        $response->assertSeeText('04-06-2022');

    }

    public function testUpdatedDataIsDisplayedForGpTracker()
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
            'date' => '2022-06-04',
            'comment' => 'Eric Cantona'
        ]);

        $response = $this->get('/gpTracker');

        $response->assertSeeText('04-06-2022');
    }

    public function testDeletedDiaryDataIsNotDisplayed()
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
        $this->get('/deleteDiaryEntry/1');

        $response = $this->get('/diary');
        $response->assertDontSeeText('05-06-2022');
    }

    public function testDeletedGpVisitEntryIsNotDisplayed()
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
        $this->get('/deleteGPVisit/1');

        $response = $this->get('/gpTracker');
        $response->assertDontSeeText('05-06-2022');
    }

    public function testAnalysisResultsAreDisplayed()
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

        $this->post('addDiary/entry', [
            'date' => '2022-06-05',
            'stress' => 0,

        ]);

        $response = $this->get('/analysis');

        $response->assertSeeText('50%');
    }

    public function testHomepageDisplaysText()
    {
        $response = $this->get('/');

        $response->assertSeeText('Welcome to this Online Migraine Diary!');
    }

    /*
        System test, keep at bottom
    */

    public function testSystemTesting()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response = $this->get('/loginpage');

        $response->assertStatus(200);

        $response = $this->get('/register');

        $response->assertStatus(200);

        $response = $this->get('/diary');

        $response->assertRedirect('/loginpage');

        $this->post('computeRegister', [
            'username' => 'Ben10',
            'password' => 'Daniel1',
            'password1' => 'Daniel1'
        ])->assertSessionHasNoErrors()->assertRedirect('/diary');

        $this->get('/signout');
        $this->get('/loginpage');
        $this->post('computeLogin', [
            'username' => 'Ben10',
            'password' => 'Daniel1'
        ])->assertSessionHasNoErrors()->assertRedirect('/diary');

        $this->get('/diary');
        $this->get('/addDiary');
        $this->post('addDiary/entry', [
            'date' => '2022-06-05',
            'stress' => 1,

        ])->assertSessionHasNoErrors()->assertRedirect('/diary');

        $this->get('/gpTracker')->assertSessionHasNoErrors()->assertStatus(200);

        $this->get('/addGPVisit');

        $this->post('/addGPVisit/entry',[
            'date' => '2022-05-22',
            'gp' => 'Roy Keane'
        ])->assertSessionHasNoErrors()->assertRedirect('/gpTracker');

        $this->get('/analysis')->assertSessionHasNoErrors()->assertStatus(200);

        $this->get('/')->assertSessionHasNoErrors()->assertStatus(200);

        $this->get('/signout')->assertSessionHasNoErrors()->assertRedirect('/loginpage');
    }
}
