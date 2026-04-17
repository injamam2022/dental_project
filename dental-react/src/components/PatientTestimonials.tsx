import { useState, useRef, useEffect } from 'react';
import { ChevronLeft, ChevronRight, Play } from 'lucide-react';

const testimonials = [
  {
    id: 1,
    title: 'Patient Success Story 1',
    videoId: 'oc0Hd7l6Y8Q',
  },
  {
    id: 2,
    title: 'Patient Success Story 2',
    videoId: 'g3XqEYCJ8BY',
  },
  {
    id: 3,
    title: 'Patient Success Story 3',
    videoId: '3MLAZHPAJA8',
  },
  {
    id: 4,
    title: 'Patient Success Story 1',
    videoId: 'oc0Hd7l6Y8Q',
  },
  {
    id: 5,
    title: 'Patient Success Story 2',
    videoId: 'g3XqEYCJ8BY',
  },
];

export default function PatientTestimonials() {
  const [selectedVideo, setSelectedVideo] = useState<string | null>(null);
  const [isDragging, setIsDragging] = useState(false);
  const [dragStart, setDragStart] = useState(0);
  const carouselRef = useRef<HTMLDivElement>(null);

  const getYoutubeImageUrl = (videoId: string) => {
    return `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
  };

  const handleScroll = (direction: 'left' | 'right') => {
    if (carouselRef.current) {
      const cardWidth = carouselRef.current.querySelector('[data-video-card]')?.clientWidth || 320;
      const gap = 24;
      const scrollAmount = cardWidth + gap;

      carouselRef.current.scrollBy({
        left: direction === 'right' ? scrollAmount : -scrollAmount,
        behavior: 'smooth',
      });
    }
  };

  const handleMouseDown = (e: React.MouseEvent) => {
    setIsDragging(true);
    setDragStart(e.clientX - (carouselRef.current?.getBoundingClientRect().left || 0));
  };

  const handleMouseMove = (e: React.MouseEvent) => {
    if (!isDragging || !carouselRef.current) return;

    const currentPos = e.clientX - (carouselRef.current.getBoundingClientRect().left || 0);
    const diff = dragStart - currentPos;

    if (Math.abs(diff) > 10) {
      carouselRef.current.scrollLeft += diff * 0.5;
      setDragStart(currentPos);
    }
  };

  const handleMouseUp = () => {
    setIsDragging(false);
  };

  const handleTouchStart = (e: React.TouchEvent) => {
    setIsDragging(true);
    setDragStart(e.touches[0].clientX);
  };

  const handleTouchMove = (e: React.TouchEvent) => {
    if (!isDragging || !carouselRef.current) return;

    const diff = dragStart - e.touches[0].clientX;
    carouselRef.current.scrollLeft += diff;
    setDragStart(e.touches[0].clientX);
  };

  const handleTouchEnd = () => {
    setIsDragging(false);
  };

  return (
    <section className="py-20 bg-[#3B2C26] text-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-4xl md:text-5xl font-bold mb-4">
            Patient Testimonials
          </h2>
          <div className="w-24 h-1 bg-[#D4A574] mx-auto mb-6"></div>
          <p className="text-white/80 max-w-2xl mx-auto">
            Real patient experiences and transformations shared directly from our patients
          </p>
        </div>

        <div className="relative group">
          {/* Left Arrow */}
          <button
            onClick={() => handleScroll('left')}
            className="absolute -left-6 md:-left-12 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 transition-all duration-300 text-white rounded-full p-2 md:p-3 opacity-0 group-hover:opacity-100 md:opacity-100"
            aria-label="Scroll left"
          >
            <ChevronLeft className="w-6 h-6 md:w-8 md:h-8" />
          </button>

          {/* Carousel Container */}
          <div
            ref={carouselRef}
            className="flex gap-6 overflow-x-auto scroll-smooth pb-4 cursor-grab active:cursor-grabbing"
            onMouseDown={handleMouseDown}
            onMouseMove={handleMouseMove}
            onMouseUp={handleMouseUp}
            onMouseLeave={handleMouseUp}
            onTouchStart={handleTouchStart}
            onTouchMove={handleTouchMove}
            onTouchEnd={handleTouchEnd}
            style={{ scrollBehavior: 'smooth', scrollSnapType: 'x mandatory' }}
          >
            {testimonials.map((video) => (
              <div
                key={video.id}
                data-video-card
                className="flex-shrink-0 w-80 scroll-snap-align-start"
              >
                <div
                  className="relative rounded-lg overflow-hidden shadow-lg cursor-pointer group/card transition-transform duration-300 hover:scale-105 h-56 bg-black"
                  onClick={() => setSelectedVideo(video.videoId)}
                >
                  {/* Thumbnail */}
                  <img
                    src={getYoutubeImageUrl(video.videoId)}
                    alt={video.title}
                    className="w-full h-full object-cover"
                  />

                  {/* Overlay */}
                  <div className="absolute inset-0 bg-black/30 group-hover/card:bg-black/50 transition-all duration-300 flex items-center justify-center">
                    {/* Play Button */}
                    <div className="bg-white/90 group-hover/card:bg-white transition-all duration-300 rounded-full p-4 shadow-lg">
                      <Play className="w-8 h-8 text-[#3B2C26] fill-current" />
                    </div>
                  </div>
                </div>

                {/* Video Title */}
                <p className="mt-4 text-white/90 font-medium text-sm line-clamp-2">
                  {video.title}
                </p>
              </div>
            ))}
          </div>

          {/* Right Arrow */}
          <button
            onClick={() => handleScroll('right')}
            className="absolute -right-6 md:-right-12 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 transition-all duration-300 text-white rounded-full p-2 md:p-3 opacity-0 group-hover:opacity-100 md:opacity-100"
            aria-label="Scroll right"
          >
            <ChevronRight className="w-6 h-6 md:w-8 md:h-8" />
          </button>
        </div>

        {/* Video Modal */}
        {selectedVideo && (
          <div
            className="fixed inset-0 bg-black/80 flex items-center justify-center z-50 p-4"
            onClick={() => setSelectedVideo(null)}
          >
            <div
              className="relative w-full max-w-4xl bg-black rounded-lg overflow-hidden shadow-2xl"
              onClick={(e) => e.stopPropagation()}
              style={{ paddingBottom: '56.25%' }}
            >
              <iframe
                src={`https://www.youtube.com/embed/${selectedVideo}?autoplay=0`}
                title="Patient testimonial"
                allow="clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowFullScreen
                className="absolute top-0 left-0 w-full h-full border-0"
              ></iframe>
            </div>

            {/* Close Button */}
            <button
              onClick={() => setSelectedVideo(null)}
              className="absolute top-4 right-4 text-white/80 hover:text-white text-3xl font-light"
              aria-label="Close modal"
            >
              ×
            </button>
          </div>
        )}
      </div>
    </section>
  );
}
