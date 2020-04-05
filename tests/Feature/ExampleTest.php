<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
         $this->assertTrue(true);
        // $response = $this->get('/home') 
        //     ->assertStatus(200);
        //     $this->assertTrue(true);
        //     //He should be able to read the task
        //     $response->assertSee($tank->name);

        // $response->assertStatus(200);
    }
}
