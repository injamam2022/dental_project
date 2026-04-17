import { useState } from 'react';
import Navigation from '../components/Navigation';
import Hero from '../components/Hero';
import About from '../components/About';
import DentalSpecialisation from '../components/DentalSpecialisation';
import WhyChooseUs from '../components/WhyChooseUs';
import Statistics from '../components/Statistics';
import Services from '../components/Services';
import Doctor from '../components/Doctor';
import DentalProcedures from '../components/DentalProcedures';
import DentalTechnology from '../components/DentalTechnology';
import BeforeAfter from '../components/BeforeAfter';
import PatientTestimonials from '../components/PatientTestimonials';
import GoogleReviews from '../components/GoogleReviews';
import Gallery from '../components/Gallery';
import CertificatesAwards from '../components/CertificatesAwards';
import FAQNew from '../components/FAQNew';
import BlogNew from '../components/BlogNew';
import AppointmentNew from '../components/AppointmentNew';
import FooterNew from '../components/FooterNew';
import FloatingBookButton from '../components/FloatingBookButton';
import AppointmentModal from '../components/AppointmentModal';

export default function DentalServices() {
  const [isModalOpen, setIsModalOpen] = useState(false);

  return (
    <div className="min-h-screen bg-white">
      <Navigation />
      {/* 1. Hero */}
      <Hero />
      {/* 2. Welcome To Dontia Care Clinic in Kolkata */}
      <About />
      {/* 3. Why We Are the Best Dental Clinic in Kolkata */}
      <WhyChooseUs />
      {/* 4. Dental Specialisation */}
      <DentalSpecialisation />
      {/* 5. Our Dental Journey */}
      <Statistics />
      {/* 6. Our Services */}
      <Services />
      {/* 7. Meet Our Dentist in Kolkata */}
      <Doctor />
      {/* 8. Dental Procedures */}
      <DentalProcedures />
      {/* 8.5. Dental Technology */}
      <DentalTechnology />
      {/* 9. Successful Transformations */}
      <BeforeAfter />
      {/* 10. Patient Testimonials (Videos) */}
      <PatientTestimonials />
      {/* 11. Google Reviews */}
      <GoogleReviews />
      {/* 12. Gallery */}
      <Gallery />
      {/* 13. Dental Certificates & Awards */}
      <CertificatesAwards />
      {/* 14. Dental Blogs */}
      <BlogNew />
      {/* 15. FAQ's */}
      <FAQNew />
      <AppointmentNew />
      <FooterNew />

      <FloatingBookButton onClick={() => setIsModalOpen(true)} />
      <AppointmentModal isOpen={isModalOpen} onClose={() => setIsModalOpen(false)} />
    </div>
  );
}
