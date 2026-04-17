const features = [
  {
    iconImg: '/25_Years_of_Dental_Experience.png',
    frontText: '25+ Years of Dental Experience',
    backText: 'Safe, Hygienic & Comfortable Clinic Environment'
  },
  {
    iconImg: '/Dawson_Academy_Certified_Dentist.png',
    frontText: 'Dawson Academy Certified Dentist',
    backText: 'Highly Trained Dental Team'
  },
  {
    iconImg: '/Advanced_Dental_Technology_&_Techniques.png',
    frontText: 'Advanced Dental Technology & Techniques',
    backText: 'Personalized & Compassionate Care'
  },
  {
    iconImg: '/Same_Day_Crown.png',
    frontText: 'Same Day Crown',
    backText: 'Excellent Treatment Results'
  }
];

export default function WhyChooseUs() {
  return (
    <section className="py-12 sm:py-16 md:py-20" style={{ backgroundColor: 'rgb(76 58 51 / 1)' }}>
      <div className="container mx-auto px-4">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-8 md:mb-12">
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 md:mb-4 px-4">
              Why We Are the Best Dental Clinic in Kolkata
            </h2>
            <p className="text-base sm:text-lg md:text-xl text-amber-200 font-medium">Why Choose Us</p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            {features.map((feature, index) => (
              <div
                key={index}
                className="group perspective-1000 h-56 sm:h-60 md:h-64"
              >
                <div className="relative w-full h-full transition-transform duration-500 transform-style-3d group-hover:rotate-y-180">
                  <div className="absolute w-full h-full backface-hidden bg-white rounded-xl p-5 sm:p-6 md:p-8 shadow-lg border border-amber-200 flex flex-col items-center justify-center text-center">
                    <img src={feature.iconImg} alt={feature.frontText} className="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mb-3 sm:mb-4 object-contain" />
                    <p className="text-sm sm:text-base md:text-lg font-semibold text-gray-800 leading-relaxed">
                      {feature.frontText}
                    </p>
                  </div>

                  <div className="absolute w-full h-full backface-hidden rounded-xl p-5 sm:p-6 md:p-8 shadow-xl flex items-center justify-center text-center rotate-y-180 border border-amber-200" style={{ backgroundColor: 'rgb(76 58 51)' }}>
                    <p className="text-base sm:text-lg md:text-xl font-semibold text-white leading-relaxed">
                      {feature.backText}
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
