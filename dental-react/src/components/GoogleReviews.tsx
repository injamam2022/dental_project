import { useEffect, useRef } from 'react';

export default function GoogleReviews() {
  const scriptLoaded = useRef(false);

  useEffect(() => {
    if (!scriptLoaded.current) {
      const script = document.createElement('script');
      script.src = 'https://apps.elfsight.com/p/platform.js';
      script.async = true;
      script.defer = true;
      document.body.appendChild(script);
      scriptLoaded.current = true;

      return () => {
        if (script.parentNode) {
          script.parentNode.removeChild(script);
        }
      };
    }
  }, []);

  return (
    <section className="py-12 sm:py-16 md:py-20 bg-white">
      <div className="container mx-auto px-4">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-8 sm:mb-10 md:mb-12">
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 sm:mb-4">
              Google Reviews
            </h2>
            <p className="text-sm sm:text-base text-charcoal-black/70 max-w-2xl mx-auto px-4">
              See what our patients are saying about their experience at Dontia Dental Clinic
            </p>
          </div>

          <div className="mb-8 sm:mb-10">
            <div className="elfsight-app-placeholder" data-app-id="google-reviews-widget">
              <div className="bg-soft-ivory rounded-lg p-8 sm:p-12 text-center">
                <div className="animate-pulse">
                  <div className="h-4 bg-charcoal-black/10 rounded w-3/4 mx-auto mb-4"></div>
                  <div className="h-4 bg-charcoal-black/10 rounded w-1/2 mx-auto mb-4"></div>
                  <div className="h-4 bg-charcoal-black/10 rounded w-2/3 mx-auto"></div>
                </div>
                <p className="text-charcoal-black/50 mt-6 text-sm">Loading reviews...</p>
              </div>
            </div>
          </div>

          <div className="text-center">
            <a
              href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-2 bg-warm-brown hover:bg-warm-brown/90 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg text-sm sm:text-base"
            >
              <svg
                className="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
              </svg>
              View All Reviews on Google
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
