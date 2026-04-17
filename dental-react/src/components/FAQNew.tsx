import { Plus, Minus } from 'lucide-react';
import { useState } from 'react';

const faqs = [
  {
    question: 'Who is the most famous dentist?',
    answer: 'Dr. Prabhjeet Sethi & Dr. Harleen Kaur is the best dentist in Kolkata.'
  },
  {
    question: 'What is the 2 2 2 rule in dentistry?',
    answer: 'Brush your teeth twice a day and floss for at least 2 minutes. Visit your dentist twice a year for regular checkups and cleanings.'
  },
  {
    question: 'How to choose the best dental clinic?',
    answer: 'Look for experienced dentists with specialisation, years of experience, knowledge, clinic hygiene, positive patient reviews, and dental technology inclusion.'
  },
  {
    question: 'Do you provide dental insurance?',
    answer: 'We don\'t provide dental insurance in India. However, our competitive pricing and flexible payment options make quality dental care accessible to all.'
  },
  {
    question: 'What are your consultation charges?',
    answer: 'Our consultation charges are ₹1200.'
  },
  {
    question: 'What are your clinic timings?',
    answer: 'Monday - Saturday: 10 AM - 8 PM. Sunday: Closed.'
  },
  {
    question: 'Where is your clinic located?',
    answer: 'We have two convenient locations: 78, Sambhunath Pandit St, near IPGME & R AND SSKM HOSPITAL, near Sant Kutiya Gurudwara, Elgin Rd, Bhowanipore, Kolkata, West Bengal 700020. And PS Aviator, Suite 306, Rajarhat Main Rd, Chinar Park, Dash Drone, Rajarhat, Kolkata, West Bengal 700136.'
  },
  {
    question: 'Do you provide a savings plan?',
    answer: 'No, we don\'t provide dental savings plans. However, we offer transparent pricing and can discuss payment options during your consultation.'
  },
  {
    question: 'What are your treatment costs?',
    answer: 'Dental Implant: ₹25,000 - ₹40,000. Root Canal: Starting from ₹7,000. Teeth Cleaning: Starting from ₹3,000. Prices may vary based on the complexity of your case.'
  },
  {
    question: 'Do you provide emergency dental services?',
    answer: 'Yes, we provide emergency dental services during our clinic timings. Please call us immediately for urgent dental issues.'
  }
];

export default function FAQNew() {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const toggle = (index: number) => {
    setOpenIndex(openIndex === index ? null : index);
  };

  return (
    <section className="py-section bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-10 sm:mb-12 md:mb-16">
          <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text mb-3 md:mb-4">
            Frequently Asked Questions
          </h2>
          <p className="text-sm sm:text-base text-medium-text max-w-2xl mx-auto px-4">
            Find answers to common questions about our dental services
          </p>
        </div>

        <div className="max-w-3xl mx-auto space-y-3 sm:space-y-4">
          {faqs.map((faq, index) => (
            <div
              key={index}
              className="bg-light-bg rounded-xl overflow-hidden"
            >
              <button
                onClick={() => toggle(index)}
                className={`w-full px-4 sm:px-5 md:px-6 py-3 sm:py-4 md:py-5 flex items-center justify-between text-left transition-colors duration-200 ${
                  openIndex === index ? 'bg-primary-orange/5' : 'hover:bg-gray-100'
                }`}
              >
                <span className="text-sm sm:text-base md:text-lg font-semibold text-dark-text pr-3 sm:pr-4">
                  {faq.question}
                </span>
                <div className={`flex-shrink-0 w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center transition-all duration-300 ${
                  openIndex === index
                    ? 'bg-primary-orange text-white'
                    : 'bg-gray-200 text-dark-text'
                }`}>
                  {openIndex === index ? (
                    <Minus className="w-4 h-4 sm:w-5 sm:h-5" />
                  ) : (
                    <Plus className="w-4 h-4 sm:w-5 sm:h-5" />
                  )}
                </div>
              </button>

              <div
                className={`overflow-hidden transition-all duration-300 ${
                  openIndex === index ? 'max-h-96' : 'max-h-0'
                }`}
              >
                <div className="px-4 sm:px-5 md:px-6 pb-3 sm:pb-4 md:pb-5 text-sm sm:text-base text-medium-text leading-relaxed">
                  {faq.answer}
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
