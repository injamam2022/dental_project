import { MapPin, Phone, Mail, Facebook, Instagram, Youtube, Linkedin } from 'lucide-react';

export default function TopBar() {
  return (
    <div className="hidden md:block bg-gradient-to-r from-stone-50 to-neutral-50 border-b border-stone-200">
      <div className="container mx-auto px-3 sm:px-4 lg:px-6">
        <div className="flex flex-col lg:flex-row justify-between items-center py-1.5 lg:py-2 gap-2 lg:gap-3">
          <div className="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-2 lg:gap-4 w-full lg:w-auto overflow-x-auto scrollbar-hide">
            <div className="flex items-center gap-1.5 text-stone-700 group cursor-pointer">
              <div className="w-7 h-7 md:w-8 md:h-8 rounded-full bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors flex-shrink-0">
                <MapPin className="w-3 h-3 md:w-3.5 md:h-3.5 text-amber-600" />
              </div>
              <div className="flex flex-col min-w-0">
                <span className="text-[8px] md:text-[9px] font-medium text-stone-500 uppercase tracking-wide">Address</span>
                <span className="text-[9px] md:text-[10px] font-medium text-stone-800 truncate">Avani Vision, 78 S.N Pandit Street, Kolkata 20</span>
              </div>
            </div>

            <div className="hidden xl:block w-px h-8 bg-stone-200"></div>

            <div className="flex items-center gap-1.5 text-stone-700 group cursor-pointer">
              <div className="w-7 h-7 md:w-8 md:h-8 rounded-full bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors flex-shrink-0">
                <MapPin className="w-3 h-3 md:w-3.5 md:h-3.5 text-amber-600" />
              </div>
              <div className="flex flex-col min-w-0">
                <span className="text-[8px] md:text-[9px] font-medium text-stone-500 uppercase tracking-wide">Address</span>
                <span className="text-[9px] md:text-[10px] font-medium text-stone-800 truncate">Suite 306, P.S Aviator Chinar Park, Kolkata</span>
              </div>
            </div>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-2 lg:gap-3">
            <a href="tel:+919830411212" className="flex items-center gap-1.5 text-stone-700 hover:text-amber-600 transition-all group">
              <div className="w-7 h-7 md:w-8 md:h-8 rounded-full bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors flex-shrink-0">
                <Phone className="w-3 h-3 md:w-3.5 md:h-3.5 text-amber-600" />
              </div>
              <div className="flex flex-col">
                <span className="text-[8px] md:text-[9px] font-medium text-stone-500 uppercase tracking-wide">Phone No</span>
                <span className="text-[9px] md:text-[10px] font-semibold text-stone-800 group-hover:text-amber-600">+91 98304 11212</span>
              </div>
            </a>

            <a href="tel:+919830706396" className="flex items-center gap-1.5 text-stone-700 hover:text-amber-600 transition-all group">
              <div className="w-7 h-7 md:w-8 md:h-8 rounded-full bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors flex-shrink-0">
                <Phone className="w-3 h-3 md:w-3.5 md:h-3.5 text-amber-600" />
              </div>
              <div className="flex flex-col">
                <span className="text-[8px] md:text-[9px] font-medium text-stone-500 uppercase tracking-wide">Phone No</span>
                <span className="text-[9px] md:text-[10px] font-semibold text-stone-800 group-hover:text-amber-600">+91 98307 06396</span>
              </div>
            </a>

            <a href="mailto:support@dontiacareclinic.com" className="hidden lg:flex items-center gap-1.5 text-stone-700 hover:text-amber-600 transition-all group">
              <div className="w-7 h-7 md:w-8 md:h-8 rounded-full bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
                <Mail className="w-3 h-3 md:w-3.5 md:h-3.5 text-amber-600" />
              </div>
              <div className="flex flex-col">
                <span className="text-[8px] md:text-[9px] font-medium text-stone-500 uppercase tracking-wide">Email</span>
                <span className="text-[9px] md:text-[10px] font-semibold text-stone-800 group-hover:text-amber-600">support@dontiacareclinic.com</span>
              </div>
            </a>

            <div className="hidden lg:block w-px h-8 bg-stone-200"></div>

            <div className="flex items-center gap-1.5">
              <a
                href="https://facebook.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-7 h-7 md:w-8 md:h-8 bg-stone-800 rounded-full flex items-center justify-center text-white hover:bg-amber-600 hover:scale-110 transition-all duration-300 shadow-sm"
                aria-label="Facebook"
              >
                <Facebook className="w-3 h-3 md:w-3.5 md:h-3.5" fill="currentColor" />
              </a>
              <a
                href="https://instagram.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-7 h-7 md:w-8 md:h-8 bg-stone-800 rounded-full flex items-center justify-center text-white hover:bg-amber-600 hover:scale-110 transition-all duration-300 shadow-sm"
                aria-label="Instagram"
              >
                <Instagram className="w-3 h-3 md:w-3.5 md:h-3.5" />
              </a>
              <a
                href="https://youtube.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-7 h-7 md:w-8 md:h-8 bg-stone-800 rounded-full flex items-center justify-center text-white hover:bg-amber-600 hover:scale-110 transition-all duration-300 shadow-sm"
                aria-label="YouTube"
              >
                <Youtube className="w-3 h-3 md:w-3.5 md:h-3.5" fill="currentColor" />
              </a>
              <a
                href="https://linkedin.com"
                target="_blank"
                rel="noopener noreferrer"
                className="w-7 h-7 md:w-8 md:h-8 bg-stone-800 rounded-full flex items-center justify-center text-white hover:bg-amber-600 hover:scale-110 transition-all duration-300 shadow-sm"
                aria-label="LinkedIn"
              >
                <Linkedin className="w-3 h-3 md:w-3.5 md:h-3.5" fill="currentColor" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
