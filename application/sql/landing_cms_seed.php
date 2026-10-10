<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$brand = 'Dontia Care Clinic-Dental';
$defaults = 'admin/webroot/uploads/dental_page/defaults/';
$svc_dir = 'admin/webroot/uploads/dental_page/services/';
$tech_dir = 'admin/webroot/uploads/dental_page/technology/';
$ba_dir = 'assets/images/successful-transformation/';

$page_defaults = array(
	'status' => 'active',
	'brand_name' => $brand,
	'hero_heading' => '',
	'hero_subheading' => '',
	'hero_image' => '',
	'hero_image_alt' => '',
	'hero_video_id' => '',
	'intro_heading' => '',
	'intro_html' => '',
	'intro_image' => '',
	'intro_image_alt' => '',
	'extra_html' => '',
	'why_heading' => 'Why We Are the Best Dental Clinic in Kolkata',
	'why_subheading' => 'Why Choose Us',
	'specialisations_heading' => 'Dental Specialisation',
	'specialisations_subheading' => 'We provide a specialised dental doctor for every specialisation at our Smile Dental Clinic in Kolkata.',
	'stats_heading' => 'Our Dental Journey',
	'services_heading' => 'Dental Services',
	'services_subheading' => 'Comprehensive dental care solutions tailored to your needs.',
	'doctors_heading' => 'Meet Our Dentist in Kolkata',
	'procedures_heading' => 'Dental Procedures',
	'procedures_subheading' => 'Comprehensive dental care tailored to your needs.',
	'tech_heading' => 'Dental Technology',
	'transform_heading' => 'Successful Transformations',
	'testimonials_heading' => 'Patient Testimonials',
	'testimonials_subheading' => 'Real patient experiences and transformations shared directly from our patients',
	'reviews_heading' => 'Google Reviews',
	'reviews_subheading' => 'See what our patients are saying about their experience at ' . $brand,
	'reviews_url' => 'https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9',
	'gallery_heading' => 'Our Gallery',
	'gallery_subheading' => 'Meet our team and see our commitment to excellence',
	'certs_heading' => 'Dental Certificates & Awards',
	'certs_subheading' => 'Our commitment to excellence recognized through prestigious certifications and awards',
	'blog_heading' => 'Latest From Our Blog',
	'blog_subheading' => 'Stay informed with our latest articles on dental health and care',
	'faq_heading' => 'Frequently Asked Questions',
	'faq_subheading' => 'Find answers to common questions about our dental services',
	'cta_heading' => 'Book Your Consultation Today',
	'cta_html' => '<p>Visit Dontia Care Clinic-Dental in Bhowanipore or Chinar Park. Our team will help you plan the right treatment.</p>',
	'show_specialisations' => 1,
	'show_stats' => 1,
	'show_services' => 1,
	'show_doctors' => 1,
	'show_procedures' => 1,
	'show_tech' => 1,
	'show_transformations' => 1,
	'show_videos' => 1,
	'show_reviews' => 1,
	'show_gallery' => 1,
	'show_certs' => 1,
	'show_blogs' => 1,
	'show_faqs' => 1,
	'show_locations' => 0,
	'show_extra' => 0,
	'show_cta' => 0,
);

$pack = function ($over) use ($page_defaults) {
	return array_merge($page_defaults, $over);
};

$item = function ($page, $section, $title, $description = '', $image = '', $alt = '', $link = '', $sort = 0, $image2 = '', $alt2 = '') {
	return array(
		'page_key' => $page,
		'section_key' => $section,
		'title' => $title,
		'description' => $description,
		'image_name' => $image,
		'image_alt' => ($alt !== '' ? $alt : $title),
		'image_name_2' => $image2,
		'image_alt_2' => $alt2,
		'link_url' => $link,
		'sort_order' => $sort,
		'status' => 'active',
	);
};

$pages = array(
	$pack(array(
		'page_key' => 'dental',
		'page_label' => 'Best Dental Clinic',
		'hero_heading' => $brand,
		'hero_subheading' => 'Your One-Stop Destination for a Radiant Smile & Dental Needs',
		'hero_image' => $defaults . 'Koel_Mallick_with_dentist_in_kolkata.JPG.jpeg',
		'hero_image_alt' => 'Dental clinic banner — Dontia Care Clinic-Dental in Kolkata',
		'intro_heading' => 'Welcome To ' . $brand . ' in Kolkata',
		'intro_html' => '<p>Founded in 2001, ' . $brand . ' is Kolkata\'s premier destination for advanced dental care. We bring comprehensive care with precision, compassion, and cutting-edge technology for our patients. We are also termed as a celebrity dental clinic as one of our clients is Koel Mallick, a renowned Bengali actress making us the top dental clinic.</p><p>As the only <strong>Dawson Academy-trained dentist in Eastern India</strong>, ' . $brand . ' is widely recognized for smile design, dental implants, root canals, braces, and more - performed by a team of best dentists in Kolkata using state-of-the-art equipment and techniques.</p><p>With an unwavering focus on safety, precision, and patient satisfaction, ' . $brand . ' is where <strong>science meets artistry</strong> - creating brighter smiles.</p>',
		'intro_image' => $defaults . 'IMG_1707.JPG',
		'intro_image_alt' => $brand,
		'show_locations' => 0,
		'show_extra' => 0,
		'show_cta' => 0,
	)),
	$pack(array(
		'page_key' => 'orthodontist',
		'page_label' => 'Orthodontist',
		'hero_heading' => 'Transform your Smile with the Best Orthodontist in Kolkata',
		'hero_subheading' => 'Braces, aligners, and personalized bite correction at Dontia Care Clinic.',
		'hero_image' => 'assets/images/orthodontist/braces-before-after-2.png',
		'hero_image_alt' => 'Orthodontic braces before and after treatment in Kolkata',
		'intro_heading' => 'Transform your Smile with the Best Orthodontist in Kolkata',
		'intro_html' => '<p>Do you have misaligned teeth and are facing a chewing or bite problem? The best solution is to straighten teeth. Want to find an effective way for the treatment? Then it is important to find out the best orthodontist in Kolkata who has the expertise to offer proper treatment and the best results. We always want perfectly aligned teeth for you. The experienced and well-trained team of good orthodontists in Kolkata can design a personalized treatment plan for you. It can meet all individual requirements.</p>',
		'intro_image' => 'assets/images/orthodontist/braces-before-after-1.png',
		'intro_image_alt' => 'Orthodontic treatment results at Dontia Care Clinic',
		'why_heading' => 'Choosing Dontia Care Clinic for Dental Braces in Kolkata',
		'services_heading' => 'Types of Orthodontic Services We Offer',
		'doctors_heading' => 'Our Experienced Orthodontists',
		'transform_heading' => 'Before / After Images',
		'faq_heading' => 'Frequently Asked Questions',
		'extra_html' => '<h2>Benefits of Orthodontic Treatment</h2><p>Straightening teeth can improve bite function, oral hygiene, speech, and confidence. Treatment is planned around your teeth, jaw, and lifestyle — including braces and clear aligner options when suitable.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Book your orthodontic consultation',
		'cta_html' => '<p>Meet our orthodontists in Bhowanipore or Chinar Park and get a personalised braces or aligner plan.</p>',
	)),
	$pack(array(
		'page_key' => 'dental_implant',
		'page_label' => 'Dental Implant',
		'hero_heading' => 'Best Dental Implant Clinic in Kolkata',
		'hero_subheading' => 'Expert dentists for a perfect smile — restore your lost smile',
		'hero_image' => 'assets/images/dental-implant/hero-banner.jpg',
		'hero_image_alt' => 'Dental implant treatment at Dontia Care Clinic in Kolkata',
		'intro_heading' => 'Best Dental Implant Clinic in Kolkata',
		'intro_html' => '<p>At some point in our lives, most of us need to find the best dental implant clinic in Kolkata for our missing teeth and to restore our smile. If you have any needs for dental implants, feel free to contact us as we are the renowned clinic with a team of expert dentists, advanced technology and tools, and personalized care tailored to your requirements. Our patients are our main concern. So you can get world-class service at an affordable price.</p><p>With us, it is confirmed that you can get a permanent solution for your missing teeth. Our best dental implant specialists are knowledgeable enough to offer a permanent solution for your missing teeth. With our advanced service and technology, you can get teeth that look and function just like natural teeth.</p>',
		'intro_image' => 'assets/images/dental-implant/hero-banner.jpg',
		'intro_image_alt' => 'Dental implant clinic in Kolkata',
		'doctors_heading' => 'Meet our Experienced and Qualified Dental Implantologists',
		'services_heading' => 'Our dental implant procedure in Kolkata',
		'faq_heading' => 'Frequently asked questions',
		'extra_html' => '<h2>What Are Dental Implants?</h2><p>Dental implants are a long-term way to replace missing teeth. A biocompatible post is placed in the jaw, then restored with a crown, bridge, or denture so the tooth looks and functions naturally.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Book your consultation today',
		'cta_html' => '<p>Restore missing teeth with expert implantologists and internationally recognised implant systems.</p>',
	)),
	$pack(array(
		'page_key' => 'root_canal',
		'page_label' => 'Root Canal',
		'hero_heading' => 'Root Canal Treatment in Kolkata – Painless & Advanced Care',
		'hero_subheading' => 'Expert endodontists, modern technology, and same-day relief from tooth pain at Dontia Care Clinic-Dental.',
		'hero_image' => 'assets/images/root-canal-treatment/section-1-Root-canal-treatment-in-kolkat (1).jpeg',
		'hero_image_alt' => 'Root canal treatment in Kolkata at Dontia Care Clinic-Dental',
		'intro_heading' => 'Painless Root Canal Treatment in Kolkata',
		'intro_html' => '<p>Severe tooth pain doesn\'t have to become tooth loss. Get painless root canal treatment in Kolkata with advanced technology that saves your natural tooth and restores your smile. At Dontia Care Clinic-Dental, we use modern technology and tools, and anaesthesia techniques to offer painless root canal treatment (RCT) in Kolkata.</p><p>An infected tooth can disrupt daily activities. We have a dedicated team that uses advanced root canal methods to help you overcome infection while preserving your original tooth. We prioritise long-term oral solutions instead of temporary extraction through a personalised RCT treatment.</p>',
		'intro_image' => 'assets/images/root-canal-treatment/section-1-Root-canal-treatment-in-kolkat (1).jpeg',
		'intro_image_alt' => 'Root canal treatment in Kolkata at Dontia Care Clinic-Dental',
		'why_heading' => 'Why Choose Dontia Care Clinic-Dental?',
		'services_heading' => 'Signs You May Need a Root Canal',
		'faq_heading' => 'Frequently Asked Questions (FAQs)',
		'extra_html' => '<h2>What is Root Canal Treatment (RCT)?</h2><p>Root canal treatment helps remove infected pulp from inside the tooth. The tooth is then sealed and usually protected with a crown to prevent future infection and restore chewing.</p><h2>Root Canal Treatment Cost in Kolkata</h2><p>RCT cost typically ranges from INR 6,500 to INR 14,000 depending on the tooth and crown type. Laser RCT may range from INR 6,500 to INR 16,000. Your dentist will confirm after examination.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Book Your Consultation Today',
		'cta_html' => '<p>Get relief from tooth pain with expert endodontists at Bhowanipore or Chinar Park.</p>',
	)),
	$pack(array(
		'page_key' => 'cosmetic_dentist',
		'page_label' => 'Cosmetic Dentist',
		'hero_heading' => 'Best Cosmetic Dentist in Kolkata at Dontia Care Clinic – Transform Your Smile',
		'hero_subheading' => 'Celebrity-trusted cosmetic dentistry in Bhowanipore — personalised smile enhancements that look natural and last.',
		'hero_image' => 'admin/webroot/uploads/banner/Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg',
		'hero_image_alt' => 'Koel Mallick with dentist at Dontia Care Clinic in Kolkata',
		'intro_heading' => 'Modern Cosmetic Dentistry and a Confident Smile',
		'intro_html' => '<p>Have you ever wondered why celebrities have such wonderful, beautiful smiles? You might have wondered if it\'s their natural smile, but they also have the same natural teeth as we do; unlike the common person, they have undergone cosmetic enhancements.</p><p>At our dental clinic in Bhowanipore, Bengali film actress Koel Mallick has also undergone cosmetic dental treatment to enhance her smile, and worry not; we have the same treatment plan for you.</p><p>Our Cosmetic dentist at Dontia Care Clinic-Dental helps retain your confidence in your smile by improving your tooth form through groundbreaking cosmetic dental treatments.</p>',
		'intro_image' => 'admin/webroot/uploads/banner/Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg',
		'intro_image_alt' => 'Koel Mallick with dentist at Dontia Care Clinic in Kolkata',
		'why_heading' => 'Why Choose Dontia Care Clinic-Dental?',
		'services_heading' => 'Our Cosmetic Dental Services',
		'faq_heading' => 'Frequently Asked Questions (FAQs)',
		'extra_html' => '<h2>Who Is Cosmetic Dentistry For?</h2><p>Cosmetic dentistry can help with discolouration, gaps, chips, and irregular teeth when gums and teeth are healthy — typically after adult teeth have fully grown.</p><h2>Cost of a Cosmetic Dental Treatment in Kolkata</h2><p>Cost depends on the procedure (whitening, bonding, veneers, or a full smile makeover). Your dentist will share a personalised estimate after a consultation and photographs.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Book Your Cosmetic Dental Consultation Today',
		'cta_html' => '<p>Plan a natural-looking smile makeover with our cosmetic dental team in Kolkata.</p>',
	)),
	$pack(array(
		'page_key' => 'tmj_specialist',
		'page_label' => 'TMJ Specialist',
		'hero_heading' => 'Best TMJ Specialist in Kolkata, India',
		'hero_subheading' => 'Expert assessment and treatment for jaw pain, clicking, headaches, and TMJ disorders — conservative-first care at Dontia Care Clinic.',
		'hero_image' => 'assets/images/tmj/yt-lcp-poster.jpg',
		'hero_image_alt' => 'TMJ specialist consultation at Dontia Care Clinic in Kolkata',
		'hero_video_id' => 'dszEUoxTmKk',
		'intro_heading' => 'Best TMJ Specialist in Kolkata, India',
		'intro_html' => '<p>If you need the <strong>best TMJ specialist in Kolkata</strong> for jaw clicking, oral discomfort, persistent headaches, popping sounds in the ears, tooth pain, or bite problems, Dontia Care Clinic is here to help. TMJ disorder can affect your temporomandibular joint over time — early assessment and a clear plan often make recovery smoother.</p>',
		'intro_image' => 'assets/images/branding/dr-prabhjeet-tmj-560w.jpg',
		'intro_image_alt' => 'Dr. Prabhjeet Sethi, TMJ specialist in Kolkata',
		'why_heading' => 'Why we are among the best TMJ clinics in Kolkata',
		'why_subheading' => 'Experienced specialists, advanced diagnostics, and treatment paths tailored to you.',
		'services_heading' => 'Our TMJ treatment options in Kolkata',
		'doctors_heading' => 'Our doctors caring for TMJ patients',
		'extra_html' => '<h2>What is TMJ?</h2><p>The temporomandibular joints connect your jaw to the skull. TMJ disorders can cause pain, clicking, locking, headaches, and ear symptoms. Care at Dontia Care Clinic is conservative-first and may include splints, physiotherapy, bite therapy, and advanced options when needed.</p><h3>Experienced TMJ specialists</h3><p>Under the leadership of <strong>Dr. Prabhjeet Singh Sethi</strong> — Dawson Certified with 25+ years of experience — our team focuses on accurate diagnosis and predictable, jaw-friendly outcomes.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'faq_heading' => 'Frequently Asked Questions',
		'cta_heading' => 'Book your TMJ consultation today',
		'cta_html' => '<p>Jaw pain, clicking, or headaches? Get a conservative-first TMJ assessment in Kolkata.</p>',
	)),
	$pack(array(
		'page_key' => 'pediatric_dentist',
		'page_label' => 'Pediatric Dentist',
		'hero_heading' => 'Pediatric Dentist in Kolkata — Gentle and Expert Kids Dental Care at Dontia Care Clinic-Dental',
		'hero_subheading' => 'Focused, calm dental care for children in South Kolkata — routine checks, early treatment, and a kid-friendly clinic experience.',
		'hero_image' => 'assets/images/pediatic-dentist/When You Should Take Your Kid to a Pediatric Dentist-pedodontist-treating-patient-kolkat.jpeg',
		'hero_image_alt' => 'Pediatric dentist treating a child at Dontia Care Clinic in Kolkata',
		'intro_heading' => 'Gentle Kids Dental Care',
		'intro_html' => '<p>At Dontia Care Clinic-Dental, we understand the importance of childhood and provide focused dental care for your children. We assign our best pediatric dentist in South Kolkata to perform routine checks. This usually involves identifying early signs of dental issues and relevant treatments within a relaxed setting.</p><p>This gives a child a good overall feeling, which helps overcome the fear of treatment. Families trust us because we prioritise safe treatment at the right time.</p>',
		'intro_image' => 'assets/images/pediatic-dentist/When You Should Take Your Kid to a Pediatric Dentist-pedodontist-treating-patient-kolkat.jpeg',
		'intro_image_alt' => 'Pediatric dentist treating a child at Dontia Care Clinic in Kolkata',
		'why_heading' => 'Why Choose Dontia Care Clinic-Dental?',
		'services_heading' => 'Our Pediatric Dental Services',
		'doctors_heading' => 'Meet Our Pediatric Dentist',
		'faq_heading' => 'Frequently Asked Questions (FAQs)',
		'extra_html' => '<h2>What is Pediatric Dentistry?</h2><p>Kids’ dentistry is a specialised branch of dental care for children, including inherited tooth problems and gum diseases in growing children. Pediatric dentists differ from general practitioners in how they treat developing teeth and anxious young patients.</p><h2>Why Early Dental Care Matters</h2><p>Early visits help prevent cavities, guide eruption, and build comfort with the dentist. A first visit is often advised around 6 months of age, with check-ups about every 6 months.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Book Your Child’s Dental Appointment Today',
		'cta_html' => '<p>Kid-friendly check-ups, cavity care, sealants, and fluoride with a gentle pediatric dentist in Kolkata.</p>',
	)),
	$pack(array(
		'page_key' => 'clear_aligners',
		'page_label' => 'Clear Aligners',
		'hero_heading' => 'Clear Aligners – A Discreet Alternative to Traditional Braces',
		'hero_subheading' => 'Straighten your smile without the look of metal braces.',
		'hero_image' => 'assets/images/aligners/sonia shil 3.jpg',
		'hero_image_alt' => 'Before and after clear aligner treatment at Dontia Care Clinic, Kolkata',
		'intro_heading' => 'Straighten Your Smile Without the Look of Metal Braces',
		'intro_html' => '<p>Want straighter teeth but don\'t want traditional metal braces?</p><p>Clear aligners offer a discreet, removable way to straighten teeth without the brackets and wires associated with conventional braces. At Dontia Care Clinic, we provide personalized clear aligner treatment, including Invisalign, based on your teeth, bite, and treatment goals.</p><p>Whether you have crowded teeth, gaps, crooked teeth, or certain bite alignment concerns, our dental team can assess your smile and determine whether clear aligner treatment is suitable for you.</p>',
		'intro_image' => 'assets/images/aligners/sonia shil.jpg',
		'intro_image_alt' => 'Clear aligner results at Dontia Care Clinic, Kolkata',
		'why_heading' => 'Why Choose Dontia Care Clinic for Clear Aligners?',
		'services_heading' => 'Why Choose Clear Aligners?',
		'faq_heading' => 'Frequently Asked Questions',
		'extra_html' => '<h2>What Are Clear Aligners?</h2><p>Clear aligners are a series of custom-made, transparent trays designed to gradually move your teeth into planned positions. They are commonly described as an invisible braces alternative.</p><h2>Invisalign at Dontia Care Clinic</h2><p>Dontia Care Clinic provides Invisalign and other clear aligner options for suitable patients after a professional assessment of your teeth and bite.</p><h2>How Does Clear Aligner Treatment Work?</h2><p>After scanning and planning, you wear a sequence of trays (typically 20–22 hours a day for Invisalign unless advised otherwise), removing them to eat and clean. Follow-up visits monitor progress.</p>',
		'show_extra' => 1,
		'show_locations' => 1,
		'show_cta' => 1,
		'cta_heading' => 'Start Your Clear Aligner Journey',
		'cta_html' => '<p>Get assessed. Understand your options. Plan your smile with confidence — book a clear aligner consultation today.</p>',
	)),
);

$items = array();

$why_rows = array(
	array('25+ Years of Dental Experience', 'Safe, Hygienic & Comfortable Clinic Environment', $defaults . '25_Years_of_Dental_Experience.png'),
	array('Dawson Academy Certified Dentist', 'Highly Trained Dental Team', $defaults . 'Dawson_Academy_Certified_Dentist.png'),
	array('Advanced Technology & Techniques', 'Personalized & Compassionate Care', $defaults . 'Advanced_Dental_Technology_&_Techniques.png'),
	array('Same Day Crown', 'Excellent Treatment Results', $defaults . 'Same_Day_Crown.png'),
);
$n = 0;
foreach ($why_rows as $row) {
	$n++;
	$items[] = $item('dental', 'why_choose', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$spec_rows = array(
	array('General Dentist', 'Comprehensive oral health assessment including diagnosis, treatment planning, and routine dental care management.', $defaults . 'General_Dentist.png', ''),
	array('Implantologist', 'Surgical placement of dental implants with bone grafting procedures and advanced implant dentistry expertise.', $defaults . 'Implantologist.png', 'best-dental-implant-clinic-in-kolkata'),
	array('Cosmetic Dentist', 'Transform your smile with clear aligners, veneers, crowns, and professional whitening procedures.', $defaults . 'Cosmetic_Dentist.png', ''),
	array('TMJ Specialist', 'Expert treatment for temporomandibular joint disorders, jaw pain, and associated headaches.', $defaults . 'TMJ_Specialist.png', 'tmj-specialist-in-kolkata'),
	array('Orthodontist', 'Correction of misaligned, crowded, and crooked teeth using modern braces and aligner systems.', $defaults . 'Orthodontist.png', 'best-orthodontist-in-kolkata'),
	array('Pedodontist', 'Specialized pediatric dental care focused on preventive treatment and child-friendly oral health.', $defaults . 'Pedodontist.png', 'best-pediatric-dentist-in-kolkata'),
);
$n = 0;
foreach ($spec_rows as $row) {
	$n++;
	$items[] = $item('dental', 'specialisation', $row[0], $row[1], $row[2], $row[0], $row[3], $n);
}

$stat_rows = array(
	array('25,000+', 'Happy Patients', $defaults . 'Happy_Patients.png'),
	array('25+', 'Years Of Experience', $defaults . 'Years_Of_Experience.png'),
	array('10+', 'Dental Doctors', $defaults . 'Dental_Doctors.png'),
	array('20,000+', 'Dental Implants Placed', $defaults . 'Dental_Implants_Placed.png'),
);
$n = 0;
foreach ($stat_rows as $row) {
	$n++;
	$items[] = $item('dental', 'stat', $row[0], $row[1], $row[2], $row[1], '', $n);
}

$svc_rows = array(
	array('Full Mouth Rehabilitation', 'Complete transformation of your smile with smile designing procedure with crown, implant & bridges.', $svc_dir . 'Full_Mouth_Rehabilitation.png'),
	array('Dental Implants', 'Get back your lost smile with dental implants. All on 4/6 available to fix missing teeth.', $svc_dir . 'Dental_Implants.png'),
	array('Root Canal Treatment', 'Get relief from tooth pain & sensitivity with Root Canal procedure', $svc_dir . 'Root_Canal_Treatment.png'),
	array('General Dentistry', 'Dental checkup, cleanings, x-rays, fillings & gum disease treatment.', $svc_dir . 'General_Dentistry.png'),
	array('Cosmetic Dentistry', 'Improves the aesthetic appearance of teeth to boost confidence, discoloration, gaps & misalignment.', $svc_dir . 'Cosmetic_Dentistry.png'),
	array('Dentures', 'A quick replacement to missing teeth if you do not have teeth or left with few teeth.', $svc_dir . 'Dentures.png'),
	array('Tooth Extractions', 'This procedure is done if you are suffering from wisdom tooth pain, severe tooth decay, gum disease & dental trauma.', $svc_dir . 'Tooth_Extractions.png'),
	array('Dental Emergency', 'Get relief from sudden severe pain, prevent tooth loss, & infections. Visit our clinic during operating hours in bhowanipore & chinar park.', $svc_dir . 'Dental_Emergency.png'),
);
$n = 0;
foreach ($svc_rows as $row) {
	$n++;
	$items[] = $item('dental', 'service', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$proc_rows = array(
	array('Preventive Dentistry', 'Maintain oral health and prevent cavities, gum disease, enamel wear, and decay.'),
	array('Restorative Dentistry', 'Restore oral function and aesthetics through diagnosis, treatment, and reconstruction.'),
	array('Cosmetic Dentistry', 'Improve smile appearance with veneers, whitening, bonding, and crowns.'),
	array('Orthodontic Dentistry', 'Correct misalignment, bite issues, and crowded teeth with modern braces solutions.'),
	array('Dental Surgery', 'Specialized surgical procedures including extractions, gum surgery, and root-end treatment.'),
	array('Sedation Dentistry', 'Comfort-focused dental care options for anxious patients and long procedures.'),
);
$n = 0;
foreach ($proc_rows as $row) {
	$n++;
	$items[] = $item('dental', 'procedure', $row[0], $row[1], '', $row[0], '', $n);
}

$tech_rows = array(
	array('Intraoral Scanner', 'Digital impressions without messy moulds—faster visits, better fit for crowns and aligners, and a gentler experience.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('CEREC', 'Same-day ceramic crowns and inlays: we scan, design, and mill your restoration in one visit when suitable.', $tech_dir . 'Cerec.png'),
	array('Dental Laser', 'Precise soft-tissue work with less bleeding and often quicker healing—used where it benefits your treatment.', $tech_dir . 'Dental-Laser.jpg'),
);
$n = 0;
foreach ($tech_rows as $row) {
	$n++;
	$items[] = $item('dental', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$ba_rows = array(
	array('Chipped Tooth', $ba_dir . 'cosmetic-dental-veneer-treatment-for-chipped-tooth-fixation-kolkata-india-dontia-care-clinic-dental.jpeg', 'Chipped tooth veneer treatment before and after in Kolkata'),
	array('Gap Between Teeth', $ba_dir . 'cosmetic-dental-veneer-treatment-for-gap-between-teeth-kolkata-india-dontia-care-clinic-dental.jpeg', 'Gap between teeth veneer treatment before and after in Kolkata'),
	array('Veneers', $ba_dir . 'cosmetic-dental-veneer-treatment-for-teeth-gap-closure-kolkata-india-dontia-care-clinic-dental.jpeg', 'Cosmetic veneers for teeth gap closure before and after in Kolkata'),
	array('Dental Implants', $ba_dir . 'dental-implants-case-before-after-kolkata-india-dontia-care-clinic-dental.jpg', 'Dental implants case before and after in Kolkata'),
	array('Teeth Whitening', $ba_dir . 'teeth-whitening-treatment-kolkata.jpg', 'Teeth whitening treatment before and after in Kolkata'),
);
$n = 0;
foreach ($ba_rows as $row) {
	$n++;
	$items[] = $item('dental', 'transformation', $row[0], '', $row[1], $row[2], '', $n);
}

$faq_dental = array(
	array('Who is the most famous dentist?', 'Dr. Prabhjeet Sethi and Dr. Harleen Kaur are among the best-known dentists in Kolkata.'),
	array('What is the 2-2-2 rule in dentistry?', 'Brush twice a day for 2 minutes and visit your dentist at least 2 times a year.'),
	array('How often should I visit the dentist?', 'Most patients should visit every 6 months for checkups and cleaning. For gum disease or ongoing treatment, your dentist may advise more frequent visits.'),
	array('Do you treat children and senior citizens?', 'Yes. We provide age-appropriate preventive and restorative care for children, adults, and senior citizens in a comfortable setting.'),
	array('Do you provide skin care and ENT services?', 'Yes. Along with dental treatments, we provide specialist skin care and ENT consultations. You can choose the required category from the Services menu.'),
	array('Can I book appointments online?', 'Yes. Click on "Book An Appointment" and submit your details in the popup form. Our team will confirm your slot shortly.'),
	array('What payment methods do you accept?', 'We accept cash, UPI, cards, and major digital payment options. If you have a specific requirement, please contact our front desk before your visit.'),
	array('Do you provide emergency dental services?', 'Yes, emergency dental support is available during clinic timings at both locations.'),
);
$n = 0;
foreach ($faq_dental as $row) {
	$n++;
	$items[] = $item('dental', 'faq', $row[0], $row[1], '', '', '', $n);
}

$items[] = $item('dental', 'location', 'Bhowanipore, Elgin Road', '1.7 km (6-minute drive) from the iconic Victoria Memorial, making it easily accessible from Central and South Kolkata.', '', 'Bhowanipore clinic', '', 1);
$items[] = $item('dental', 'location', 'Chinar Park', '950m (4-minute drive) from City Centre 2, providing top-tier dental services to North Kolkata, New Town, Salt Lake and Rajarhat regions.', '', 'Chinar Park clinic', '', 2);

$faq_map = array(
	'orthodontist' => array(
		array('Is a dentist and an orthodontist the same? Who is better?', 'An orthodontist is specially trained for misaligned teeth and bite correction, while a dentist manages general oral health, cleanings, and cavities.'),
		array('Can an Orthodontist fix TMJ?', 'Yes, and we also have a TMJ specialist, Dr. Prabhjeet Singh Sethi, for TMJ treatment in Kolkata.'),
		array('Do orthodontists charge for broken brackets?', 'It depends on how many braces or brackets are broken and the treatment stage.'),
	),
	'dental_implant' => array(
		array('How long do dental implants last?', 'Success rates are above 97% long term. Like natural teeth, implants can last many years — often a lifetime — with proper care and maintenance.'),
		array('Most people avoid implants for fear of pain — why?', 'Although surgery is involved, it is minimally invasive. We use local anaesthesia for comfort so most patients report manageable, short-lived discomfort rather than severe pain.'),
		array('Does the dental implant procedure take a long time?', 'You need time for the implant to integrate with the jawbone; it cannot be completed in a single visit. Often you should plan for at least about 3 months of healing before final teeth in typical cases.'),
		array('Is the cost covered by insurance?', 'Many insurers offer partial coverage for implants, but benefits vary by plan. Contact our office and we’ll help you understand what your policy may cover.'),
	),
	'root_canal' => array(
		array('What is the RCT cost in Kolkata at your clinic?', 'The RCT cost ranges from INR 6,500 to INR 14,000, depending on the crown type and treatment approach. Laser RCT costs INR 6,500 to INR 16,000.'),
		array('Is Laser Root Canal Treatment worth the cost?', 'Yes. Laser RCT improves disinfection, reduces pain, and promotes faster healing.'),
		array('How many visits are required for RCT?', 'Standard RCT may require 1–2 visits. Laser and single-sitting RCT can often be completed in one appointment.'),
		array('Is RCT painful?', 'Modern RCT is typically painless due to local anaesthesia and advanced tools.'),
		array('Do I need a crown after RCT?', 'Yes. RCT-treated teeth become fragile and require a crown for protection and to restore chewing ability.'),
	),
	'cosmetic_dentist' => array(
		array('When is Cosmetic Dentistry recommended?', 'Cosmetic dentistry is an option when your adult teeth have grown in completely, which is usually after the age of 18, if your gums and teeth are healthy.'),
		array('How to select a suitable cosmetic dentist in Kolkata?', 'When you\'re visiting the best value Cosmetic Dentistry clinic in Kolkata, look for experience, before-and-after photos, a customized treatment plan, and effective communication.'),
		array('How many days does it take for a smile makeover?', 'This could take as long as 1 day for whitening, or 2 – 3 weeks for veneers or a full makeover.'),
	),
	'pediatric_dentist' => array(
		array('Is there an age to schedule a first visit?', 'About 6 months of age.'),
		array('How frequently should we consider check-ups?', 'Consider once every 6 months, or as advised by your consulting dentist.'),
		array('Is topical fluoride safe for kids?', 'Yes, if it is done under the care of an experienced expert.'),
		array('My kid has dental pain. What should I do?', 'Do not treat this as normal. Trust us for the rest, so the condition does not turn worse later.'),
	),
	'clear_aligners' => array(
		array('Are clear aligners the same as invisible braces?', 'The terms are often used interchangeably in everyday conversation. Clear aligners are transparent removable trays, while traditional braces use fixed brackets and wires.'),
		array('Can I straighten my teeth without braces?', 'For many suitable cases, yes. Clear aligners such as Invisalign can be used as an alternative orthodontic treatment to traditional braces. Suitability depends on your individual dental condition.'),
		array('Can clear aligners fix crooked teeth?', 'Clear aligners can treat many types of tooth alignment problems, including certain cases of crooked teeth. Your dentist needs to assess the severity and cause of the misalignment first.'),
		array('Can clear aligners fix crowded teeth?', 'They may be suitable for certain cases of dental crowding. More complex cases may require another orthodontic approach. A clinical assessment is necessary.'),
		array('Can I eat while wearing clear aligners?', 'Clear aligners are generally removed for eating and then replaced after cleaning your teeth and the aligners according to your dentist\'s instructions.'),
		array('How many hours a day should I wear clear aligners?', 'For Invisalign treatment, patients are generally instructed to wear aligners around 20–22 hours per day, removing them mainly for eating, drinking, and oral hygiene, unless their provider gives different instructions.'),
		array('How much do clear aligners cost?', 'The cost depends on your case complexity, treatment duration, aligner system, and treatment plan. During your consultation, Dontia Care Clinic can provide a personalized treatment estimate.'),
		array('Is Invisalign available at Dontia Care Clinic?', 'Yes. Dontia Care Clinic provides Invisalign treatment for suitable patients, along with clear aligner treatment options based on individual clinical requirements.'),
		array('Are clear aligners better than braces?', 'Clear aligners and braces have different advantages and limitations. The appropriate choice depends on your teeth, bite, treatment complexity, lifestyle, and clinical requirements.'),
	),
	'tmj_specialist' => array(
		array('What symptoms suggest a TMJ problem?', 'Jaw pain, clicking or popping, locking, headaches, ear symptoms, and bite changes can all relate to TMJ disorders. A clinical assessment is the right first step.'),
		array('Is TMJ treatment always surgery?', 'No. Care at Dontia Care Clinic is conservative-first and may include splints, physiotherapy, bite therapy, and lifestyle guidance. Surgery is considered only when necessary.'),
		array('Who treats TMJ at your clinic?', 'TMJ care is led by Dawson Certified dentist Dr. Prabhjeet Singh Sethi, with a team experienced in jaw-friendly diagnosis and treatment.'),
	),
);
foreach ($faq_map as $pk => $rows) {
	$n = 0;
	foreach ($rows as $row) {
		$n++;
		$items[] = $item($pk, 'faq', $row[0], $row[1], '', '', '', $n);
	}
}

$ortho_svc = array(
	array('Metal Braces', 'Reliable braces systems for predictable alignment and bite correction.'),
	array('Ceramic Braces', 'Tooth-coloured braces for a more discreet fixed-appliance option.'),
	array('Clear Aligners', 'Removable aligner treatment when clinically suitable for your bite.'),
	array('Retainers', 'Post-treatment retention so your new smile stays stable.'),
);
$n = 0;
foreach ($ortho_svc as $row) {
	$n++;
	$items[] = $item('orthodontist', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$items[] = $item('orthodontist', 'transformation', 'Braces result 1', '', 'assets/images/orthodontist/braces-before-after-1.png', 'Orthodontic braces before and after 1', '', 1);
$items[] = $item('orthodontist', 'transformation', 'Braces result 2', '', 'assets/images/orthodontist/braces-before-after-2.png', 'Orthodontic braces before and after 2', '', 2);
$n = 0;
foreach (array(
	array('Digital Treatment Planning', 'Advanced diagnostics and smile planning for precise and predictable orthodontic outcomes.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('Modern Braces Systems', 'Updated orthodontic systems designed for better comfort and efficient tooth movement.', $tech_dir . 'Cerec.png'),
	array('Comfort-Focused Care', 'Patient-friendly treatment process from consultation to post-treatment retention.', $tech_dir . 'Dental-Laser.jpg'),
) as $row) {
	$n++;
	$items[] = $item('orthodontist', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Consultation & 3D planning', 'Assessment, imaging, and a personalised implant plan.'),
	array('Implant placement', 'Minimally invasive surgery with local anaesthesia and comfort-focused care.'),
	array('Healing & restoration', 'After integration, a crown, bridge, or denture restores your smile.'),
) as $row) {
	$n++;
	$items[] = $item('dental_implant', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$n = 0;
foreach (array(
	array('Digital Planning & Diagnostics', 'Careful assessment and treatment planning with modern imaging for precise implant placement.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('Globally Renowned Implant Systems', 'International-quality implant systems chosen for reliability and long-term outcomes.', $tech_dir . 'Cerec.png'),
	array('Sedation & Comfortable Surgery', 'Sedation dentistry and local anaesthesia so your surgical visit stays as comfortable as possible.', $tech_dir . 'Baldus.jpg'),
) as $row) {
	$n++;
	$items[] = $item('dental_implant', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Severe toothache', 'Pain that lingers, especially with hot or cold foods.'),
	array('Swelling or gum boil', 'Infection around the tooth that needs prompt care.'),
	array('Deep decay or crack', 'Bacteria reaching the pulp through cavities or trauma.'),
	array('Darkened tooth', 'A tooth that has died or been injured may need RCT.'),
) as $row) {
	$n++;
	$items[] = $item('root_canal', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$n = 0;
foreach (array(
	array('Rotary Endodontic Technology', 'Modern rotary instruments for precise cleaning of root canals — faster, more comfortable, and highly effective.', $tech_dir . 'Dental-Laser.jpg'),
	array('Digital Diagnostics', 'Digital X-rays help us map infection accurately and plan a personalised root canal treatment.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('Comfort-Focused Anaesthesia', 'Advanced anaesthesia techniques keep RCT as painless and comfortable as possible throughout the visit.', $tech_dir . 'Baldus.jpg'),
) as $row) {
	$n++;
	$items[] = $item('root_canal', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Teeth Whitening', 'Brighten discoloured teeth with professional whitening.'),
	array('Veneers', 'Thin porcelain or composite covers to reshape chips, gaps, and shade.'),
	array('Dental Bonding', 'Repair small chips and close minor gaps in a conservative way.'),
	array('Smile Makeover', 'A planned combination of cosmetic procedures for a natural-looking result.'),
) as $row) {
	$n++;
	$items[] = $item('cosmetic_dentist', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$n = 0;
foreach (array(
	array('Digital Smile Design', 'Visualise your new smile before treatment begins with digital planning and smile design technology.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('3D Scanning & Precision Fit', 'Accurate digital footprints help us craft veneers, crowns, and restorations that look natural and fit seamlessly.', $tech_dir . 'Cerec.png'),
	array('Aesthetic Laser Care', 'Modern laser options for comfortable contouring and refined cosmetic outcomes when clinically appropriate.', $tech_dir . 'Dental-Laser.jpg'),
) as $row) {
	$n++;
	$items[] = $item('cosmetic_dentist', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Splint / night guard therapy', 'Custom appliances to protect teeth and unload the jaw joints.'),
	array('Physiotherapy & habit care', 'Jaw exercises, posture, and lifestyle guidance as part of conservative care.'),
	array('Bite / occlusal therapy', 'Adjusting how teeth meet when it contributes to TMJ strain.'),
	array('Advanced options when needed', 'Botox for TMJ or surgical referral only when conservative care is not enough.'),
) as $row) {
	$n++;
	$items[] = $item('tmj_specialist', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$n = 0;
foreach (array(
	array('Digital imaging & diagnosis', 'Digital X-rays and 3D imaging when needed to map your bite, joint, and airway — supporting accurate TMJ diagnosis.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('Splints & occlusal therapy', 'Custom night guards and splints designed to protect teeth from bruxism and unload the jaw joints.', $tech_dir . 'Cerec.png'),
	array('Comfort-focused TMJ care', 'From first consultation through physiotherapy or advanced options — we prioritise clear explanations and gentle, staged care.', $tech_dir . 'Dental-Laser.jpg'),
) as $row) {
	$n++;
	$items[] = $item('tmj_specialist', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Kids check-ups', 'Gentle examinations and early cavity detection.'),
	array('Fluoride & sealants', 'Preventive care to protect growing teeth.'),
	array('Cavity treatment', 'Child-friendly restorative care when needed.'),
	array('Emergency kids dental care', 'Prompt help for toothache, injury, or swelling.'),
) as $row) {
	$n++;
	$items[] = $item('pediatric_dentist', 'service', $row[0], $row[1], '', $row[0], '', $n);
}

$n = 0;
foreach (array(
	array('Discreet appearance', 'Transparent trays instead of metal brackets and wires.'),
	array('Removable for meals', 'Take aligners out to eat, then clean and replace them.'),
	array('Digital planning', 'A sequenced plan of tooth movement around your bite and goals.'),
	array('Invisalign option', 'Invisalign is available for suitable patients after assessment.'),
) as $row) {
	$n++;
	$items[] = $item('clear_aligners', 'service', $row[0], $row[1], '', $row[0], '', $n);
}
$n = 0;
foreach (array(
	array('Digital Scanning', 'Digital impressions can replace messy moulds and help plan aligner fit and tooth movement.', $tech_dir . 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
	array('Treatment Planning', 'A planned sequence of tooth movements is mapped around your current alignment and treatment goals.', $tech_dir . 'Cerec.png'),
	array('Professional Monitoring', 'Follow-up visits let your dentist review progress and adjust the plan when needed.', $tech_dir . 'Dental-Laser.jpg'),
) as $row) {
	$n++;
	$items[] = $item('clear_aligners', 'technology', $row[0], $row[1], $row[2], $row[0], '', $n);
}

return array('pages' => $pages, 'items' => $items);
