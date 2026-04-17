import { useState } from 'react';
import { Play } from 'lucide-react';

interface VideoTestimonial {
  id: number;
  title: string;
  videoId: string;
  description: string;
  thumbnail: string;
}

const videoTestimonials: VideoTestimonial[] = [
  {
    id: 1,
    title: 'Patient Success Story 1',
    videoId: 'oc0Hd7l6Y8Q',
    description: 'Real transformation from our satisfied patient',
    thumbnail: 'https://img.youtube.com/vi/oc0Hd7l6Y8Q/maxresdefault.jpg',
  },
  {
    id: 2,
    title: 'Patient Success Story 2',
    videoId: 'g3XqEYCJ8BY',
    description: 'Amazing dental treatment results',
    thumbnail: 'https://img.youtube.com/vi/g3XqEYCJ8BY/maxresdefault.jpg',
  },
  {
    id: 3,
    title: 'Patient Success Story 3',
    videoId: '3MLAZHPAJA8',
    description: 'Smile transformation journey',
    thumbnail: 'https://img.youtube.com/vi/3MLAZHPAJA8/maxresdefault.jpg',
  },
  {
    id: 4,
    title: 'Patient Success Story 4',
    videoId: 'oc0Hd7l6Y8Q',
    description: 'Professional dental care experience',
    thumbnail: 'https://img.youtube.com/vi/oc0Hd7l6Y8Q/maxresdefault.jpg',
  },
  {
    id: 5,
    title: 'Patient Success Story 5',
    videoId: 'g3XqEYCJ8BY',
    description: 'Trusted treatment excellence',
    thumbnail: 'https://img.youtube.com/vi/g3XqEYCJ8BY/maxresdefault.jpg',
  },
];

export default function VideoTestimonials() {
  const [selectedVideo, setSelectedVideo] = useState<VideoTestimonial>(videoTestimonials[0]);

  return (
    <section className="py-20 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-4xl md:text-5xl font-bold text-charcoal-black mb-4">
            Patient Video Testimonials
          </h2>
          <div className="w-24 h-1 bg-deep-brown mx-auto mb-6"></div>
          <p className="text-charcoal-black/70 max-w-2xl mx-auto">
            Watch real patient stories and transformations from our clinic
          </p>
        </div>

        <div className="grid lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
          {/* Main Video Player - Left Side */}
          <div className="lg:col-span-3 order-2 lg:order-1">
            <div className="relative w-full bg-black rounded-xl overflow-hidden shadow-2xl" style={{ paddingBottom: '56.25%' }}>
              <iframe
                src={`https://www.youtube.com/embed/${selectedVideo.videoId}?autoplay=1`}
                title={selectedVideo.title}
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowFullScreen
                className="absolute top-0 left-0 w-full h-full"
              ></iframe>
            </div>
            <h3 className="text-2xl md:text-3xl font-bold text-charcoal-black mt-6 mb-2">
              {selectedVideo.title}
            </h3>
            <p className="text-charcoal-black/70 text-lg">
              {selectedVideo.description}
            </p>
          </div>

          {/* Video Thumbnails Grid - Right Side */}
          <div className="lg:col-span-1 order-1 lg:order-2">
            <div className="overflow-x-auto scrollbar-hide">
              <div className="flex gap-3 lg:flex-col lg:space-y-3 pb-2 lg:pb-0">
                {videoTestimonials.map((video) => (
                  <button
                    key={video.id}
                    onClick={() => setSelectedVideo(video)}
                    className={`flex-shrink-0 w-32 lg:w-full group relative overflow-hidden rounded-lg transition-all duration-300 ${
                      selectedVideo.id === video.id
                        ? 'ring-2 ring-deep-brown shadow-lg scale-105'
                        : 'hover:shadow-lg'
                    }`}
                  >
                    {/* Thumbnail Image */}
                    <div className="relative overflow-hidden bg-gray-200 rounded-lg aspect-video">
                      <img
                        src={video.thumbnail}
                        alt={video.title}
                        className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                        onError={(e) => {
                          e.currentTarget.src = 'https://images.pexels.com/photos/3845653/pexels-photo-3845653.jpeg?auto=compress&cs=tinysrgb&w=400';
                        }}
                      />

                      {/* Play Button Overlay */}
                      <div className="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-all duration-300 flex items-center justify-center">
                        <div className="bg-white/90 group-hover:bg-white transition-all duration-300 rounded-full p-2">
                          <Play className="w-5 h-5 text-deep-brown fill-deep-brown" />
                        </div>
                      </div>
                    </div>

                    {/* Title */}
                    <div className="p-2 hidden lg:block">
                      <p className="text-xs sm:text-sm font-semibold text-charcoal-black text-left line-clamp-2">
                        {video.title}
                      </p>
                    </div>
                  </button>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
