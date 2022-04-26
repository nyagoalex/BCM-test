<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function can_view_users(): void
    {
        User::factory()->create();
        $this->getJson(route('users.index'))->assertStatus(200);
    }

    /***
        * @test
        *
        */
       public function can_get_asingle_user($id)
       {

           #create fake user object to post and the create id
           $user = User::factory()->create();

           $response = $this->getJson(route('users.show', $user->id));
           $response->assertStatus(200);
       }

    /**
       * @test
       */
      public function can_update_a_user()
      {
          #create fake user object to post
            $user = User::factory()->create();
            $new_data = User::factory()->raw();
            $response = $this->patchJson(route('users.update', $user->id), $new_data);
            $response->assertStatus(200);
      }

    /**
        * @test
        */
       public function logged_in_user_can_delete_a_user()
       {
           #create fake user object to post
           $user = User::factory()->create();
           $response = $this->deleteJson(route('users.destroy', $user->id));
           $response->assertStatus(200);
       }


}
