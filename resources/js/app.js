import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function () {
    // 1. Setup CSRF for all AJAX calls
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // 2. Lead Modal Management & Multi-step Logic
    let leadData = {
        condition: '',
        duration: '',
        impact: [],
        name: '',
        phone: '',
        email: ''
    };
    let currentStep = 1;

    function openLeadModal(preselectedCondition = '') {
        currentStep = 1;
        if (preselectedCondition) {
            leadData.condition = preselectedCondition;
            // Highlight selected condition button in modal step 1 if exists
            $('.modal-condition-btn').removeClass('border-dark-green bg-sage-light/50 text-dark-green').addClass('border-beige bg-white text-charcoal');
            $(`.modal-condition-btn[data-condition="${preselectedCondition}"]`).addClass('border-dark-green bg-sage-light/50 text-dark-green');
        }
        updateStepUI();
        $('#leadModal').removeClass('hidden').addClass('flex');
        $('body').addClass('overflow-hidden');
    }

    function closeLeadModal() {
        $('#leadModal').addClass('hidden').removeClass('flex');
        $('body').removeClass('overflow-hidden');
    }

    function updateStepUI() {
        $('.lead-step').addClass('hidden');
        $(`.lead-step[data-step="${currentStep}"]`).removeClass('hidden').addClass('animate-fade-in');
        
        // Update Step Progress indicator
        $('.step-indicator-bar').css('width', `${(currentStep / 4) * 100}%`);
        $('.step-number-text').text(`Step ${currentStep} of 4`);

        // Enable/Disable step next buttons
        if (currentStep === 1) {
            $('#btnNextStep1').prop('disabled', !leadData.condition);
        } else if (currentStep === 2) {
            $('#btnNextStep2').prop('disabled', !leadData.duration);
        } else if (currentStep === 3) {
            $('#btnNextStep3').prop('disabled', leadData.impact.length === 0);
        }
    }

    // Open Lead Modal Triggers
    $(document).on('click', '.open-lead-modal', function (e) {
        e.preventDefault();
        const condition = $(this).data('condition') || '';
        openLeadModal(condition);
    });

    $(document).on('click', '.close-lead-modal', function () {
        closeLeadModal();
    });

    // Modal Background Click
    $('#leadModal').on('click', function (e) {
        if (e.target === this) {
            closeLeadModal();
        }
    });

    // Step 1: Select Condition
    $(document).on('click', '.modal-condition-btn', function () {
        $('.modal-condition-btn').removeClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold').addClass('border-beige bg-white text-charcoal');
        $(this).addClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold');
        leadData.condition = $(this).data('condition');
        $('#btnNextStep1').prop('disabled', false);
    });

    // Step 2: Select Duration
    $(document).on('click', '.modal-duration-btn', function () {
        $('.modal-duration-btn').removeClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold').addClass('border-beige bg-white text-charcoal');
        $(this).addClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold');
        leadData.duration = $(this).data('duration');
        $('#btnNextStep2').prop('disabled', false);
    });

    // Step 3: Select Impact (Multi-select)
    $(document).on('click', '.modal-impact-btn', function () {
        const val = $(this).data('impact');
        if ($(this).hasClass('border-dark-green')) {
            $(this).removeClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold').addClass('border-beige bg-white text-charcoal');
            leadData.impact = leadData.impact.filter(i => i !== val);
        } else {
            $(this).addClass('border-dark-green bg-sage-light/50 text-dark-green font-semibold').removeClass('border-beige bg-white text-charcoal');
            if (!leadData.impact.includes(val)) {
                leadData.impact.push(val);
            }
        }
        $('#btnNextStep3').prop('disabled', leadData.impact.length === 0);
    });

    // Navigation between steps
    $('#btnNextStep1').on('click', function () { currentStep = 2; updateStepUI(); });
    $('#btnNextStep2').on('click', function () { currentStep = 3; updateStepUI(); });
    $('#btnNextStep3').on('click', function () { currentStep = 4; updateStepUI(); });

    $('.btn-prev-step').on('click', function () {
        if (currentStep > 1) {
            currentStep--;
            updateStepUI();
        }
    });

    // Step 4: Submit Lead via AJAX
    $('#leadForm').on('submit', function (e) {
        e.preventDefault();
        const $submitBtn = $('#btnSubmitLead');
        $submitBtn.prop('disabled', true).html('<span class="inline-block animate-spin mr-2">↻</span> Submitting...');

        const formData = {
            condition: leadData.condition,
            duration: leadData.duration,
            impact: leadData.impact,
            name: $('#leadName').val(),
            phone: $('#leadPhone').val(),
            email: $('#leadEmail').val(),
            utm_source: getUrlParameter('utm_source'),
            utm_medium: getUrlParameter('utm_medium'),
            utm_campaign: getUrlParameter('utm_campaign'),
            landing_page: window.location.pathname
        };

        $.ajax({
            url: '/api/leads',
            method: 'POST',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function (res) {
                $('.lead-step').addClass('hidden');
                $('#leadSuccessState').removeClass('hidden').addClass('animate-fade-in');
                $('.modal-progress-container').addClass('hidden');
            },
            error: function (xhr) {
                $submitBtn.prop('disabled', false).text('Help Me With My Problem');
                alert(xhr.responseJSON?.message || 'Something went wrong. Please try again.');
            }
        });
    });

    // 3. Interactive "What's Bothering You?" Homepage Switcher
    $(document).on('click', '.problem-tab-btn', function () {
        const problemKey = $(this).data('problem');
        $('.problem-tab-btn').removeClass('active-tab bg-dark-green text-white border-dark-green shadow-soft').addClass('bg-white text-charcoal border-beige hover:border-sage');
        $(this).addClass('active-tab bg-dark-green text-white border-dark-green shadow-soft').removeClass('bg-white text-charcoal border-beige');

        $('.problem-detail-card').addClass('hidden');
        $(`.problem-detail-card[data-problem-card="${problemKey}"]`).removeClass('hidden').addClass('animate-fade-in');
    });

    // 4. Exit Intent Modal Trigger (Desktop only, 1 per session)
    let exitIntentTriggered = sessionStorage.getItem('exitIntentShown') === 'true';
    if (!exitIntentTriggered && window.innerWidth >= 1024) {
        $(document).on('mouseleave', function (e) {
            if (e.clientY <= 10 && !exitIntentTriggered) {
                exitIntentTriggered = true;
                sessionStorage.setItem('exitIntentShown', 'true');
                $('#exitIntentModal').removeClass('hidden').addClass('flex');
                $('body').addClass('overflow-hidden');
            }
        });
    }

    $(document).on('click', '.close-exit-modal', function () {
        $('#exitIntentModal').addClass('hidden').removeClass('flex');
        $('body').removeClass('overflow-hidden');
    });

    // 5. Contact Form Submission (AJAX)
    $('#publicContactForm').on('submit', function (e) {
        e.preventDefault();
        const $btn = $(this).find('button[type="submit"]');
        const $msgBox = $('#contactFormStatus');
        
        $btn.prop('disabled', true).html('Sending...');
        
        const data = {
            name: $('#contactName').val(),
            phone: $('#contactPhone').val(),
            email: $('#contactEmail').val(),
            subject: $('#contactSubject').val(),
            message: $('#contactMessage').val()
        };

        $.ajax({
            url: '/api/enquiries',
            method: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (res) {
                $btn.prop('disabled', false).html('Send Message');
                $msgBox.removeClass('hidden error-msg').addClass('bg-sage-light text-dark-green p-4 rounded-xl font-medium')
                    .text('Thank you. We have received your message and will contact you shortly.');
                $('#publicContactForm')[0].reset();
            },
            error: function (xhr) {
                $btn.prop('disabled', false).html('Send Message');
                $msgBox.removeClass('hidden').addClass('bg-red-50 text-red-700 p-4 rounded-xl text-sm')
                    .text(xhr.responseJSON?.message || 'Error submitting message. Please call us directly.');
            }
        });
    });

    // 6. Appointment Modal Triggers & AJAX Form Submission
    $(document).on('click', '.open-appointment-modal', function (e) {
        e.preventDefault();
        $('#appointmentModal').removeClass('hidden').addClass('flex');
        $('body').addClass('overflow-hidden');
    });

    $(document).on('click', '.close-appointment-modal', function () {
        $('#appointmentModal').addClass('hidden').removeClass('flex');
        $('body').removeClass('overflow-hidden');
    });

    $('#appointmentModal').on('click', function (e) {
        if (e.target === this) {
            $('#appointmentModal').addClass('hidden').removeClass('flex');
            $('body').removeClass('overflow-hidden');
        }
    });

    $('#appointmentModalForm').on('submit', function (e) {
        e.preventDefault();
        const $btn = $('#btnSubmitAppointment');
        $btn.prop('disabled', true).html('<span class="inline-block animate-spin mr-2">↻</span> Booking...');

        const data = {
            name: $('#modalApptName').val(),
            phone: $('#modalApptPhone').val(),
            email: $('#modalApptEmail').val(),
            service_id: $('#modalApptService').val(),
            preferred_date: $('#modalApptDate').val(),
            preferred_time: $('#modalApptTime').val(),
            message: $('#modalApptMessage').val()
        };

        $.ajax({
            url: '/api/appointments',
            method: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (res) {
                $('#appointmentModalForm').addClass('hidden');
                $('#appointmentSuccessState').removeClass('hidden').addClass('animate-fade-in');
            },
            error: function (xhr) {
                $btn.prop('disabled', false).html('Confirm Appointment Request');
                alert(xhr.responseJSON?.message || 'Could not schedule appointment. Please try again.');
            }
        });
    });


    // 7. Mobile Drawer Navigation Toggle
    $('#mobileMenuBtn').on('click', function () {
        $('#mobileNavDrawer').toggleClass('hidden');
        $('body').toggleClass('overflow-hidden');
    });
    $('.close-mobile-nav').on('click', function () {
        $('#mobileNavDrawer').addClass('hidden');
        $('body').removeClass('overflow-hidden');
    });

    // 8. FAQ Accordion Toggle
    $(document).on('click', '.faq-accordion-header', function () {
        const $item = $(this).closest('.faq-accordion-item');
        const $body = $item.find('.faq-accordion-body');
        const $icon = $(this).find('.faq-icon');

        if ($body.hasClass('hidden')) {
            $('.faq-accordion-body').addClass('hidden');
            $('.faq-icon').text('+');
            $body.removeClass('hidden');
            $icon.text('−');
        } else {
            $body.addClass('hidden');
            $icon.text('+');
        }
    });

    // Helper: Parse URL parameters
    function getUrlParameter(sParam) {
        const sPageURL = window.location.search.substring(1);
        const sURLVariables = sPageURL.split('&');
        for (let i = 0; i < sURLVariables.length; i++) {
            const sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return '';
    }
});

