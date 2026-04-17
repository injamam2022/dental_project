import { ChevronLeft, ChevronRight } from 'lucide-react';
import { useRef } from 'react';

const galleryImages = [
  { src: '/01.png', title: 'Our Expert Team', category: 'Team' },
  { src: '/02.png', title: 'Award Recognition', category: 'Achievements' },
  { src: '/03.png', title: 'Happy Patients', category: 'Success Stories' },
  { src: '/04.png', title: 'Patient Care', category: 'Services' },
  { src: '/05.png', title: 'Satisfied Patients', category: 'Testimonials' },
];

export default function Gallery() {
  const scrollContainerRef = useRef<HTMLDivElement>(null);

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
    <section id="gallery" className="py-section bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8 md:mb-12">
          <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
            Our Gallery
          </h2>
          <p className="text-sm sm:text-base text-charcoal-black/70 max-w-2xl mx-auto px-4">
            Meet our team and see our commitment to excellence
          </p>
        </div>

        <div className="relative max-w-7xl mx-auto">
          <button
            onClick={() => scroll('left')}
            className="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-deep-brown text-white shadow-lg hover:bg-deep-brown/90 transition-all items-center justify-center -ml-5 md:-ml-6"
            aria-label="Scroll left"
          >
            <ChevronLeft className="w-5 h-5 md:w-6 md:h-6" />
          </button>

          <button
            onClick={() => scroll('right')}
            className="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 md:w-12 md:h-12 rounded-full bg-deep-brown text-white shadow-lg hover:bg-deep-brown/90 transition-all items-center justify-center -mr-5 md:-mr-6"
            aria-label="Scroll right"
          >
            <ChevronRight className="w-5 h-5 md:w-6 md:h-6" />
          </button>

          <div
            ref={scrollContainerRef}
            className="flex gap-4 sm:gap-6 overflow-x-auto scroll-smooth scrollbar-hide pb-4"
            style={{
              scrollbarWidth: 'none',
              msOverflowStyle: 'none',
            }}
          >
            {galleryImages.map((image, index) => (
              <div
                key={index}
                className="flex-shrink-0 w-[260px] sm:w-[300px] md:w-[350px] lg:w-[400px] group cursor-pointer"
              >
                <div className="relative aspect-[3/4] rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                  <img
                    src={image.src}
                    alt={image.title}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-deep-brown/90 via-deep-brown/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div className="absolute bottom-0 left-0 right-0 p-4 sm:p-5 md:p-6 text-white">
                      <p className="text-xs sm:text-sm font-medium text-stone-beige mb-1 sm:mb-2">{image.category}</p>
                      <h3 className="text-base sm:text-lg md:text-xl font-semibold">{image.title}</h3>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className="flex justify-center gap-2 mt-8">
          {galleryImages.map((_, index) => (
            <div
              key={index}
              className="w-2 h-2 rounded-full bg-deep-brown/30"
            />
          ))}
        </div>
      </div>

      <style jsx>{`
        .scrollbar-hide::-webkit-scrollbar {
          display: none;
        }
      `}</style>
    </section>
  );
}
