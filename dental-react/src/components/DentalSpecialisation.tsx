const specialisations = [
  {
    image: '/General_Dentist.png',
    name: 'General Dentist',
    description: 'Comprehensive oral health assessment including diagnosis, treatment planning, and routine dental care management.'
  },
  {
    image: '/Implantologist.png',
    name: 'Implantologist',
    description: 'Surgical placement of dental implants with bone grafting procedures. Dr. Prabjheet Singh Sethi brings 25+ years of expertise in advanced implant dentistry.'
  },
  {
    image: '/Cosmetic_Dentist.png',
    name: 'Cosmetic Dentist',
    description: 'Transform your smile with aesthetic procedures including clear aligners, veneers, crowns, and professional teeth whitening. Led by Dr. Harleen Singh Sethi with 25+ years of experience.'
  },
  {
    image: '/TMJ_Specialist.png',
    name: 'TMJ Specialist',
    description: 'Expert treatment for temporomandibular joint disorders, jaw pain, and associated headaches. Dr. Prabhjeet Sethi offers 25+ years of specialized TMJ care.'
  },
  {
    image: '/Orthodontist.png',
    name: 'Orthodontist',
    description: 'Correction of misaligned, crooked, and crowded teeth using metal braces, ceramic braces, and lingual braces. Dr. Prasoon Killa provides expert care with 7+ years of experience.'
  },
  {
    image: '/Pedodontist.png',
    name: 'Pedodontist',
    description: 'Specialized pediatric dental care in Kolkata, covering preventive treatments, cleaning, cavity management, and comprehensive oral health for children.'
  },
  {
    image: '/Endodontist.png',
    name: 'Endodontist',
    description: 'Advanced root canal therapy and endodontic treatments. Dr. Aishi Sinha provides expert care with 5+ years of specialized experience.'
  },
  {
    image: '/Periodontist.png',
    name: 'Periodontist',
    description: 'Comprehensive gum disease treatment and periodontal care provided by Dr. Navneet, ensuring optimal gingival health.'
  },
  {
    image: '/Prosthodontist.png',
    name: 'Prosthodontist',
    description: 'Restoration of missing or damaged teeth through advanced prosthetic solutions including implants, dentures, and fixed metal restorations.'
  }
];

export default function DentalSpecialisation() {
  return (
    <section className="py-12 sm:py-16 md:py-20 bg-soft-ivory">
      <div className="container mx-auto px-4">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-8 md:mb-12">
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
              Dental Specialisation
            </h2>
            <p className="text-base sm:text-lg md:text-xl text-charcoal-black/70 max-w-3xl mx-auto px-4">
              We provide a specialised dental doctor for every specialisation at our Smile Dental Clinic in Kolkata.
            </p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            {specialisations.map((specialisation, index) => (
              <div
                key={index}
                className="bg-white rounded-[10px] p-5 sm:p-6 md:p-8 border border-[#E8E8E8] hover:shadow-lg transition-all duration-300 group cursor-pointer hover:-translate-y-1"
              >
                <div className="flex flex-col items-center text-center space-y-3 sm:space-y-4">
                  <div className="w-16 h-16 sm:w-18 sm:h-18 md:w-20 md:h-20 rounded-full bg-[#F6EBE0] border-2 border-deep-brown flex items-center justify-center transition-all duration-300 group-hover:scale-110 overflow-hidden">
                    <img
                      src={specialisation.image}
                      alt={specialisation.name}
                      className="w-10 h-10 sm:w-11 sm:h-11 md:w-12 md:h-12 object-contain transition-transform duration-300"
                    />
                  </div>
                  <div>
                    <h3 className="text-base sm:text-lg font-semibold text-charcoal-black transition-colors duration-300 mb-2">
                      {specialisation.name}
                    </h3>
                    <p className="text-sm sm:text-base text-charcoal-black/70 leading-relaxed">
                      {specialisation.description}
                    </p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
