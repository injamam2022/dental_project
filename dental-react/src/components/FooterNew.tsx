import { MapPin, Phone, Mail, Facebook, Instagram, Twitter, Clock } from 'lucide-react';

export default function FooterNew() {
  const scrollToSection = (id: string) => {
    document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <footer id="contact" className="bg-charcoal-black text-neutral-grey">
      <div className="container mx-auto px-4 py-10 sm:py-12 md:py-16">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10 md:gap-12 mb-10 md:mb-12">
          <div>
            <div className="mb-4 sm:mb-6">
              <img
                src="/DCC_Logo-04.png"
                alt="Dontia Care Clinic"
                className="w-28 h-auto"
                style={{ height: '7rem' }}
              />
            </div>
            <p className="text-sm sm:text-base text-gray-400 leading-relaxed mb-4 sm:mb-6">
              Trusted dental, skin & ENT specialists providing compassionate care for over 25 years.
            </p>
            <div className="flex gap-3 sm:gap-4">
              <a
                href="https://facebook.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-deep-brown hover:bg-stone-beige flex items-center justify-center transition-colors text-white"
              >
                <Facebook className="w-4 h-4 sm:w-5 sm:h-5" />
              </a>
              <a
                href="https://instagram.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-deep-brown hover:bg-stone-beige flex items-center justify-center transition-colors text-white"
              >
                <Instagram className="w-4 h-4 sm:w-5 sm:h-5" />
              </a>
              <a
                href="https://twitter.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-deep-brown hover:bg-stone-beige flex items-center justify-center transition-colors text-white"
              >
                <Twitter className="w-4 h-4 sm:w-5 sm:h-5" />
              </a>
            </div>
          </div>

          <div>
            <h3 className="text-base sm:text-lg font-semibold text-white mb-4 sm:mb-6">Quick Links</h3>
            <ul className="space-y-2 sm:space-y-3 text-sm sm:text-base">
              <li>
                <button onClick={() => scrollToSection('home')} className="hover:text-stone-beige transition-colors">
                  Home
                </button>
              </li>
              <li>
                <button onClick={() => scrollToSection('about')} className="hover:text-stone-beige transition-colors">
                  About Us
                </button>
              </li>
              <li>
                <button onClick={() => scrollToSection('services')} className="hover:text-stone-beige transition-colors">
                  Our Services
                </button>
              </li>
              <li>
                <button onClick={() => scrollToSection('doctors')} className="hover:text-stone-beige transition-colors">
                  Our Team
                </button>
              </li>
              <li>
                <button onClick={() => scrollToSection('appointment')} className="hover:text-stone-beige transition-colors">
                  Book Appointment
                </button>
              </li>
            </ul>
          </div>

          <div>
            <h3 className="text-base sm:text-lg font-semibold text-white mb-4 sm:mb-6">Our Services</h3>
            <ul className="space-y-2 sm:space-y-3 text-sm sm:text-base">
              <li>
                <a href="#" className="hover:text-stone-beige transition-colors">Root Canal Treatment</a>
              </li>
              <li>
                <a href="#" className="hover:text-stone-beige transition-colors">Dental Implants</a>
              </li>
              <li>
                <a href="#" className="hover:text-stone-beige transition-colors">Teeth Whitening</a>
              </li>
              <li>
                <a href="#" className="hover:text-stone-beige transition-colors">Orthodontics</a>
              </li>
              <li>
                <a href="#" className="hover:text-stone-beige transition-colors">ENT & Skin Care</a>
              </li>
            </ul>
          </div>

          <div>
            <h3 className="text-base sm:text-lg font-semibold text-white mb-4 sm:mb-6">Contact Info</h3>
            <ul className="space-y-3 sm:space-y-4 text-sm sm:text-base">
              <li className="flex items-start gap-2 sm:gap-3">
                <MapPin className="w-4 h-4 sm:w-5 sm:h-5 mt-1 flex-shrink-0 text-deep-brown" />
                <span>Rajarhat Main Road, Newtown, Kolkata</span>
              </li>
              <li className="flex items-center gap-2 sm:gap-3">
                <Phone className="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0 text-deep-brown" />
                <a href="tel:09830411212" className="hover:text-stone-beige transition-colors">
                  098304 11212
                </a>
              </li>
              <li className="flex items-center gap-2 sm:gap-3">
                <Mail className="w-4 h-4 sm:w-5 sm:h-5 flex-shrink-0 text-deep-brown" />
                <a href="mailto:info@dontiacare.com" className="hover:text-stone-beige transition-colors break-all">
                  info@dontiacare.com
                </a>
              </li>
              <li className="flex items-start gap-2 sm:gap-3">
                <Clock className="w-4 h-4 sm:w-5 sm:h-5 mt-1 flex-shrink-0 text-deep-brown" />
                <div className="text-xs sm:text-sm">
                  <div>Mon - Sat: 10 AM - 8 PM</div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-gray-700 pt-6 sm:pt-8">
          <div className="text-center">
            <p className="text-xs sm:text-sm text-gray-400">
              &copy; 2026 Dontia Care Clinic. All rights reserved. Crafted by{' '}
              <a
                href="https://www.itwiz.in/"
                target="_blank"
                rel="noopener noreferrer"
                className="text-stone-beige hover:text-white transition-colors"
              >
                IT WIZ INFOTECH
              </a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
}
