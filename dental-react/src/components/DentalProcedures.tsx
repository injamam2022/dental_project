const procedures = [
  {
    title: 'Preventive Dentistry',
    description: 'Help maintain your oral health, prevent cavities, gum disease, enamel wear, decay & erosion.',
  },
  {
    title: 'Restorative Dentistry',
    description: 'Restore oral health, function & aesthetics of your teeth by maintaining, diagnosing, managing & treating the disease of the gums & teeth.',
  },
  {
    title: 'Cosmetic Dentistry',
    description: 'It helps in improving the appearance of your smile with veneer, teeth whitening, and crown procedure.',
  },
  {
    title: 'Orthodontic Dentistry',
    description: 'This procedure helps in correcting facial asymmetry with dental braces for misaligned teeth, bite issues, crowded teeth & crooked teeth.',
  },
  {
    title: 'Dental Surgery',
    description: 'We have specialised dental surgeons for tooth extractions, root end surgery, gum grafting & much more.',
  },
  {
    title: 'Sedation Dentistry',
    description: 'If you fear dental treatments then we have the best sedation options to keep you comfortable during procedures.',
  },
];

export default function DentalProcedures() {
  return (
    <section className="py-20 bg-gradient-to-b from-white to-blue-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-16">
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Dental Procedures
          </h2>
          <p className="text-lg text-gray-600 max-w-3xl mx-auto">
            Comprehensive dental care tailored to your needs
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {procedures.map((procedure, index) => (
            <div
              key={index}
              className="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100"
            >
              <h3 className="text-xl font-bold text-gray-900 mb-4">
                {procedure.title}
              </h3>
              <p className="text-gray-600 leading-relaxed">
                {procedure.description}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
