import { useNavigate } from 'react-router-dom';

const dentalServices = [
  {
    icon: '/Full_Mouth_Rehabilitation.png',
    name: 'Full Mouth Rehabilitation',
    description: 'Complete transformation of your smile with smile designing procedure with crown, implant & bridges.'
  },
  {
    icon: '/Dental_Implants.png',
    name: 'Dental Implants',
    description: 'Get back your lost smile with dental implants. All on 4/6 available to fix missing teeth.'
  },
  {
    icon: '/Root_Canal_Treatment.png',
    name: 'Root Canal Treatment',
    description: 'Get relief from tooth pain & sensitivity with Root Canal procedure'
  },
  {
    icon: '/General_Dentistry.png',
    name: 'General Dentistry',
    description: 'Dental checkup, cleanings, x-rays, fillings & gum disease treatment.'
  },
  {
    icon: '/Cosmetic_Dentistry.png',
    name: 'Cosmetic Dentistry',
    description: 'Improves the aesthetic appearance of teeth to boost confidence, discoloration, gaps & misalignment. Procedure includes: clear aligners, dental veneers, teeth whitening, bonding, crown & laminates.'
  },
  {
    icon: '/Dentures.png',
    name: 'Dentures',
    description: 'A quick replacement to missing teeth if you don\'t have teeth or left with few teeth. Easy to wear and remove for old ages.'
  },
  {
    icon: '/Tooth_Extractions.png',
    name: 'Tooth Extractions',
    description: 'This procedure is done if you are suffering from wisdom tooth pain, severe tooth decay, gum disease & dental trauma.'
  },
  {
    icon: '/Dental_Emergency.png',
    name: 'Dental Emergency',
    description: 'Get relief from sudden severe pain, prevent tooth loss, & infections. Visit our clinic during operating hours in bhowanipore & chinar park.'
  }
];

export default function Services() {
  const navigate = useNavigate();

  const handleBookNow = () => {
    navigate('/best-dental-clinic-in-kolkata');
    setTimeout(() => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 100);
  };

  return (
    <section id="services" className="py-section bg-soft-ivory">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8 md:mb-12">
          <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
            Dental Services
          </h2>
          <p className="text-sm sm:text-base text-charcoal-black/70 max-w-2xl mx-auto px-4">
            Comprehensive dentalhcare solutions tailored to your needs
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 max-w-7xl mx-auto">
          {dentalServices.map((service, index) => (
            <div
              key={index}
              className="group bg-white rounded-[10px] p-5 sm:p-6 hover:shadow-lg transition-all duration-300 border border-[#E8E8E8] hover:-translate-y-1"
            >
              <div className="flex justify-center mb-3 sm:mb-4">
                <div className="w-16 h-16 sm:w-20 sm:h-20 rounded-[10px] bg-[#E8F4E8] flex items-center justify-center text-3xl sm:text-4xl">
                  {service.icon.startsWith('/') ? (
                    <img src={service.icon} alt={service.name} className="w-12 h-12 sm:w-14 sm:h-14 object-contain" />
                  ) : (
                    service.icon
                  )}
                </div>
              </div>
              <h3 className="text-base sm:text-lg font-semibold text-charcoal-black text-center mb-2 sm:mb-3">
                {service.name}
              </h3>
              <p className="text-charcoal-black/70 text-xs sm:text-sm text-center mb-3 sm:mb-4 leading-relaxed">
                {service.description}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
