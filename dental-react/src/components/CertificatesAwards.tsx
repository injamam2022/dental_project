import { Award, Shield, Trophy, Star, X } from 'lucide-react';
import { useRef, useState } from 'react';
import { ChevronLeft, ChevronRight } from 'lucide-react';

const certificates = [
  {
    id: 1,
    title: 'Implantology Foundation Course',
    issuer: 'Periodontal Federation',
    year: '2012',
    description: 'Foundation Course in Oral Implantology',
    icon: Award,
    color: 'from-blue-500 to-blue-600',
    image: '/Implantology_Cetificate.jpg'
  },
  {
    id: 2,
    title: 'Dawson Academy Certificate',
    issuer: 'The Dawson Academy',
    year: '2013',
    description: 'Examination and Records - Continuing Education',
    icon: Trophy,
    color: 'from-amber-500 to-amber-600',
    image: '/Dawson_Academy_Dental_Certificate.jpg'
  },
  {
    id: 3,
    title: 'Cosmetic Dentistry Certification',
    issuer: 'NYU College of Dentistry',
    year: '2006',
    description: 'Course in Cosmetic Dentistry Excellence',
    icon: Shield,
    color: 'from-emerald-500 to-emerald-600',
    image: '/Cosmetic_Dentistry_Certificate.jpg'
  }
];

interface CertificatesAwardsProps {
  showPopup?: boolean;
}

export default function CertificatesAwards({ showPopup = true }: CertificatesAwardsProps) {
  const scrollContainerRef = useRef<HTMLDivElement>(null);
  const [selectedCert, setSelectedCert] = useState<typeof certificates[0] | null>(null);

  const scroll = (direction: 'left' | 'right') => {
    if (scrollContainerRef.current) {
      const scrollAmount = 400;
      const newScrollPosition =
        scrollContainerRef.current.scrollLeft +
        (direction === 'left' ? -scrollAmount : scrollAmount);

      scrollContainerRef.current.scrollTo({
        left: newScrollPosition,
        behavior: 'smooth',
      });
    }
  };

  return (
    <section className="py-20 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
            Dental Certificates & Awards
          </h2>
          <div className="w-24 h-1 bg-deep-brown mx-auto mb-6"></div>
          <p className="text-charcoal-black/70 max-w-2xl mx-auto">
            Our commitment to excellence recognized through prestigious certifications and awards
          </p>
        </div>

        <div className="relative max-w-6xl mx-auto">
          <button
            onClick={() => scroll('left')}
            className="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 w-12 h-12 rounded-full bg-deep-brown text-white shadow-lg hover:bg-deep-brown/90 transition-all items-center justify-center -ml-6"
            aria-label="Scroll left"
          >
            <ChevronLeft className="w-6 h-6" />
          </button>

          <button
            onClick={() => scroll('right')}
            className="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 z-10 w-12 h-12 rounded-full bg-deep-brown text-white shadow-lg hover:bg-deep-brown/90 transition-all items-center justify-center -mr-6"
            aria-label="Scroll right"
          >
            <ChevronRight className="w-6 h-6" />
          </button>

          <div
            ref={scrollContainerRef}
            className="flex gap-6 overflow-x-auto scroll-smooth scrollbar-hide pb-4"
            style={{
              scrollbarWidth: 'none',
              msOverflowStyle: 'none',
            }}
          >
            {certificates.map((cert) => {
              const IconComponent = cert.icon;
              return (
                <div
                  key={cert.id}
                  className="flex-shrink-0 w-80 group cursor-pointer"
                  onClick={() => showPopup && setSelectedCert(cert)}
                >
                  <div className="rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <div className="relative h-64 overflow-hidden bg-gray-200">
                      <img
                        src={cert.image}
                        alt={cert.title}
                        className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                      />
                      {showPopup && (
                        <div className="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                          <div className="text-white text-sm font-semibold opacity-0 group-hover:opacity-100 transition-all duration-300">
                            Click to View
                          </div>
                        </div>
                      )}
                    </div>

                  </div>
                </div>
              );
            })}
          </div>
        </div>

        <div className="flex justify-center gap-2 mt-8">
          {certificates.map((_, index) => (
            <div
              key={index}
              className="w-2 h-2 rounded-full bg-deep-brown/30"
            />
          ))}
        </div>
      </div>

      {showPopup && selectedCert && (
        <div
          className="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4"
          onClick={() => setSelectedCert(null)}
        >
          <div
            className="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-auto relative"
            onClick={(e) => e.stopPropagation()}
          >
            <button
              onClick={() => setSelectedCert(null)}
              className="absolute top-4 right-4 p-2 hover:bg-gray-100 rounded-full z-10 transition-colors"
            >
              <X className="w-6 h-6 text-charcoal-black" />
            </button>

            <img
              src={selectedCert.image}
              alt={selectedCert.title}
              className="w-full h-auto object-contain"
            />

            <div className="p-8 border-t border-gray-200">
              <h3 className="text-3xl font-bold text-charcoal-black mb-2">
                {selectedCert.title}
              </h3>
              <p className="text-lg text-deep-brown font-semibold mb-1">
                {selectedCert.issuer}
              </p>
              <p className="text-deep-brown font-semibold mb-4">
                {selectedCert.year}
              </p>
              <p className="text-charcoal-black/80 text-base leading-relaxed">
                {selectedCert.description}
              </p>
            </div>
          </div>
        </div>
      )}

      <style jsx>{`
        .scrollbar-hide::-webkit-scrollbar {
          display: none;
        }
      `}</style>
    </section>
  );
}
