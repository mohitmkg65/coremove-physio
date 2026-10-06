<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Condition;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Offer;
use App\Models\Gallery;
use App\Models\Lead;
use App\Models\Enquiry;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@coremovephysio.com'],
            [
                'name' => 'Dr. Marcus Vance (Clinic Admin)',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Services
        $services = [
            [
                'slug' => 'orthopedic-physiotherapy',
                'name' => 'Orthopedic Physiotherapy',
                'short_description' => 'Targeted evaluation and manual restoration for spine, joint, bone, and muscle dysfunctions.',
                'full_description' => 'Our specialized orthopedic care focuses on restoring structural alignment, reducing localized inflammation, and re-educating movement patterns through targeted manual therapy and precision motor control exercises.',
                'benefit' => 'Relieves deep joint tension & restores natural range of motion.',
                'icon' => 'back-pain',
                'image_url' => '/images/manual-care.jpg',
                'sort_order' => 1,
            ],
            [
                'slug' => 'sports-rehabilitation',
                'name' => 'Sports Rehabilitation',
                'short_description' => 'Advanced biomechanical assessment and athletic conditioning for active individuals and athletes.',
                'full_description' => 'Whether recovering from an acute ligament tear or chronic overuse injury, we build progressive load tolerance protocols to safely return you to peak physical performance.',
                'benefit' => 'Safe return to sport with reduced risk of re-injury.',
                'icon' => 'sports-injury',
                'image_url' => '/images/active-rehab.jpg',
                'sort_order' => 2,
            ],
            [
                'slug' => 'pain-management',
                'name' => 'Pain Management Therapy',
                'short_description' => 'Evidence-informed non-invasive relief for persistent lumbar, cervical, and joint discomfort.',
                'full_description' => 'Addressing chronic pain requires a holistic neuro-muscular approach. We combine gentle joint mobilisation, dry needling, soft tissue release, and nervous system desensitisation strategies.',
                'benefit' => 'Reduces chronic nerve sensitivity and muscle guarding.',
                'icon' => 'joint-pain',
                'image_url' => '/images/manual-care.jpg',
                'sort_order' => 3,
            ],
            [
                'slug' => 'post-surgical-rehabilitation',
                'name' => 'Post-Surgical Rehabilitation',
                'short_description' => 'Structured phase-by-phase recovery following ACL, meniscus, hip, knee replacement, or spinal surgery.',
                'full_description' => 'Carefully synchronized post-operative protocols designed in close communication with your orthopedic surgeon to minimize scar tissue, manage swelling, and rebuild neuromuscular strength.',
                'benefit' => 'Accelerates post-op tissue healing and functional independence.',
                'icon' => 'post-surgery',
                'image_url' => '/images/hero-patient.jpg',
                'sort_order' => 4,
            ],
            [
                'slug' => 'joint-rehabilitation',
                'name' => 'Joint & Mobility Therapy',
                'short_description' => 'Dedicated care for arthritis, stiffness, and restricted joint mechanics.',
                'full_description' => 'Improving capsular mobility and surrounding muscular support to reduce friction, relieve stiffness, and preserve joint longevity.',
                'benefit' => 'Smooth joint movement without stiffness or aching.',
                'icon' => 'knee-pain',
                'image_url' => '/images/active-rehab.jpg',
                'sort_order' => 5,
            ],
            [
                'slug' => 'senior-mobility',
                'name' => 'Senior Mobility & Fall Prevention',
                'short_description' => 'Gentle strength, balance, and confidence building for graceful aging.',
                'full_description' => 'Empowering older adults to move freely without fear of falling through gentle gait training, stability strengthening, and functional posture exercises.',
                'benefit' => 'Restores movement confidence in everyday activities.',
                'icon' => 'walking-help',
                'image_url' => '/images/hero-patient.jpg',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // 3. Conditions
        $conditions = [
            [
                'slug' => 'back-pain',
                'title' => 'Back Pain & Spinal Discomfort',
                'short_summary' => 'Back pain can stem from disc strain, spinal stiffness, or muscle imbalances. Understanding the underlying mechanism is the key to lasting relief.',
                'causes' => 'Prolonged sitting posture, heavy lifting strain, core muscle atrophy, or facet joint dysfunction.',
                'symptoms' => 'Dull ache in lower back, morning stiffness, localized muscle spasms, or discomfort when bending forward.',
                'therapy_approach' => 'Comprehensive spinal movement assessment, targeted manual release of tight flexors, core stabilization exercise, and ergonomic posture re-education.',
                'when_to_seek_care' => 'Seek care if pain persists beyond 3 days, worsens with movement, or restricts daily work and sleep.',
                'faqs' => [
                    ['q' => 'Do I need an MRI before my back pain assessment?', 'a' => 'Not necessarily. Our thorough clinical movement assessment identifies physical mechanical triggers effectively. If red flags are detected, we will refer you for imaging.'],
                    ['q' => 'How soon can I expect relief?', 'a' => 'Most patients experience noticeable reduction in muscle tension and improved movement freedom within 2 to 3 tailored sessions.']
                ],
                'image_url' => '/images/manual-care.jpg',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'knee-pain',
                'title' => 'Knee Pain & Patellar Tendonitis',
                'short_summary' => 'Knee pain often develops due to poor tracking of the patella, hip weakness, or cartilage wear. Re-aligning lower limb mechanics yields dramatic improvements.',
                'causes' => 'Quadriceps muscle imbalance, foot pronation, meniscus strain, or repetitive impact without adequate rest.',
                'symptoms' => 'Clicking or popping under kneecap, pain when climbing stairs, stiffness after prolonged sitting, swelling around joint.',
                'therapy_approach' => 'Gait and foot arch evaluation, gluteus medius strengthening, patellar mobilization, and progressive kinetic chain re-weighting.',
                'when_to_seek_care' => 'If your knee feels unstable, catches during walking, or produces localized swelling after normal activity.',
                'faqs' => [
                    ['q' => 'Can physiotherapy help knee osteoarthritis?', 'a' => 'Yes! Strengthening surrounding support muscles significantly decreases compressive pressure on cartilage, reducing pain and deferring surgery.'],
                    ['q' => 'Should I stop exercising completely?', 'a' => 'We modify your activities rather than stopping movement completely, ensuring you maintain fitness while tissue heals.']
                ],
                'image_url' => '/images/active-rehab.jpg',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'neck-pain',
                'title' => 'Neck Pain & Cervical Tension',
                'short_summary' => 'Modern work habits and stress frequently cause cervical vertebrae compression and tension headaches. We target root postural causes.',
                'causes' => 'Forward head posture, desk work strain, upper trapezius tightness, or cervical nerve root compression.',
                'symptoms' => 'Stiff neck when turning head, tension radiating down shoulders, frequent tension headaches at base of skull.',
                'therapy_approach' => 'Cervical mobilization, deep neck flexor re-training, ergonomic desk adjustment, and scapular stabilization exercises.',
                'when_to_seek_care' => 'When neck stiffness causes regular headaches, restricts driving shoulder checks, or radiates tingling down the arm.',
                'faqs' => [
                    ['q' => 'Are neck adjustments safe?', 'a' => 'At CoreMove, we prioritize gentle, evidence-based joint mobilizations and soft tissue techniques that carry virtually no risk and deliver high comfort.']
                ],
                'image_url' => '/images/manual-care.jpg',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'shoulder-pain',
                'title' => 'Shoulder Pain & Rotator Cuff Tendonitis',
                'short_summary' => 'The shoulder is the most mobile joint in the body, making it susceptible to impingement, bursitis, and rotator cuff strain when stability is lost.',
                'causes' => 'Subacromial space narrowing, repetitive overhead reaching, rotator cuff tendon wear, or scapular dyskinesis.',
                'symptoms' => 'Sharp pain when reaching overhead, difficulty sleeping on affected side, weakness when lifting arm.',
                'therapy_approach' => 'Rotator cuff re-centering, subacromial decompression techniques, posture restoration, and progressive resistance loading.',
                'when_to_seek_care' => 'If shoulder pain disrupts sleep or prevents reaching into high cupboards.',
                'faqs' => [
                    ['q' => 'What is frozen shoulder?', 'a' => 'Frozen shoulder (adhesive capsulitis) causes severe stiffness and pain. Gentle early-stage manual therapy preserves capsular mobility and shortens recovery timeframe.']
                ],
                'image_url' => '/images/active-rehab.jpg',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'sciatica',
                'title' => 'Sciatica & Nerve Compression',
                'short_summary' => 'Irritation of the sciatic nerve can radiate sharp or burning sensations from the lower back through the hip and leg down to the foot.',
                'causes' => 'Lumbar disc bulge, piriformis syndrome, spinal stenosis, or sacroiliac joint lock.',
                'symptoms' => 'Electric shock-like pain down one leg, numbness or pins-and-needles in calf, increased pain when sitting.',
                'therapy_approach' => 'Neural glides, lumbar decompression techniques, piriformis release, and abdominal pressure distribution exercises.',
                'when_to_seek_care' => 'Seek prompt evaluation if leg pain interferes with walking or sitting for more than 15 minutes.',
                'faqs' => [
                    ['q' => 'Can sciatica resolve without surgery?', 'a' => 'Over 90% of sciatica cases resolve successfully with targeted non-surgical physiotherapy within 6 to 8 weeks.']
                ],
                'image_url' => '/images/hero-patient.jpg',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'sports-injuries',
                'title' => 'Sports Injuries & Ligament Sprains',
                'short_summary' => 'Sudden twists, hamstring strains, or ankle sprains require structured rehabilitation to restore strength, agility, and joint position sense.',
                'causes' => 'High-impact directional changes, inadequate warm-up, muscular fatigue, or hyper-extension.',
                'symptoms' => 'Localized bruising, sharp pain upon weight bearing, joint instability or feeling like the ankle is giving way.',
                'therapy_approach' => 'Immediate acute swelling management, targeted proprioceptive balance re-training, sports-specific agility drills.',
                'when_to_seek_care' => 'Immediately after acute sprains to ensure proper ligament healing without residual instability.',
                'faqs' => [
                    ['q' => 'When can I play sports again?', 'a' => 'We utilize functional strength and hopping symmetry tests to give clear, objective clearance milestones before you return to competitive play.']
                ],
                'image_url' => '/images/active-rehab.jpg',
                'is_featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($conditions as $condition) {
            Condition::updateOrCreate(['slug' => $condition['slug']], $condition);
        }

        // 4. Testimonials
        $testimonials = [
            [
                'patient_name' => 'Sarah Jenkins',
                'condition' => 'Lower Back Pain & Sciatica',
                'review' => 'I had almost stopped playing tennis because of recurring lower back stiffness. Dr. Vance didn\'t just rub the sore spot — he evaluated how I was moving and taught me core control techniques that gave me my confidence back.',
                'rating' => 5,
                'photo_url' => '/images/hero-patient.jpg',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'patient_name' => 'David Miller',
                'condition' => 'Post-ACL Surgery Rehab',
                'review' => 'The one-on-one attention at CoreMove is night and day compared to standard group clinics. Every session had a clear purpose, and 4 months post-op I feel stronger than I did before my injury.',
                'rating' => 5,
                'photo_url' => '/images/doctor-headshot.jpg',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'patient_name' => 'Elena Rostova',
                'condition' => 'Chronic Cervical Neck Tension',
                'review' => 'As a software designer sitting 9 hours a day, I lived with severe neck tightness and daily afternoon tension headaches. Within 3 weeks of their treatment plan, the headaches completely stopped.',
                'rating' => 5,
                'photo_url' => '/images/manual-care.jpg',
                'is_featured' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['patient_name' => $t['patient_name']], $t);
        }

        // 5. FAQs
        $faqs = [
            [
                'question' => 'How does physiotherapy at CoreMove work?',
                'answer' => 'We start with a thorough 60-minute initial consultation where we listen to your health history, assess your joint mobility and movement mechanics, and explain the root cause of your discomfort in clear terms. We then design a personalized recovery roadmap combining hands-on treatment and guided exercise.',
                'category' => 'General',
                'sort_order' => 1,
            ],
            [
                'question' => 'How many sessions will I need?',
                'answer' => 'Every body is unique. Acute strains often show marked improvement in 3 to 4 sessions, while chronic long-standing issues or post-surgical recovery may take 6 to 10 sessions. We provide an honest timeline during your initial assessment so you know exactly what to expect.',
                'category' => 'General',
                'sort_order' => 2,
            ],
            [
                'question' => 'Do I need a doctor\'s referral before booking?',
                'answer' => 'No doctor referral is required. You can book an assessment directly with our clinical team. If your treatment requires co-management with an orthopedic specialist, we maintain active referral networks.',
                'category' => 'Booking',
                'sort_order' => 3,
            ],
            [
                'question' => 'What should I wear or bring to my first visit?',
                'answer' => 'Please wear comfortable, loose-fitting athletic clothing (e.g. shorts for lower limb/knee issues, comfortable top for shoulder/neck evaluation). Bring any recent X-rays or MRI reports if available.',
                'category' => 'First Visit',
                'sort_order' => 4,
            ],
            [
                'question' => 'Is physiotherapy treatment painful?',
                'answer' => 'Our treatments are delivered with gentle precision. While therapeutic mobilization of tight tissue may produce mild "good pain" soreness, we always work within your comfort threshold and adjust techniques based on your immediate feedback.',
                'category' => 'Treatment',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // 6. Active Promo Offer
        Offer::updateOrCreate(
            ['title' => 'Comprehensive 60-Min Physiotherapy Assessment'],
            [
                'description' => 'Receive an in-depth clinical movement evaluation, root-cause spinal/joint diagnosis, immediate hands-on relief treatment, and your personalized 4-week recovery roadmap.',
                'banner_url' => '/images/hero-patient.jpg',
                'offer_type' => 'Special Assessment Package',
                'value' => 'Save 40% on First Assessment',
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addDays(30)->format('Y-m-d'),
                'cta_text' => 'See If This Assessment Is Right For Me',
                'terms' => 'Valid for new patients only. Includes full 60-minute physical assessment and personalized treatment plan.',
                'is_active' => true,
            ]
        );

        // 7. Gallery
        $galleryItems = [
            ['title' => 'Welcome Reception Lounge', 'category' => 'Clinic', 'image_url' => '/images/hero-patient.jpg', 'alt_text' => 'Comfortable warm reception area at CoreMove Physio'],
            ['title' => 'Private Manual Therapy Room', 'category' => 'Treatment', 'image_url' => '/images/manual-care.jpg', 'alt_text' => 'Private, peaceful consultation suite'],
            ['title' => 'Movement Rehabilitation Studio', 'category' => 'Exercise', 'image_url' => '/images/active-rehab.jpg', 'alt_text' => 'Spacious wooden rehab floor with stability equipment'],
            ['title' => 'Lead Physiotherapist Consultation', 'category' => 'Team', 'image_url' => '/images/doctor-headshot.jpg', 'alt_text' => 'Dr. Marcus Vance in clinic studio'],
        ];

        foreach ($galleryItems as $item) {
            Gallery::updateOrCreate(['title' => $item['title']], $item);
        }

        // 8. Sample Leads for Admin Dashboard Demonstration
        $sampleLeads = [
            [
                'name' => 'Robert Chen',
                'phone' => '+1 (555) 234-5678',
                'email' => 'robert.chen@example.com',
                'condition' => 'Back Pain',
                'duration' => 'A few months',
                'impact' => ['Working', 'Sleeping'],
                'status' => 'New',
                'source' => 'Website Lead Flow',
                'utm_source' => 'google',
                'utm_medium' => 'cpc',
                'utm_campaign' => 'back_pain_search',
                'landing_page' => '/',
                'device_type' => 'Mobile (iPhone 14)',
                'browser' => 'Safari',
                'ip_address' => '127.0.0.1',
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Amanda Taylor',
                'phone' => '+1 (555) 876-5432',
                'email' => 'amanda.t@example.com',
                'condition' => 'Knee Pain',
                'duration' => 'More than 6 months',
                'impact' => ['Exercise', 'Walking'],
                'status' => 'Contacted',
                'source' => 'Website Lead Flow',
                'utm_source' => 'instagram',
                'utm_medium' => 'social',
                'utm_campaign' => 'knee_rehab_story',
                'landing_page' => '/conditions/knee-pain',
                'device_type' => 'Desktop (Macintosh)',
                'browser' => 'Chrome',
                'ip_address' => '127.0.0.1',
                'created_at' => now()->subDay(),
            ],
            [
                'name' => 'James Wilson',
                'phone' => '+1 (555) 456-7890',
                'email' => 'jwilson@example.com',
                'condition' => 'Post-Surgery Recovery',
                'duration' => 'A few weeks',
                'impact' => ['Daily activities', 'Walking'],
                'status' => 'Appointment Scheduled',
                'source' => 'Direct Appointment Request',
                'landing_page' => '/treatments',
                'device_type' => 'Mobile (Pixel 8)',
                'browser' => 'Chrome',
                'ip_address' => '127.0.0.1',
                'created_at' => now()->subDays(2),
            ],
        ];

        foreach ($sampleLeads as $lead) {
            Lead::create($lead);
        }
    }
}
