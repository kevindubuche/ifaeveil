<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\Admin;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class AdminTest extends TestCase
{
    //use RefreshDatabase;
   use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_only_logged_in_users_can_see_admin_list()
    {
        $response = $this->get('/admins')
        ->assertRedirect('/login');
    }
    public function test_authenticated_users_can_see_the_admin_list(){
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/admins')
        ->assertOk();
    }

    public function test_an_admin_can_be_stored_through_the_form(){
    
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/admins',$this->data());

        $this->assertCount(1, Admin::all() );
    // $response->assertRedirect('admins');
    }
  
    // public function test_nom_is_required(){
    
    //     $this->withoutExceptionHandling();

    //     $this->actingAs(factory(User::class)->create());
    //     $response = $this->post('/admins',array_merge($this->data(), ['nom'=>'']));
        
    //     $response->assertSessionHasErrors('error');
    //    $this->assertCount(0, Admin::all() );
    // }
    private function data(){
        return [
            'nom' => 'Test user',
            'prenom' => 'Test user',
            'username' => 'testuser',
            'password' => 'password',
        ];
    }
    
}
