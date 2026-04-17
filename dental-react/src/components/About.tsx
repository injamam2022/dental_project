import { Award, Users, Heart, Shield, MapPin, Star } from 'lucide-react';

export default function About() {
  return (
    <section id="about" className="py-section bg-light-bg">
      <div className="container mx-auto px-4">
        <div className="grid lg:grid-cols-2 gap-8 md:gap-12 items-center max-w-7xl mx-auto">
          <div className="space-y-5 md:space-y-6">
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text leading-tight">
              Welcome To{' '}
              <span className="text-primary-orange">Dontia Care Clinic</span> in Kolkata
            </h2>

            <div className="space-y-3 md:space-y-4">
              <p className="text-sm sm:text-base text-medium-text leading-relaxed">
                <span className="font-semibold text-dark-text">Founded in 2001</span>, Dontia Care Clinic is Kolkata's premier destination for advanced dental care. We bring comprehensive care with precision, compassion, and cutting-edge technology for our patients. We are also termed as a <span className="font-semibold text-primary-orange">celebrity dental clinic</span> as one of our clients is <span className="font-semibold">Koel Mallick</span>, a renowned Bengali actress making us the top dental clinic.
              </p>

              <p className="text-sm sm:text-base text-medium-text leading-relaxed">
                As the only <span className="font-semibold text-dark-text">Dawson Academy-trained dentist in Eastern India</span>, Dontia is widely recognized for smile design, dental implants, root canals, braces, and more — performed by a team of <span className="font-semibold">best dentists in Kolkata</span> using state-of-the-art equipment and techniques.
              </p>

              <p className="text-sm sm:text-base text-medium-text leading-relaxed">
                With an unwavering focus on safety, precision, and patient satisfaction, Dontia is where <span className="font-semibold text-primary-orange">science meets artistry</span> — creating brighter smiles.
              </p>
            </div>

            <div className="bg-white rounded-xl p-4 sm:p-5 md:p-6 shadow-md border border-gray-100">
              <h3 className="text-lg sm:text-xl font-bold text-dark-text mb-3 sm:mb-4 flex items-center gap-2">
                <MapPin className="w-4 h-4 sm:w-5 sm:h-5 text-primary-orange" />
                Our Locations in Kolkata
              </h3>

              <div className="space-y-3 sm:space-y-4">
                <div className="flex items-start gap-2 sm:gap-3">
                  <div className="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-primary-orange/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span className="text-primary-orange font-bold text-xs sm:text-sm">1</span>
                  </div>
                  <div>
                    <h4 className="text-sm sm:text-base font-semibold text-dark-text mb-1"><a href="https://maps.app.goo.gl/pEwzKe8txeAoByGt7" target="_blank" rel="noopener noreferrer" className="hover:text-primary-orange transition-colors">Bhowanipore, Elgin Road</a></h4>
                    <p className="text-xs sm:text-sm text-medium-text leading-relaxed">
                      1.7 km (6-minute drive) from the iconic Victoria Memorial, making it easily accessible from Central and South Kolkata.
                    </p>
                  </div>
                </div>

                <div className="flex items-start gap-2 sm:gap-3">
                  <div className="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-primary-orange/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <span className="text-primary-orange font-bold text-xs sm:text-sm">2</span>
                  </div>
                  <div>
                    <h4 className="text-sm sm:text-base font-semibold text-dark-text mb-1"><a href="https://maps.app.goo.gl/Fsm53qjf7PafTZHG8" target="_blank" rel="noopener noreferrer" className="hover:text-primary-orange transition-colors">Chinar Park</a></h4>
                    <p className="text-xs sm:text-sm text-medium-text leading-relaxed">
                      950m (4-minute drive) from City Centre 2, providing top-tier dental services to North Kolkata, New Town, Salt Lake & Rajarhat regions.
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div className="relative">
            <div className="rounded-xl overflow-hidden shadow-xl">
              <img
                src="/IMG_1707.JPG"
                alt="Dontia Dental Clinic Kolkata"
                className="w-full h-auto object-cover"
              />
            </div>

          </div>
        </div>
      </div>
    </section>
  );
}
