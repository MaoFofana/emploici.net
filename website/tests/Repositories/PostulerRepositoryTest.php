<?php namespace Tests\Repositories;

use App\Models\Postuler;
use App\Repositories\PostulerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PostulerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PostulerRepository
     */
    protected $postulerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->postulerRepo = \App::make(PostulerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_postuler()
    {
        $postuler = factory(Postuler::class)->make()->toArray();

        $createdPostuler = $this->postulerRepo->create($postuler);

        $createdPostuler = $createdPostuler->toArray();
        $this->assertArrayHasKey('id', $createdPostuler);
        $this->assertNotNull($createdPostuler['id'], 'Created Postuler must have id specified');
        $this->assertNotNull(Postuler::find($createdPostuler['id']), 'Postuler with given id must be in DB');
        $this->assertModelData($postuler, $createdPostuler);
    }

    /**
     * @test read
     */
    public function test_read_postuler()
    {
        $postuler = factory(Postuler::class)->create();

        $dbPostuler = $this->postulerRepo->find($postuler->id);

        $dbPostuler = $dbPostuler->toArray();
        $this->assertModelData($postuler->toArray(), $dbPostuler);
    }

    /**
     * @test update
     */
    public function test_update_postuler()
    {
        $postuler = factory(Postuler::class)->create();
        $fakePostuler = factory(Postuler::class)->make()->toArray();

        $updatedPostuler = $this->postulerRepo->update($fakePostuler, $postuler->id);

        $this->assertModelData($fakePostuler, $updatedPostuler->toArray());
        $dbPostuler = $this->postulerRepo->find($postuler->id);
        $this->assertModelData($fakePostuler, $dbPostuler->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_postuler()
    {
        $postuler = factory(Postuler::class)->create();

        $resp = $this->postulerRepo->delete($postuler->id);

        $this->assertTrue($resp);
        $this->assertNull(Postuler::find($postuler->id), 'Postuler should not exist in DB');
    }
}
