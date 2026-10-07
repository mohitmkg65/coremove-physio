<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Lead;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_guest_cannot_access_admin_dashboard()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }


    public function test_admin_can_login_and_access_dashboard()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@coremovephysio.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();

        $dashResponse = $this->get('/admin/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Overview Dashboard');
        $dashResponse->assertSee('Total Leads');
    }

    public function test_admin_can_update_lead_status_and_add_notes()
    {
        $admin = User::where('email', 'admin@coremovephysio.com')->first();
        $lead = Lead::first();

        $response = $this->actingAs($admin)->post("/admin/leads/{$lead->id}/status", [
            'status' => 'Contacted',
            'follow_up_date' => now()->addDays(3)->format('Y-m-d'),
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => 'Contacted',
        ]);

        $noteResponse = $this->actingAs($admin)->post("/admin/leads/{$lead->id}/notes", [
            'note' => 'Spoke with patient on phone. Scheduled assessment.',
        ]);

        $noteResponse->assertSessionHas('success');
        $this->assertDatabaseHas('lead_notes', [
            'lead_id' => $lead->id,
            'note' => 'Spoke with patient on phone. Scheduled assessment.',
        ]);
    }

    public function test_admin_scheduling_lead_creates_appointment()
    {
        $admin = User::where('email', 'admin@coremovephysio.com')->first();
        $lead = Lead::first();

        $response = $this->actingAs($admin)->post("/admin/leads/{$lead->id}/status", [
            'status' => 'Appointment Scheduled',
            'appointment_date' => now()->addDays(2)->format('Y-m-d'),
            'appointment_time' => 'Morning (9 AM - 12 PM)',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('leads', [
            'id' => $lead->id,
            'status' => 'Appointment Scheduled',
        ]);

        $this->assertDatabaseHas('appointments', [
            'phone' => $lead->phone,
            'status' => 'Confirmed',
        ]);
    }
}
