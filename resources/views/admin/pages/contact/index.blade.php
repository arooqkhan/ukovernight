@extends('admin.master.main')

@section('content')

<div class="col-lg-12">
    <div class="d-flex align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="me-3">
            <i class="fas fa-address-card fa-2x" style="color: #1f2937;"></i>
        </div>
        <div>
            <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Contact Us</h4>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Company contact information</p>
        </div>
    </div>

    <div style="max-width: 700px; margin: 0 auto;">
        <div style="background: linear-gradient(to bottom, #ffffff, #f8fafc); border-radius: 16px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #e5e7eb;">
            <!-- Icon -->
            <div style="text-align: center; margin-bottom: 32px;">
                <div style="width: 64px; height: 64px; background: #ffffff; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 16px;">
                    <i class="fas fa-building" style="color: #1e293b; font-size: 1.5rem;"></i>
                </div>
                <h3 style="font-weight: 700; color: #0f172a; font-size: 1.75rem; margin-bottom: 8px;">Contact Information</h3>
                <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Get in touch with us</p>
            </div>

            <!-- Contact Details -->
            <div style="space-y: 20px;">
                <div style="margin-bottom: 24px; padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid #e5e7eb;">
                    <div style="display: flex; align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 16px; flex-shrink: 0;">
                            <i class="fas fa-building" style="color: #475569; font-size: 1.2rem;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="font-size: 0.85rem; color: #64748b; margin: 0 0 6px 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Company Name</p>
                            <p style="font-size: 1rem; color: #1e293b; margin: 0; font-weight: 600;">MAYFAIR CARE AGENCY LIMITED</p>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 24px; padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid #e5e7eb;">
                    <div style="display: flex; align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 16px; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="color: #475569; font-size: 1.2rem;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="font-size: 0.85rem; color: #64748b; margin: 0 0 6px 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Address</p>
                            <p style="font-size: 1rem; color: #1e293b; margin: 0; line-height: 1.6;">Room 4, Basepoint Evensham, Crab Apple Way Vale Park Evensham Worcs. WR111 GP</p>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 24px; padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid #e5e7eb;">
                    <div style="display: flex; align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 16px; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="color: #475569; font-size: 1.2rem;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="font-size: 0.85rem; color: #64748b; margin: 0 0 6px 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Email</p>
                            <a href="mailto:admin@mayfaircareagency.co.uk" style="font-size: 1rem; color: #3b82f6; text-decoration: none; font-weight: 500; transition: color 0.2s;">
                                admin@mayfaircareagency.co.uk
                            </a>
                        </div>
                    </div>
                </div>

                <div style="padding: 20px; background: #ffffff; border-radius: 12px; border: 1px solid #e5e7eb;">
                    <div style="display: flex; align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 16px; flex-shrink: 0;">
                            <i class="fas fa-phone" style="color: #475569; font-size: 1.2rem;"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="font-size: 0.85rem; color: #64748b; margin: 0 0 6px 0; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Phone</p>
                            <a href="tel:01386 41492" style="font-size: 1rem; color: #3b82f6; text-decoration: none; font-weight: 500; transition: color 0.2s;">
                                01386 41492
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>

<style>
    a[href^="mailto:"],
    a[href^="tel:"] {
        transition: color 0.2s;
    }
    a[href^="mailto:"]:hover,
    a[href^="tel:"]:hover {
        color: #2563eb !important;
        text-decoration: underline;
    }
</style>

@endsection
