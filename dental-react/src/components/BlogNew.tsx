import { ArrowRight, Calendar, Tag } from 'lucide-react';
import { useRef } from 'react';

const blogPosts = [
  {
    title: 'The Complete Guide to Dental Implants',
    excerpt: 'Everything you need to know about dental implants, from the procedure to recovery and long-term care.',
    date: 'March 20, 2024',
    category: 'Treatment',
    image: 'https://images.pexels.com/photos/3845653/pexels-photo-3845653.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '5 min read'
  },
  {
    title: 'How to Choose the Best Dentist',
    excerpt: 'Key factors to consider when selecting a dental care provider for you and your family.',
    date: 'March 15, 2024',
    category: 'Guide',
    image: 'https://images.pexels.com/photos/6502307/pexels-photo-6502307.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '4 min read'
  },
  {
    title: '10 Tips for Healthy Teeth and Gums',
    excerpt: 'Essential daily habits and professional advice for maintaining optimal oral health.',
    date: 'March 12, 2024',
    category: 'Health',
    image: 'https://images.pexels.com/photos/3845630/pexels-photo-3845630.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '6 min read'
  },
  {
    title: 'Understanding Root Canal Treatment',
    excerpt: 'Learn about the signs, procedure, and what to expect during root canal therapy.',
    date: 'March 8, 2024',
    category: 'Treatment',
    image: 'https://images.pexels.com/photos/3845624/pexels-photo-3845624.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '7 min read'
  },
  {
    title: 'Teeth Whitening: Methods and Results',
    excerpt: 'Explore professional teeth whitening options and what you can realistically expect.',
    date: 'March 5, 2024',
    category: 'Cosmetic',
    image: 'https://images.pexels.com/photos/6502299/pexels-photo-6502299.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '5 min read'
  },
  {
    title: 'Caring for Your Child\'s First Teeth',
    excerpt: 'A parent\'s guide to pediatric dental care and establishing good oral hygiene early.',
    date: 'March 1, 2024',
    category: 'Pediatric',
    image: 'https://images.pexels.com/photos/3845630/pexels-photo-3845630.jpeg?auto=compress&cs=tinysrgb&w=800',
    readTime: '6 min read'
  }
];

export default function BlogNew() {
  const scrollContainerRef = useRef<HTMLDivElement>(null);

  const scroll = (direction: 'left' | 'right') => {
    if (scrollContainerRef.current) {
      const scrollAmount = 400;
      scrollContainerRef.current.scrollBy({
        left: direction === 'left' ? -scrollAmount : scrollAmount,
        behavior: 'smooth'
      });
    }
  };

  return (
    <section id="blog" className="py-section bg-light-bg overflow-hidden">
      <div className="container mx-auto px-4">
        <div className="flex items-end justify-between mb-8 md:mb-12">
          <div>
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-dark-text mb-3 md:mb-4">
              Latest From Our Blog
            </h2>
            <p className="text-sm sm:text-base text-medium-text max-w-2xl">
              Stay informed with our latest articles on dental health and care
            </p>
          </div>

          <div className="hidden md:flex gap-3">
            <button
              onClick={() => scroll('left')}
              className="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-primary-orange hover:text-white transition-all duration-200"
            >
              <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
              </svg>
            </button>
            <button
              onClick={() => scroll('right')}
              className="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center hover:bg-primary-orange hover:text-white transition-all duration-200"
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
          {blogPosts.map((post, index) => (
            <div
              key={index}
              className="flex-none w-[280px] sm:w-[320px] md:w-[340px] bg-white rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 group snap-start"
            >
              <div className="relative aspect-[16/9] overflow-hidden">
                <img
                  src={post.image}
                  alt={post.title}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div className="absolute top-4 left-4">
                  <span className="inline-flex items-center gap-1 bg-white/95 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-primary-orange">
                    <Tag className="w-3 h-3" />
                    {post.category}
                  </span>
                </div>
              </div>

              <div className="p-4 sm:p-5 md:p-6 space-y-3 md:space-y-4">
                <div className="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm text-gray-500">
                  <div className="flex items-center gap-1">
                    <Calendar className="w-3 h-3 sm:w-4 sm:h-4" />
                    <span>{post.date}</span>
                  </div>
                  <span>•</span>
                  <span>{post.readTime}</span>
                </div>

                <h3 className="text-lg sm:text-xl font-bold text-dark-text group-hover:text-primary-orange transition-colors line-clamp-2">
                  {post.title}
                </h3>

                <p className="text-sm sm:text-base text-medium-text leading-relaxed line-clamp-3">
                  {post.excerpt}
                </p>

                <button className="flex items-center gap-2 text-primary-orange font-semibold hover:gap-3 transition-all duration-200">
                  Read Article
                  <ArrowRight className="w-4 h-4" />
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
