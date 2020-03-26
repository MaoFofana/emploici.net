<?php namespace Tests\Repositories;

use App\Models\NewLetter;
use App\Repositories\NewLetterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NewLetterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NewLetterRepository
     */
    protected $newLetterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->newLetterRepo = \App::make(NewLetterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_new_letter()
    {
        $newLetter = factory(NewLetter::class)->make()->toArray();

        $createdNewLetter = $this->newLetterRepo->create($newLetter);

        $createdNewLetter = $createdNewLetter->toArray();
        $this->assertArrayHasKey('id', $createdNewLetter);
        $this->assertNotNull($createdNewLetter['id'], 'Created NewLetter must have id specified');
        $this->assertNotNull(NewLetter::find($createdNewLetter['id']), 'NewLetter with given id must be in DB');
        $this->assertModelData($newLetter, $createdNewLetter);
    }

    /**
     * @test read
     */
    public function test_read_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();

        $dbNewLetter = $this->newLetterRepo->find($newLetter->id);

        $dbNewLetter = $dbNewLetter->toArray();
        $this->assertModelData($newLetter->toArray(), $dbNewLetter);
    }

    /**
     * @test update
     */
    public function test_update_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();
        $fakeNewLetter = factory(NewLetter::class)->make()->toArray();

        $updatedNewLetter = $this->newLetterRepo->update($fakeNewLetter, $newLetter->id);

        $this->assertModelData($fakeNewLetter, $updatedNewLetter->toArray());
        $dbNewLetter = $this->newLetterRepo->find($newLetter->id);
        $this->assertModelData($fakeNewLetter, $dbNewLetter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_new_letter()
    {
        $newLetter = factory(NewLetter::class)->create();

        $resp = $this->newLetterRepo->delete($newLetter->id);

        $this->assertTrue($resp);
        $this->assertNull(NewLetter::find($newLetter->id), 'NewLetter should not exist in DB');
    }
}
