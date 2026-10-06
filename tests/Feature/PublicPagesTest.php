<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Condition;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Pain shouldn\'t decide how you live your life.');
        $response->assertSee('Understand My Problem');
    }

    public function test_about_page_loads_successfully()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Because your recovery deserves more than a routine.');
    }

    public function test_treatments_page_loads_successfully()
    {
        $response = $this->get('/treatments');
        $response->assertStatus(200);
        $response->assertSee('Orthopedic Physiotherapy');
    }

    public function test_conditions_index_loads_successfully()
    {
        $response = $this->get('/conditions');
        $response->assertStatus(200);
        $response->assertSee('Back Pain & Spinal Discomfort');
    }

    public function test_individual_condition_page_loads_successfully()
    {
        $response = $this->get('/conditions/back-pain');
        $response->assertStatus(200);
        $response->assertSee('Back Pain & Spinal Discomfort');
        $response->assertSee('What May Be Causing The Problem?');
    }

    public function test_offers_page_loads_successfully()
    {
        $response = $this->get('/offers');
        $response->assertStatus(200);
    }

    public function test_contact_page_loads_successfully()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('(555) 019-2834');
    }
}
