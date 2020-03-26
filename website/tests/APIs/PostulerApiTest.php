<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Postuler;

class PostulerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_postuler()
    {
        $postuler = factory(Postuler::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/postulers', $postuler
        );

        $this->assertApiResponse($postuler);
    }

    /**
     * @test
     */
    public function test_read_postuler()
    {
        $postuler = factory(Postuler::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/postulers/'.$postuler->id
        );

        $this->assertApiResponse($postuler->toArray());
    }

    /**
     * @test
     */
    public function test_update_postuler()
    {
        $postuler = factory(Postuler::class)->create();
        $editedPostuler = factory(Postuler::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/postulers/'.$postuler->id,
            $editedPostuler
        );

        $this->assertApiResponse($editedPostuler);
    }

    /**
     * @test
     */
    public function test_delete_postuler()
    {
        $postuler = factory(Postuler::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/postulers/'.$postuler->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/postulers/'.$postuler->id
        );

        $this->response->assertStatus(404);
    }
}
