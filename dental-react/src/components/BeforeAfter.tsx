import { useState, useRef, useEffect } from 'react';
import { ChevronLeft, ChevronRight } from 'lucide-react';

const comparisons = [
  {
    id: 1,
    title: 'Smile Enhancement',
    before: '/01_before.png',
    after: '/01_after.jpg'
  },
  {
    id: 2,
    title: 'Crown Restoration',
    before: '/03_before.png',
    after: '/03_after.png'
   
  },
  {
    id: 3,
    title: 'Complete Smile Makeover',
     before: '/02_before.png',
    after: '/02_after.png'
  }
];

function BeforeAfterSlider({ before, after }: { before: string; after: string }) {
  const [sliderPosition, setSliderPosition] = useState(50);
  const [isDragging, setIsDragging] = useState(false);
  const containerRef = useRef<HTMLDivElement>(null);

  const handleMove = (clientX: number) => {
    if (!containerRef.current) return;
    const rect = containerRef.current.getBoundingClientRect();
    const x = clientX - rect.left;
    const percentage = (x / rect.width) * 100;
    setSliderPosition(Math.min(Math.max(percentage, 0), 100));
  };

  const handleMouseMove = (e: MouseEvent) => {
    if (!isDragging) return;
    handleMove(e.clientX);
  };

  const handleTouchMove = (e: TouchEvent) => {
    if (!isDragging) return;
    handleMove(e.touches[0].clientX);
  };

  const handleStart = () => setIsDragging(true);
  const handleEnd = () => setIsDragging(false);

  useEffect(() => {
    if (isDragging) {
      window.addEventListener('mousemove', handleMouseMove);
      window.addEventListener('mouseup', handleEnd);
      window.addEventListener('touchmove', handleTouchMove);
      window.addEventListener('touchend', handleEnd);

      return () => {
        window.removeEventListener('mousemove', handleMouseMove);
        window.removeEventListener('mouseup', handleEnd);
        window.removeEventListener('touchmove', handleTouchMove);
        window.removeEventListener('touchend', handleEnd);
      };
    }
  }, [isDragging]);

  return (
    <div
      ref={containerRef}
      className="relative w-full aspect-[4/3] overflow-hidden rounded-brand cursor-ew-resize select-none"
    >
      <div className="absolute inset-0">
        <img
          src={after}
          alt="After treatment"
          className="w-full h-full object-cover"
          draggable={false}
        />
        <div className="absolute top-2 right-2 sm:top-4 sm:right-4 bg-deep-brown/90 text-white px-2 py-1 sm:px-4 sm:py-2 rounded font-montserrat text-[10px] sm:text-xs font-medium tracking-wider">
          AFTER
        </div>
      </div>

      <div
        className="absolute inset-0 overflow-hidden"
        style={{ width: `${sliderPosition}%` }}
      >
        <img
          src={before}
          alt="Before treatment"
          className="w-full h-full object-cover"
          style={{ width: `${(100 / sliderPosition) * 100}%` }}
          draggable={false}
        />
        <div className="absolute top-2 left-2 sm:top-4 sm:left-4 bg-deep-brown/90 text-white px-2 py-1 sm:px-4 sm:py-2 rounded font-montserrat text-[10px] sm:text-xs font-medium tracking-wider">
          BEFORE
        </div>
      </div>

      <div
        className="absolute top-0 bottom-0 w-1 bg-white shadow-lg"
        style={{ left: `${sliderPosition}%`, transform: 'translateX(-50%)' }}
        onMouseDown={handleStart}
        onTouchStart={handleStart}
      >
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 bg-white rounded-full shadow-xl flex items-center justify-center cursor-grab active:cursor-grabbing">
          <div className="flex gap-0.5 sm:gap-1">
            <ChevronLeft className="w-3 h-3 sm:w-4 sm:h-4 text-deep-brown" strokeWidth={3} />
            <ChevronRight className="w-3 h-3 sm:w-4 sm:h-4 text-deep-brown" strokeWidth={3} />
          </div>
        </div>
      </div>
    </div>
  );
}

export default function BeforeAfter() {
  const scrollContainerRef = useRef<HTMLDivElement>(null);

  const scroll = (direction: 'left' | 'right') => {
    if (scrollContainerRef.current) {
      const scrollAmount = 450;
      scrollContainerRef.current.scrollBy({
        left: direction === 'left' ? -scrollAmount : scrollAmount,
        behavior: 'smooth'
      });
    }
  };

  return (
    <section className="py-section bg-neutral-grey overflow-hidden">
      <div className="container mx-auto px-4">
        <div className="flex items-end justify-between mb-8 md:mb-12">
          <div>
            <h2 className="font-cardo text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
              Successful Transformations
            </h2>
            <p className="font-sans text-sm sm:text-base text-gray-700 max-w-2xl">
              Real results from our patients showcasing the quality of our dental treatments
            </p>
          </div>

          <div className="hidden md:flex gap-3">
            <button
              onClick={() => scroll('left')}
              className="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-primary-orange hover:text-white transition-all duration-200"
              aria-label="Scroll left"
            >
              <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
              </svg>
            </button>
            <button
              onClick={() => scroll('right')}
              className="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-primary-orange hover:text-white transition-all duration-200"
              aria-label="Scroll right"
            >
              <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        </div>

        <div
          ref={scrollContainerRef}
          className="flex gap-4 sm:gap-6 overflow-x-auto pb-6 scrollbar-hide snap-x snap-mandatory"
          style={{ scrollbarWidth: 'none', msOverflowStyle: 'none' }}
        >
          {comparisons.map((comparison) => (
            <div key={comparison.id} className="flex-none w-[300px] sm:w-[360px] md:w-[420px] snap-start">
              <div className="space-y-3 sm:space-y-4">
                <BeforeAfterSlider before={comparison.before} after={comparison.after} />
                <div className="text-center">
                  <h3 className="font-montserrat text-base sm:text-lg font-semibold text-charcoal-black">
                    {comparison.title}
                  </h3>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
