<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LogoTest extends TestCase
{
 
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_logo_test()
    {
      
        // $data = [ 
        //                 'logo' => "This is a product",
        //                 'status' => 20 
        //         ];

        //     $response = $this->json('POST', '/logos/create',$data);
            $response->assertTrue(200); 
    }


     public function testGetArticles()
    {
        //Given we have article in the database
        $logo = factory('App\Logo')->create();
 
        //When user visit the articles page
        $response = $this->get('/logos'); // your route to get article
 
        //He should be able to read the articles
        $response->assertSee($logo->logo);
    }
}
