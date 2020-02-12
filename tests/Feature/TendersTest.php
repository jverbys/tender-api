<?php

namespace Tests\Feature;

use App\Tender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TendersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_list_of_tenders_can_be_fetched()
    {
        $tender = factory(Tender::class)->create();

        $response = $this->get('/api/tenders');

        $response->assertJsonCount(1)
            ->assertJson([
                'data' => [
                    [    
                        'data' => [
                            'tender_id' => $tender->id,
                        ]
                    ]
                ]
            ]);
    }

    /** @test */
    public function a_tender_can_be_created()
    {
        $response = $this->post('api/tenders', $this->data());

        $tender = Tender::first();

        $this->assertEquals('Test Title', $tender->title);
        $this->assertEquals('Test Description', $tender->description);
        $response->assertStatus(201);
        $response->assertJson([
            'data' => [
                'tender_id' => $tender->id,
            ],
            'links' => [
                'self' => $tender->path(),
            ]
        ]);
    }

    /** @test */
    public function a_tender_can_be_retrieved()
    {
        $tender = factory(Tender::class)->create();

        $response = $this->get('/api/tenders/' . $tender->id);

        $response->assertJson([
            'data' => [
                'tender_id' => $tender->id,
                'title' => $tender->title,
                'description' => $tender->description,
            ]
        ]);
    }

    /** @test */
    public function a_tender_can_be_patched()
    {
        $tender = factory(Tender::class)->create();

        $response = $this->patch('/api/tenders/' . $tender->id, $this->data());

        $tender = $tender->fresh();

        $this->assertEquals('Test Title', $tender->title);
        $this->assertEquals('Test Description', $tender->description);
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'tender_id' => $tender->id,
            ],
            'links' => [
                'self' => $tender->path(),
            ]
        ]);
    }

    /** @test */
    public function a_tender_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $tender = factory(Tender::class)->create();

        $response = $this->delete('/api/tenders/' . $tender->id);

        $this->assertCount(0, Tender::all());
        $response->assertStatus(204);
    }

    private function data()
    {
        return [
            'title' => 'Test Title',
            'description' => 'Test Description',
        ];
    }
}
