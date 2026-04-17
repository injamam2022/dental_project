import { useState } from 'react';

const technologies = [
  {
    id: 1,
    title: 'Intraoral T Scanner',
    description: 'It allows for contact-free, minimally invasive dentistry, making procedures painless.',
    image: '/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png',
  },
  {
    id: 2,
    title: 'Cerec',
    description: 'Same-day ceramic restorations designed and milled chairside with precision using 3D scanning and CAD/CAM technology.',
    image: '/Cerec.png',
  },
  {
    id: 3,
    title: 'Dental Laser',
    description: 'Dental lasers use concentrated light to remove or shape tissue during procedures.',
    image: '/Dental-Laser.jpg',
  },
  {
    id: 4,
    title: 'Baldus',
    description: 'Compact, secure, and easy-to-use nitrous oxide sedation unit for patient comfort.',
    image: '/Baldus.jpg',
  },
];

export default function DentalTechnology() {
  const [hoveredId, setHoveredId] = useState<number | null>(null);

  return (
    <section className="py-20 bg-white">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Dental Technology
          </h2>
          <div className="flex items-center justify-center gap-4 mb-6">
            <div className="h-1 w-12 bg-[#8B7355]"></div>
            <div className="w-8 h-8 rounded-full border-2 border-[#8B7355] flex items-center justify-center text-sm text-[#8B7355]">
              💎
            </div>
            <div className="h-1 w-12 bg-[#8B7355]"></div>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {technologies.map((tech) => (
            <div
              key={tech.id}
              className="relative overflow-hidden rounded-xl shadow-lg h-80 group cursor-pointer"
              onMouseEnter={() => setHoveredId(tech.id)}
              onMouseLeave={() => setHoveredId(null)}
            >
              <img
                src={tech.image}
                alt={tech.title}
                className={`w-full h-full object-cover transition-transform duration-500 ${
                  hoveredId === tech.id ? 'scale-110 rotate-3' : 'scale-100 rotate-0'
                }`}
                onError={(e) => {
                  e.currentTarget.src = 'https://images.pexels.com/photos/3938022/pexels-photo-3938022.jpeg?auto=compress&cs=tinysrgb&w=400';
                }}
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-6">
                <h3 className="text-2xl font-serif text-white mb-3">
                  {tech.title}
                </h3>
                <p className={`text-sm text-white/90 leading-relaxed transition-opacity duration-300 ${
                  hoveredId === tech.id ? 'opacity-100' : 'opacity-0'
                }`}>
                  {tech.description}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
