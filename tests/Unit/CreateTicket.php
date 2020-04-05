  <?php 

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateTicket extends TestCase
{
        public function testCreateTicket()
        {
                $data = [
                        'subject' => "New Product",
                        'complian' => "This is a product",
                        'status' => 20,
                        'user_id' => 10
                        ];

            $response = $this->json('POST', '/ticket/create',$data);
            $response->assertStatus(401);
            $response->assertJson(['message' => "Unauthenticated."]);
        }

}