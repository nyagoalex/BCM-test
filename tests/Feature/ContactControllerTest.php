<?php

namespace Tests\Feature;

use App\Models\Contact;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /** @test */
      public function can_view_contacts_for_user(): void
      {
          $contact = Contact::factory()->forUser()->create();

          $this->getJson(route('contacts.index', $contact->user_id))->assertStatus(200);
      }

    /** @test */
         public function can_get_asingle_contact(): void
         {
             $contact = Contact::factory()->forUser()->create();

             $this->getJson(route('contacts.show', [$contact->user_id, $contact->id]))->assertStatus(200);
         }

    /** @test */
             public function can_get_update_contact(): void
             {
                 $contact = Contact::factory()->forUser()->create();

                 $this->patchJson(route('contacts.update', [$contact->user_id, $contact->id]), [
                     'mobile_number' => 1234567890,
                     'type' => 'home',
                     ])->assertStatus(200);
             }




      /**
          * @test
          */
         public function can_delete_a_contact()
         {
             #create fake user object to post
             $contact = Contact::factory()->forUser()->create();
             $response = $this->deleteJson(route('contacts.destroy', [$contact->user_id, $contact->id]));
             $response->assertStatus(200);
         }



}
