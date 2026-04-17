import { useEffect, useRef, useState } from 'react';
import { ChevronLeft, ChevronRight } from 'lucide-react';

const originalMembers = [
  {
    id: 1,
    name: 'Dr. Prabhjeet Sethi',
    designation: 'Implantologist & TMJ Specialist',
    image: 'https://dontiacareclinic.com/wp-content/uploads/2025/07/IMG_2429-819x1024.jpg'
  },
  {
    id: 2,
    name: 'Dr. Harleen Sandhu',
    designation: 'Cosmetic Dentist',
    image: 'https://dontiacareclinic.com/wp-content/uploads/2025/07/Copy-of-DSC_0433-1024x983.jpg'
  },
  {
    id: 3,
    name: 'Dr. Aishi Sinha',
    designation: 'Endodontist',
    image: '/Aishi_Sinha.png'
  },
  {
    id: 4,
    name: 'Dr. Saibal Sen',
    designation: 'Dental Surgeon',
    image: '/dr-saibal-sen-purnam-medicare-polyclinic--lala-lajpat-rai-sarani-kolkata-dentists-yjki7.jpg'
  },
  {
    id: 5,
    name: 'Dr. Prasoon Killa',
    designation: 'Orthodontist',
    image: '/Prasoon_Killa.png'
  },
  {
    id: 6,
    name: 'Dr. Navneet',
    designation: 'Periodontist',
    image: '/Navneet_.png'
  }
];

const teamMembers = [...originalMembers, ...originalMembers];

export default function Doctor() {
  const scrollContainerRef = useRef<HTMLDivElement>(null);
  const [canScrollLeft, setCanScrollLeft] = useState(false);
  const [canScrollRight, setCanScrollRight] = useState(true);
  const [autoScrollEnabled, setAutoScrollEnabled] = useState(true);

  const checkScrollPosition = () => {
    if (scrollContainerRef.current) {
      const { scrollLeft, scrollWidth, clientWidth } = scrollContainerRef.current;
      setCanScrollLeft(scrollLeft > 0);
      setCanScrollRight(scrollLeft < scrollWidth - clientWidth - 10);
    }
  };

  const scroll = (direction: 'left' | 'right') => {
    if (scrollContainerRef.current) {
      const scrollAmount = scrollContainerRef.current.clientWidth * 0.8;
      const newScrollLeft = direction === 'left'
        ? scrollContainerRef.current.scrollLeft - scrollAmount
        : scrollContainerRef.current.scrollLeft + scrollAmount;

      scrollContainerRef.current.scrollTo({
        left: newScrollLeft,
        behavior: 'smooth'
      });
      setAutoScrollEnabled(false);
    }
  };

  useEffect(() => {
    const scrollContainer = scrollContainerRef.current;
    if (scrollContainer) {
      scrollContainer.addEventListener('scroll', checkScrollPosition);
      checkScrollPosition();
      return () => scrollContainer.removeEventListener('scroll', checkScrollPosition);
    }
  }, []);

  useEffect(() => {
    if (!autoScrollEnabled) return;

    const interval = setInterval(() => {
      if (scrollContainerRef.current) {
        const container = scrollContainerRef.current;
        const cardWidth = 320 + 24;
        const currentCard = Math.round(container.scrollLeft / cardWidth);
        const halfPoint = originalMembers.length;

        if (currentCard >= halfPoint) {
          container.scrollTo({ left: 0, behavior: 'instant' as ScrollBehavior });
          setTimeout(() => {
            container.scrollTo({ left: cardWidth, behavior: 'smooth' });
          }, 50);
        } else {
          container.scrollTo({ left: (currentCard + 1) * cardWidth, behavior: 'smooth' });
        }
      }
    }, 3000);

    return () => clearInterval(interval);
  }, [autoScrollEnabled]);

  return (
    <section id="doctors" className="py-12 sm:py-16 md:py-20 bg-soft-ivory">
      <div className="container mx-auto px-4">
        <div className="text-center mb-10 sm:mb-12 md:mb-16">
          <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
            Meet Our Dentist in Kolkata
          </h2>
        </div>

        <div className="relative max-w-7xl mx-auto">
          <button
            onClick={() => scroll('left')}
            disabled={!canScrollLeft}
            className={`absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white shadow-lg flex items-center justify-center transition-all duration-300 ${
              canScrollLeft ? 'opacity-100 hover:bg-primary-orange hover:text-white' : 'opacity-0 pointer-events-none'
            }`}
            aria-label="Scroll left"
          >
            <ChevronLeft className="w-5 h-5 sm:w-6 sm:h-6" />
          </button>

          <div
            ref={scrollContainerRef}
            className="flex gap-4 sm:gap-6 overflow-x-auto scrollbar-hide scroll-smooth px-2 sm:px-4"
            style={{ scrollbarWidth: 'none', msOverflowStyle: 'none' }}
            onMouseEnter={() => setAutoScrollEnabled(false)}
            onMouseLeave={() => setAutoScrollEnabled(true)}
          >
            {teamMembers.map((member, index) => (
              <div
                key={`${member.id}-${index}`}
                className="flex-shrink-0 w-[calc(100vw-4rem)] sm:w-72 md:w-80 max-w-xs flex flex-col items-center text-center group bg-white rounded-xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300"
              >
                <div className="relative w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 mb-4 sm:mb-6">
                  <div className="absolute inset-0 rounded-full border-3 sm:border-4 border-deep-brown overflow-hidden group-hover:border-[#8B4513] transition-colors duration-300">
                    <img
                      src={member.image}
                      alt={member.name}
                      className="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500"
                    />
                  </div>
                </div>

                <h3 className="text-xl sm:text-2xl font-bold text-charcoal-black mb-1 sm:mb-2">
                  {member.name}
                </h3>
                <p className="text-base sm:text-lg text-deep-brown font-semibold">
                  {member.designation}
                </p>
              </div>
            ))}
          </div>

          <button
            onClick={() => scroll('right')}
            disabled={!canScrollRight}
            className={`absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white shadow-lg flex items-center justify-center transition-all duration-300 ${
              canScrollRight ? 'opacity-100 hover:bg-primary-orange hover:text-white' : 'opacity-0 pointer-events-none'
            }`}
            aria-label="Scroll right"
          >
            <ChevronRight className="w-5 h-5 sm:w-6 sm:h-6" />
          </button>
        </div>
      </div>
    </section>
  );
}
