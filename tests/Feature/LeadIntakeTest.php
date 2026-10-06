<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Lead;
use App\Models\Enquiry;
use App\Models\Appointment;

class LeadIntakeTest extends TestCase
{
    use RefreshDatabase;

    public function test_lead_can_be_submitted_via_ajax_with_marketing_attribution()
    {
        $payload = [
            'name' => 'John Patient',
            'phone' => '+15559998888',
            'email' => 'john.patient@example.com',
            'condition' => 'Back Pain',
            'duration' => 'A few months',
            'impact' => ['Working & Desk Sitting', 'Sleeping Peacefully'],
            'utm_source' => 'google',
            'utm_medium' => 'cpc',
            'utm_campaign' => 'back_pain_ad',
            'landing_page' => '/',
        ];

        $response = $this->postJson('/api/leads', $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'status' => 'success',
            'message' => 'Lead received successfully.',
        ]);

        $this->assertDatabaseHas('leads', [
            'name' => 'John Patient',
            'phone' => '+15559998888',
            'condition' => 'Back Pain',
            'utm_source' => 'google',
            'utm_campaign' => 'back_pain_ad',
            'status' => 'New',
        ]);

        $lead = Lead::where('name', 'John Patient')->first();
        $this->assertEquals(['Working & Desk Sitting', 'Sleeping Peacefully'], $lead->impact);
    }

    public function test_enquiry_can_be_submitted_via_ajax()
    {
        $payload = [
            'name' => 'Jane Smith',
            'phone' => '+15557776666',
            'email' => 'jane@example.com',
            'subject' => 'General Question',
            'message' => 'Do you take private insurance?',
        ];

        $response = $this->postJson('/api/enquiries', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('enquiries', [
            'name' => 'Jane Smith',
            'phone' => '+15557776666',
            'message' => 'Do you take private insurance?',
        ]);
    }

    public function test_appointment_request_can_be_submitted()
    {
        $payload = [
            'name' => 'Robert Johnson',
            'phone' => '+15554443333',
            'service_id' => 'orthopedic-physiotherapy',
            'preferred_date' => now()->addDays(2)->format('Y-m-d'),
            'preferred_time' => 'Morning (9 AM - 12 PM)',
        ];

        $response = $this->postJson('/api/appointments', $payload);

        $response->assertStatus(201);
        $this->assertDatabaseHas('appointments', [
            'name' => 'Robert Johnson',
            'service_id' => 'orthopedic-physiotherapy',
            'status' => 'Pending',
        ]);
    }
}
