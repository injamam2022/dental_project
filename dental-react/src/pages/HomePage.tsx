import { useState } from 'react';
import Navigation from '../components/Navigation';
import FooterNew from '../components/FooterNew';
import AppointmentModal from '../components/AppointmentModal';
import FloatingBookButton from '../components/FloatingBookButton';
import Statistics from '../components/Statistics';
import DentalTechnology from '../components/DentalTechnology';
import PatientTestimonials from '../components/PatientTestimonials';
import GoogleReviews from '../components/GoogleReviews';
import { ArrowRight, Award, Users, Heart, Clock, CheckCircle2, Star, MapPin, Phone } from 'lucide-react';

export default function HomePage() {
  const [isModalOpen, setIsModalOpen] = useState(false);

  const scrollToSection = (id: string) => {
    document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <div className="min-h-screen bg-white">
      <Navigation />

      {/* Hero Section */}
      <section id="home" className="relative pt-20 min-h-[600px] md:min-h-[700px] flex items-center bg-[#4C3A33]">
        <div className="container mx-auto px-4 relative z-10">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
              Welcome to Dontia Care Clinic
            </h1>
            <p className="text-xl md:text-2xl text-soft-ivory mb-8 leading-relaxed">
              Your One-Stop Destination for a Radiant Smile. Visit Dontia Retreat!
            </p>
            <button
              onClick={() => setIsModalOpen(true)}
              className="inline-flex items-center justify-center gap-2 bg-deep-brown text-white px-10 py-4 rounded-pill text-lg font-semibold hover:bg-deep-brown/90 transition-all duration-200 shadow-lg hover:shadow-xl"
            >
              Book Appointment
              <ArrowRight className="w-5 h-5" />
            </button>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              About Dontia Care Clinic
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto mb-8"></div>
          </div>

          <div className="grid md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">
            <div>
              <h3 className="text-2xl md:text-3xl font-bold text-charcoal-black mb-6">
                India's Trusted Professionals For A Radiant Smile
              </h3>
              <div className="space-y-4 text-charcoal-black/80 leading-relaxed">
                <p>
                  Welcome to Dontia Care Clinic, where your dental health and beautiful smile are our top priorities. Located in the heart of Newtown, Kolkata, we specialize in providing comprehensive dental, skin, and ENT care for patients of all ages.
                </p>
                <p>
                  With over 25 years of experience, our team of expert dentists and specialists is dedicated to delivering personalized care using the latest technology and evidence-based treatments. From routine checkups to advanced cosmetic procedures, we ensure every visit is comfortable and stress-free.
                </p>
                <p>
                  At Dontia Care Clinic, we believe in building lasting relationships with our patients. Our warm, welcoming environment and patient-first approach make us the preferred choice for families across Kolkata.
                </p>
                <p>
                  Whether you need a simple cleaning, orthodontic treatment, or a complete smile makeover, we're here to help you achieve optimal oral health and confidence.
                </p>
              </div>
            </div>

            <div className="grid grid-cols-2 gap-4">
              <img
                src="/01.png"
                alt="Clinic Interior"
                className="rounded-lg shadow-lg w-full h-48 object-cover"
              />
              <img
                src="/02.png"
                alt="Treatment Room"
                className="rounded-lg shadow-lg w-full h-48 object-cover"
              />
              <img
                src="/03.png"
                alt="Dental Equipment"
                className="rounded-lg shadow-lg w-full h-48 object-cover"
              />
              <img
                src="/04.png"
                alt="Team Photo"
                className="rounded-lg shadow-lg w-full h-48 object-cover"
              />
            </div>
          </div>
        </div>
      </section>


      {/* Our Services Section */}
      <section id="services" className="py-20 bg-soft-ivory">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              Our Services
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto"></div>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            {[
              { icon: '🦷', name: 'Dental Care', description: 'Comprehensive dental treatments for all ages' },
              { icon: '💆', name: 'Skin Care', description: 'Advanced dermatology and aesthetic treatments' },
              { icon: '👂', name: 'ENT Care', description: 'Expert ear, nose, and throat treatments' },
              { icon: '👑', name: 'Crown & Bridges', description: 'Restore damaged teeth with precision' },
              { icon: '✨', name: 'Teeth Whitening', description: 'Professional whitening for a brighter smile' },
              { icon: '📐', name: 'Orthodontics', description: 'Braces and aligners for perfect alignment' }
            ].map((service, index) => (
              <div key={index} className="bg-white rounded-lg p-8 text-center hover:shadow-xl transition-all duration-300 border border-[#E8E8E8]">
                <div className="w-20 h-20 rounded-full bg-[#F6EBE0] border-2 border-deep-brown flex items-center justify-center text-4xl mx-auto mb-4">
                  {service.icon}
                </div>
                <h3 className="text-xl font-semibold text-charcoal-black mb-3">
                  {service.name}
                </h3>
                <p className="text-charcoal-black/70 mb-4">
                  {service.description}
                </p>
                <button
                  onClick={() => setIsModalOpen(true)}
                  className="bg-deep-brown text-white px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#3A2C26] transition-colors duration-200"
                >
                  Book Now
                </button>
              </div>
            ))}
          </div>
        </div>
      </section>

      <DentalTechnology />

      {/* Testimonials Section */}
      <section className="py-20 bg-[#3B2C26] text-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold mb-4">
              Your Smile, Our Story
            </h2>
            <div className="w-24 h-1 bg-soft-ivory mx-auto mb-6"></div>
            <p className="text-soft-ivory/90 max-w-2xl mx-auto">
              Real stories from our satisfied patients who trusted us with their smiles
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            {[
              {
                name: 'Ananya Das',
                rating: 5,
                review: 'Exceptional care! The team made me feel comfortable throughout my root canal procedure. Highly recommended!'
              },
              {
                name: 'Rohit Sharma',
                rating: 5,
                review: 'Best dental clinic in Kolkata! Professional staff, modern equipment, and painless treatments.'
              },
              {
                name: 'Sneha Gupta',
                rating: 5,
                review: 'My entire family goes here. Dr. and team are amazing with kids and adults alike. Thank you!'
              }
            ].map((testimonial, index) => (
              <div key={index} className="bg-white/10 backdrop-blur-sm rounded-lg p-6">
                <div className="flex gap-1 mb-4">
                  {[...Array(testimonial.rating)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-primary-orange text-primary-orange" />
                  ))}
                </div>
                <p className="text-white/90 mb-4 italic">
                  "{testimonial.review}"
                </p>
                <div className="border-t border-white/20 pt-4">
                  <p className="font-semibold text-white">{testimonial.name}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Patient Cases - Before & After */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              Successful Transformations
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto mb-6"></div>
            <p className="text-charcoal-black/70 max-w-2xl mx-auto">
              See the transformations we've helped achieve
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            {[1, 2, 3].map((item) => (
              <div key={item} className="bg-soft-ivory rounded-lg overflow-hidden shadow-md">
                <div className="relative">
                  <img
                    src={`/before${item}.jpg`}
                    alt={`Before Treatment ${item}`}
                    className="w-full h-48 object-cover"
                    onError={(e) => {
                      e.currentTarget.src = 'https://images.pexels.com/photos/3845653/pexels-photo-3845653.jpeg?auto=compress&cs=tinysrgb&w=400';
                    }}
                  />
                  <div className="absolute top-2 left-2 bg-charcoal-black/80 text-white px-3 py-1 rounded text-sm font-semibold">
                    Before
                  </div>
                </div>
                <div className="relative">
                  <img
                    src={`/after${item}.jpg`}
                    alt={`After Treatment ${item}`}
                    className="w-full h-48 object-cover"
                    onError={(e) => {
                      e.currentTarget.src = 'https://images.pexels.com/photos/3779705/pexels-photo-3779705.jpeg?auto=compress&cs=tinysrgb&w=400';
                    }}
                  />
                  <div className="absolute top-2 left-2 bg-deep-brown text-white px-3 py-1 rounded text-sm font-semibold">
                    After
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <PatientTestimonials />

      <GoogleReviews />

      {/* Why Choose Us Section */}
      <section className="py-20 bg-[#3B2C26] text-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold mb-4">
              Why Dontia Care Clinic, the best dental and skin clinic in Rajarhat
            </h2>
            <div className="w-24 h-1 bg-soft-ivory mx-auto"></div>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            {[
              {
                icon: '👨‍⚕️',
                title: 'Experienced Professionals',
                description: '25+ years of expertise in dental and skin care'
              },
              {
                icon: '💎',
                title: 'Premium Quality Care',
                description: 'State-of-the-art equipment and techniques'
              },
              {
                icon: '💰',
                title: 'Affordable Pricing',
                description: 'Quality healthcare at competitive rates'
              },
              {
                icon: '🏆',
                title: 'Trusted by Thousands',
                description: '10,000+ satisfied patients and counting'
              },
              {
                icon: '🌟',
                title: 'Personalized Care',
                description: 'Customized treatment plans for every patient'
              },
              {
                icon: '⚡',
                title: 'Advanced Technology',
                description: 'Latest equipment for precise treatments'
              },
              {
                icon: '😊',
                title: 'Comfort First',
                description: 'Relaxing environment with caring staff'
              },
              {
                icon: '📅',
                title: 'Flexible Scheduling',
                description: 'Convenient appointment times for all'
              }
            ].map((item, index) => (
              <div key={index} className="bg-white/10 backdrop-blur-sm rounded-lg p-6 text-center">
                <div className="w-16 h-16 rounded-full bg-soft-ivory/20 flex items-center justify-center text-4xl mx-auto mb-4">
                  {item.icon}
                </div>
                <h3 className="text-lg font-semibold mb-2">
                  {item.title}
                </h3>
                <p className="text-soft-ivory/80 text-sm">
                  {item.description}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Meet Our Team */}
      <section id="doctors" className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              Meet Our Dentist in Kolkata
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto"></div>
          </div>

          <div className="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div className="bg-soft-ivory rounded-lg overflow-hidden">
              <img
                src="/ChatGPT_Image_Mar_6,_2026,_01_02_18_AM.png"
                alt="Doctor 1"
                className="w-full h-80 object-cover"
              />
              <div className="p-6 text-center">
                <h3 className="text-xl font-bold text-charcoal-black mb-2">
                  Dr. Rajesh Kumar
                </h3>
                <p className="text-deep-brown font-semibold mb-2">
                  BDS, MDS - Chief Dentist
                </p>
                <p className="text-charcoal-black/70 text-sm">
                  25+ years of experience in advanced dental care
                </p>
              </div>
            </div>

            <div className="bg-soft-ivory rounded-lg overflow-hidden">
              <img
                src="/ChatGPT_Image_Mar_6,_2026,_01_02_20_AM.png"
                alt="Doctor 2"
                className="w-full h-80 object-cover"
              />
              <div className="p-6 text-center">
                <h3 className="text-xl font-bold text-charcoal-black mb-2">
                  Dr. Priya Sharma
                </h3>
                <p className="text-deep-brown font-semibold mb-2">
                  BDS, MDS - Orthodontist
                </p>
                <p className="text-charcoal-black/70 text-sm">
                  Specialist in braces and smile correction
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Our Dental Journey Statistics */}
      <Statistics />

      {/* Gallery Section */}
      <section className="py-20 bg-soft-ivory">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              Our Gallery
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto"></div>
          </div>

          <div className="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-5xl mx-auto">
            {[1, 2, 3, 4, 5].map((num) => (
              <img
                key={num}
                src={`/0${num}.png`}
                alt={`Gallery ${num}`}
                className="w-full h-48 object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
              />
            ))}
          </div>
        </div>
      </section>

      {/* FAQ Section */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
              Still Have Doubts?
            </h2>
            <div className="w-24 h-1 bg-deep-brown mx-auto"></div>
          </div>

          <div className="max-w-3xl mx-auto space-y-4">
            {[
              {
                question: 'What are your clinic timings?',
                answer: 'We are open Monday to Saturday from 10 AM to 8 PM, and Sunday from 10 AM to 2 PM.'
              },
              {
                question: 'Do you accept insurance?',
                answer: 'Yes, we accept most major insurance plans. Please contact us for specific details.'
              },
              {
                question: 'Is parking available?',
                answer: 'Yes, we have ample parking space available for our patients.'
              },
              {
                question: 'Do you offer emergency dental services?',
                answer: 'Yes, we provide emergency dental services. Please call us immediately for urgent cases.'
              }
            ].map((faq, index) => (
              <div key={index} className="bg-soft-ivory rounded-lg p-6">
                <div className="flex items-start gap-3">
                  <CheckCircle2 className="w-6 h-6 text-deep-brown mt-1 flex-shrink-0" />
                  <div>
                    <h3 className="text-lg font-semibold text-charcoal-black mb-2">
                      {faq.question}
                    </h3>
                    <p className="text-charcoal-black/70">
                      {faq.answer}
                    </p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Location Section */}
      <section className="py-20 bg-soft-ivory">
        <div className="container mx-auto px-4">
          <div className="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto items-center">
            <div>
              <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-6">
                Dontia Care Clinic
              </h2>
              <div className="space-y-4">
                <div className="flex items-start gap-3">
                  <MapPin className="w-6 h-6 text-deep-brown mt-1 flex-shrink-0" />
                  <p className="text-charcoal-black/80">
                    Rajarhat Main Road, Newtown, Kolkata, West Bengal 700135
                  </p>
                </div>
                <div className="flex items-center gap-3">
                  <Phone className="w-6 h-6 text-deep-brown flex-shrink-0" />
                  <a href="tel:09830411212" className="text-charcoal-black/80 hover:text-deep-brown transition-colors">
                    98304 11212
                  </a>
                </div>
                <div className="flex items-center gap-3">
                  <Clock className="w-6 h-6 text-deep-brown flex-shrink-0" />
                  <div className="text-charcoal-black/80">
                    <div>Mon - Sat: 10 AM - 8 PM</div>
                    <div>Sunday: 10 AM - 2 PM</div>
                  </div>
                </div>
              </div>
              <button
                onClick={() => setIsModalOpen(true)}
                className="mt-6 bg-deep-brown text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#3A2C26] transition-colors duration-200"
              >
                Book Appointment
              </button>
            </div>

            <div className="h-96 bg-gray-200 rounded-lg overflow-hidden shadow-lg">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.5!2d88.4762!3d22.5937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDM1JzM3LjMiTiA4OMKwMjgnMzQuMyJF!5e0!3m2!1sen!2sin!4v1234567890"
                width="100%"
                height="100%"
                style={{ border: 0 }}
                allowFullScreen
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>
      </section>

      <FooterNew />

      <FloatingBookButton onClick={() => setIsModalOpen(true)} />
      <AppointmentModal isOpen={isModalOpen} onClose={() => setIsModalOpen(false)} />
    </div>
  );
}
