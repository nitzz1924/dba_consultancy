@extends('website.layout.websitemain')
@section('title', 'Privacy policy | ' . config('app.name'))
@section('content')

    <!-- Breadcrumb Area -->
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li>
                                <a href="{{ route('homepage')}}">Home</a>
                            </li>
                            <li>Privacy Policy</li>
                        </ul>
                        <h1>Privacy Policy</h1>
                        <p>Your privacy is important to us. This page outlines how we collect, use, and protect your
                            personal information when you use our services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Breadcrumb Area -->

    <section class="privacy-policy-section py-5">
        <div class="container">

            <div class="policy-content">
                <h4 class="mt-4">1. Information We Collect</h4>
                <p>We may collect and process the following types of information:</p>
                <ul>
                    <li><strong>Personal Information:</strong> Name, contact details (email, phone, address), and payment
                        information.</li>
                    <li><strong>Document Uploads:</strong> Files and documents related to legal and tax services that you
                        upload to our platform.</li>
                    <li><strong>Non-Personal Information:</strong> IP address, browser type, device details, and website
                        usage data.</li>
                    <li><strong>Transaction Information:</strong> Details of services purchased and payment history.</li>
                </ul>

                <h4 class="mt-4">2. How We Use Your Information</h4>
                <p>We use your information for the following purposes:</p>
                <ul>
                    <li><strong>Service Delivery:</strong> To process your requests, manage document filings, and deliver
                        the services you purchase.</li>
                    <li><strong>Customer Support:</strong> To address inquiries and resolve issues efficiently.</li>
                    <li><strong>Personalization:</strong> To improve and customize your experience on our platform.</li>
                    <li><strong>Compliance:</strong> To meet legal obligations, ensure compliance, and prevent fraud.</li>
                </ul>

                <h4 class="mt-4">3. Information Sharing and Disclosure</h4>
                <p>We do not sell or rent your personal information. However, we may share your data in the following
                    scenarios:</p>
                <ul>
                    <li><strong>With Service Providers:</strong> For payment processing, document management, and technical
                        support.</li>
                    <li><strong>Legal Obligations:</strong> When required by law or to protect our legal rights.</li>
                    <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or asset sale.</li>
                </ul>

                <h4 class="mt-4">4. Data Retention</h4>
                <p>We retain your personal data only as long as necessary for the purposes outlined in this policy or as
                    required by law.</p>

                <h4 class="mt-4">5. Cookies and Tracking Technologies</h4>
                <p>We use cookies to enhance your experience, analyze traffic, and remember preferences. You can manage
                    cookie settings through your browser.</p>

                <h4 class="mt-4">6. Security Measures</h4>
                <p>We implement robust security measures such as encryption, regular security assessments, and restricted
                    data access. However, no system can guarantee complete security.</p>

                <h4 class="mt-4">7. Your Rights</h4>
                <p>You have the following rights regarding your personal data:</p>
                <ul>
                    <li>Request access to your personal data.</li>
                    <li>Rectify inaccurate or incomplete information.</li>
                    <li>Request deletion of your data, subject to legal and contractual obligations.</li>
                    <li>Opt-out of marketing communications.</li>
                </ul>
                <p>To exercise these rights, please contact us at <strong>support@dbaconsultancy.in</strong>.</p>

                <h4 class="mt-4">8. Third-Party Links</h4>
                <p>Our web app may contain links to external websites. We are not responsible for their privacy practices.
                    Please review their policies before sharing information.</p>

                <h4 class="mt-4">9. Children's Privacy</h4>
                <p>Our services are not intended for individuals under 18 years of age, and we do not knowingly collect data
                    from minors.</p>

                <h4 class="mt-4">10. Updates to This Policy</h4>
                <p>We may update this Privacy Policy from time to time. Any changes will be posted here with the updated
                    effective date.</p>

                <h4 class="mt-4">11. Contact Us</h4>
                <p>If you have any questions or concerns regarding this policy, please contact us:</p>
                
                <div class="contact-info">
                    <strong>DBA Consultancy</strong>
                    <p><strong>Email:</strong> <a href="mailto:info@dbaconsultancy.in">info@dbaconsultancy.in</a></p>
                    <p><strong>Phone:</strong> +91 9460574344</p>
                    <p><strong>Address:</strong> DBA Consultancy, Near Truck Chouraha, NH 8, Bhim, Distt. Rajsamand, Rajasthan - 305921</p>
                </div>
            </div>
        </div>
    </section>


@endsection
