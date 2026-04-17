import { Calendar, MessageCircle } from 'lucide-react';

interface FloatingBookButtonProps {
  onClick: () => void;
}

export default function FloatingBookButton({ onClick }: FloatingBookButtonProps) {
  return (
    <>
      <button
        onClick={onClick}
        className="fixed top-1/2 -translate-y-1/2 right-0 bg-deep-brown text-white py-6 px-3 rounded-l-full shadow-2xl hover:bg-[#3A2C26] transition-all duration-300 z-50 group hover:scale-105 animate-pulse hover:animate-none"
        aria-label="Book Appointment"
      >
        <div className="flex flex-col items-center gap-2">
          <Calendar className="w-5 h-5 group-hover:rotate-[360deg] transition-transform duration-500" />
          <span className="text-xs font-semibold whitespace-nowrap" style={{ writingMode: 'vertical-rl', textOrientation: 'mixed' }}>
            Book Appointment
          </span>
        </div>
      </button>

      <a
        href="https://wa.me/919830411212"
        target="_blank"
        rel="noopener noreferrer"
        className="fixed bottom-8 right-8 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition-all duration-300 z-50 group hover:scale-110"
        aria-label="Chat on WhatsApp"
      >
        <MessageCircle className="w-6 h-6 group-hover:rotate-12 transition-transform" fill="currentColor" />
      </a>
    </>
  );
}
