<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\NewLetter;

class NewLetterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_new_letter()
    {
        $newLetter = factory(NewLetter::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/new_letters', $newLetter
        );

        $this->assertApiResponse($newLetter);
    }

    /**
     * @test
     */
    public function test_read_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/new_letters/'.$newLetter->id
        );

        $this->assertApiResponse($newLetter->toArray());
    }

    /**
     * @test
     */
    public function test_update_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();
        $editedNewLetter = factory(NewLetter::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/new_letters/'.$newLetter->id,
            $editedNewLetter
        );

        $this->assertApiResponse($editedNewLetter);
    }

    /**
     * @test
     */
    public function test_delete_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/new_letters/'.$newLetter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/new_letters/'.$newLetter->id
        );

        $this->response->assertStatus(404);
    }
}
