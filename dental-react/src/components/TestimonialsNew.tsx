import { Star } from 'lucide-react';
import { useEffect, useRef } from 'react';

const testimonials = [
  {
    name: 'Priya Sharma',
    rating: 5,
    text: 'Very professional doctor and painless treatment. Best dental clinic in Kolkata. The care and attention I received exceeded all my expectations. Highly recommend for anyone looking for quality dental care.',
    avatar: 'PS',
    date: '2 weeks ago'
  },
  {
    name: 'Rajesh Kumar',
    rating: 5,
    text: 'Excellent service and modern equipment. The dental implant procedure was smooth and the results are amazing. The staff is courteous and the clinic maintains high hygiene standards.',
    avatar: 'RK',
    date: '1 month ago'
  },
  {
    name: 'Anjali Banerjee',
    rating: 5,
    text: 'Amazing results with teeth whitening! The staff is friendly and the clinic is very clean. Worth every penny spent here. Dr. Das is extremely patient and explains everything clearly.',
    avatar: 'AB',
    date: '3 weeks ago'
  },
  {
    name: 'Suresh Patel',
    rating: 5,
    text: 'I had my wisdom tooth extraction done here and it was surprisingly painless. The doctor is very skilled and caring. The follow-up care was excellent too.',
    avatar: 'SP',
    date: '1 week ago'
  },
  {
    name: 'Meera Reddy',
    rating: 5,
    text: 'Best orthodontic treatment in the city! My braces journey was smooth and the results are perfect. The team is very professional and always on time.',
    avatar: 'MR',
    date: '2 months ago'
  },
  {
    name: 'Amit Singh',
    rating: 5,
    text: 'Outstanding skin treatment services! The chemical peel gave me amazing results. The dermatologist is very knowledgeable and uses latest techniques.',
    avatar: 'AS',
    date: '3 weeks ago'
  },
  {
    name: 'Kavita Joshi',
    rating: 5,
    text: 'Great experience with root canal treatment. Completely painless procedure. The clinic is well-maintained and the staff is very supportive.',
    avatar: 'KJ',
    date: '1 month ago'
  },
  {
    name: 'Rahul Mehta',
    rating: 5,
    text: 'Fantastic dental clinic! Got my crown done here and it looks natural. Very happy with the service and professionalism of the entire team.',
    avatar: 'RM',
    date: '2 weeks ago'
  },
  {
    name: 'Deepa Iyer',
    rating: 5,
    text: 'Excellent care for my child\'s dental needs. The pediatric dentist is wonderful with kids. My daughter actually looks forward to dental visits now!',
    avatar: 'DI',
    date: '1 week ago'
  },
  {
    name: 'Sanjay Gupta',
    rating: 5,
    text: 'Top-notch facilities and expert doctors. Had my dental implants done and couldn\'t be happier with the results. Truly world-class treatment.',
    avatar: 'SG',
    date: '3 months ago'
  }
];

export default function TestimonialsNew() {
  const scrollRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const scrollContainer = scrollRef.current;
    if (!scrollContainer) return;

    let scrollInterval: NodeJS.Timeout;

    const startAutoScroll = () => {
      scrollInterval = setInterval(() => {
        if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 10) {
          scrollContainer.scrollLeft = 0;
        } else {
          scrollContainer.scrollLeft += 1;
        }
      }, 30);
    };

    const stopAutoScroll = () => {
      clearInterval(scrollInterval);
    };

    startAutoScroll();

    scrollContainer.addEventListener('mouseenter', stopAutoScroll);
    scrollContainer.addEventListener('mouseleave', startAutoScroll);

    return () => {
      clearInterval(scrollInterval);
      scrollContainer.removeEventListener('mouseenter', stopAutoScroll);
      scrollContainer.removeEventListener('mouseleave', startAutoScroll);
    };
  }, []);

  return (
    <section className="py-section bg-soft-ivory">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8 md:mb-12">
          <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
            Patient Testimonials
          </h2>
          <p className="text-sm sm:text-base text-charcoal-black/70 max-w-2xl mx-auto px-4">
            Read what our happy patients have to say about their experience
          </p>
        </div>

        <div
          ref={scrollRef}
          className="flex gap-4 sm:gap-6 overflow-x-auto scrollbar-hide pb-4"
          style={{ scrollBehavior: 'auto' }}
        >
          {[...testimonials, ...testimonials].map((testimonial, index) => (
            <div
              key={index}
              className="flex-shrink-0 w-[280px] sm:w-[320px] md:w-[350px] bg-white rounded-xl p-4 sm:p-5 md:p-6 shadow-md hover:shadow-lg transition-shadow duration-300 border border-[#E8E8E8]"
            >
              <div className="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4">
                <div className="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-deep-brown text-white flex items-center justify-center text-base sm:text-lg font-semibold">
                  {testimonial.avatar}
                </div>
                <div className="flex-1 min-w-0">
                  <h4 className="font-semibold text-charcoal-black text-sm sm:text-base truncate">{testimonial.name}</h4>
                  <p className="text-xs sm:text-sm text-charcoal-black/60">{testimonial.date}</p>
                </div>
              </div>

              <div className="flex gap-1 mb-2 sm:mb-3">
                {[...Array(testimonial.rating)].map((_, i) => (
                  <Star key={i} className="w-3 h-3 sm:w-4 sm:h-4 fill-[#FBBC04] text-[#FBBC04]" />
                ))}
              </div>

              <p className="text-charcoal-black/80 text-xs sm:text-sm leading-relaxed">
                {testimonial.text}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
