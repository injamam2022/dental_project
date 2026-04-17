import { useState, useEffect } from 'react';
import { Phone, Menu, X, ChevronDown } from 'lucide-react';
import { useNavigate, useLocation } from 'react-router-dom';
import TopBar from './TopBar';

export default function Navigation() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [openDropdown, setOpenDropdown] = useState<string | null>(null);
  const navigate = useNavigate();
  const location = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const scrollToSection = (id: string) => {
    if (location.pathname !== '/') {
      navigate('/');
      setTimeout(() => {
        document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
      }, 100);
    } else {
      document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
    }
    setIsMobileMenuOpen(false);
    setOpenDropdown(null);
  };

  const navigateToPage = (path: string) => {
    navigate(path);
    setIsMobileMenuOpen(false);
    setOpenDropdown(null);
  };

  const toggleDropdown = (menu: string) => {
    setOpenDropdown(openDropdown === menu ? null : menu);
  };

  return (
    <nav className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${isScrolled ? 'bg-white shadow-md' : 'bg-white'
      }`}>
      <TopBar />
      <div className="container mx-auto px-3 sm:px-4">
        <div className="flex items-center justify-between h-14 md:h-16 lg:h-20">
          <div className="flex items-center">
            <button onClick={() => navigate('/')}>
              <img
                src="/DCC_Logo-03.png"
                alt="Dontia Care Clinic"
                className="w-auto cursor-pointer"
                style={{ height: '7rem' }}
              />
            </button>
          </div>

          <div className="hidden lg:flex items-center space-x-8">
            <button onClick={() => scrollToSection('home')} className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200">
              Home
            </button>
            <button onClick={() => scrollToSection('about')} className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200">
              Dental Clinic
            </button>

            <div className="relative group">
              <button
                className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200 flex items-center gap-1"
                onClick={() => scrollToSection('services')}
              >
                Services
                <ChevronDown className="w-4 h-4" />
              </button>
              <div className="absolute top-full left-0 mt-2 w-40 sm:w-48 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                <button onClick={() => navigateToPage('/best-dental-clinic-in-kolkata')} className="block w-full text-left px-4 py-3 text-sm text-dark-text hover:bg-gray-50 hover:text-primary-orange">
                  Dental Services
                </button>
              </div>
            </div>

            <div className="relative group">
              <button
                className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200 flex items-center gap-1"
                onClick={() => scrollToSection('doctors')}
              >
                Doctors
                <ChevronDown className="w-4 h-4" />
              </button>
              <div className="absolute top-full left-0 mt-2 w-40 sm:w-48 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                <button onClick={() => scrollToSection('doctors')} className="block w-full text-left px-4 py-3 text-sm text-dark-text hover:bg-gray-50 hover:text-primary-orange">
                  Dentist Profiles
                </button>
              </div>
            </div>

            <div className="relative group">
              <button
                className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200 flex items-center gap-1"
                onClick={() => scrollToSection('blog')}
              >
                Blog
                <ChevronDown className="w-4 h-4" />
              </button>
              <div className="absolute top-full left-0 mt-2 w-40 sm:w-48 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                <button onClick={() => scrollToSection('blog')} className="block w-full text-left px-4 py-3 text-sm text-dark-text hover:bg-gray-50 hover:text-primary-orange">
                  Dental Blog
                </button>
              </div>
            </div>

            <button onClick={() => scrollToSection('contact')} className="text-sm font-medium text-dark-text hover:text-primary-orange transition-colors duration-200">
              Contact
            </button>
          </div>

          <div className="flex items-center gap-2 sm:gap-4">
            <a
              href="tel:09830411212"
              className="hidden md:flex items-center gap-2 bg-primary-orange text-white px-4 md:px-6 py-2 md:py-3 rounded-pill text-xs md:text-sm font-semibold hover:bg-orange-600 transition-all duration-200 shadow-lg hover:shadow-xl"
            >
              <Phone className="w-3 h-3 md:w-4 md:h-4" />
              <span className="hidden lg:inline">CALL US NOW</span>
              <span className="lg:hidden">CALL</span>
            </a>

            <button
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className="lg:hidden text-dark-text p-1.5 sm:p-2"
            >
              {isMobileMenuOpen ? <X className="w-5 h-5 sm:w-6 sm:h-6" /> : <Menu className="w-5 h-5 sm:w-6 sm:h-6" />}
            </button>
          </div>
        </div>
      </div>

      {isMobileMenuOpen && (
        <div className="lg:hidden bg-white border-t border-gray-200 shadow-lg">
          <div className="container mx-auto px-4 py-4 flex flex-col space-y-3">
            <button onClick={() => scrollToSection('home')} className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2">
              Home
            </button>
            <button onClick={() => scrollToSection('about')} className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2">
              Dental Clinic
            </button>

            <div>
              <button
                onClick={() => toggleDropdown('services')}
                className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2 w-full flex items-center justify-between"
              >
                Services
                <ChevronDown className={`w-4 h-4 transition-transform ${openDropdown === 'services' ? 'rotate-180' : ''}`} />
              </button>
              {openDropdown === 'services' && (
                <div className="pl-4 mt-2">
                  <button onClick={() => navigateToPage('/best-dental-clinic-in-kolkata')} className="text-left text-sm text-dark-text hover:text-primary-orange py-2 w-full">
                    Dental Services
                  </button>
                </div>
              )}
            </div>

            <div>
              <button
                onClick={() => toggleDropdown('doctors')}
                className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2 w-full flex items-center justify-between"
              >
                Doctors
                <ChevronDown className={`w-4 h-4 transition-transform ${openDropdown === 'doctors' ? 'rotate-180' : ''}`} />
              </button>
              {openDropdown === 'doctors' && (
                <div className="pl-4 mt-2">
                  <button onClick={() => scrollToSection('doctors')} className="text-left text-sm text-dark-text hover:text-primary-orange py-2 w-full">
                    Dentist Profiles
                  </button>
                </div>
              )}
            </div>

            <div>
              <button
                onClick={() => toggleDropdown('blog')}
                className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2 w-full flex items-center justify-between"
              >
                Blog
                <ChevronDown className={`w-4 h-4 transition-transform ${openDropdown === 'blog' ? 'rotate-180' : ''}`} />
              </button>
              {openDropdown === 'blog' && (
                <div className="pl-4 mt-2">
                  <button onClick={() => scrollToSection('blog')} className="text-left text-sm text-dark-text hover:text-primary-orange py-2 w-full">
                    Dental Blog
                  </button>
                </div>
              )}
            </div>

            <button onClick={() => scrollToSection('contact')} className="text-left text-sm font-medium text-dark-text hover:text-primary-orange py-2">
              Contact
            </button>
            <a
              href="tel:09830411212"
              className="flex items-center justify-center gap-2 bg-primary-orange text-white px-6 py-3 rounded-pill text-sm font-semibold mt-2"
            >
              <Phone className="w-4 h-4" />
              CALL US NOW
            </a>
          </div>
        </div>
      )}
    </nav>
  );
}
