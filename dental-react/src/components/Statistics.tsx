import { useEffect, useState, useRef } from 'react';

interface StatItemProps {
  icon: string;
  label: string;
  targetValue: number;
  suffix: string;
  delay: number;
}

function StatItem({ icon, label, targetValue, suffix, delay }: StatItemProps) {
  const [count, setCount] = useState(0);
  const [isVisible, setIsVisible] = useState(false);
  const sectionRef = useRef<HTMLDivElement>(null);
  const hasAnimated = useRef(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !hasAnimated.current) {
            hasAnimated.current = true;
            setTimeout(() => {
              setIsVisible(true);
              animateCount();
            }, delay);
          }
        });
      },
      { threshold: 0.3 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => {
      if (sectionRef.current) {
        observer.unobserve(sectionRef.current);
      }
    };
  }, [delay]);

  const animateCount = () => {
    const duration = 1800;
    const steps = 60;
    const increment = targetValue / steps;
    let current = 0;
    const stepDuration = duration / steps;

    const timer = setInterval(() => {
      current += increment;
      if (current >= targetValue) {
        setCount(targetValue);
        clearInterval(timer);
      } else {
        setCount(Math.floor(current));
      }
    }, stepDuration);
  };

  return (
    <div
      ref={sectionRef}
      className={`transition-all duration-500 ${
        isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'
      }`}
    >
      <div className="flex flex-col items-center text-center space-y-3 sm:space-y-4">
        <div className="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-full bg-soft-ivory/10 border-2 border-soft-ivory flex items-center justify-center">
          <img src={icon} alt={label} className="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 object-contain brightness-0 invert" />
        </div>
        <div className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white">
          {count.toLocaleString()}{suffix}
        </div>
        <p className="text-sm sm:text-base font-medium text-soft-ivory px-2">
          {label}
        </p>
      </div>
    </div>
  );
}

export default function Statistics() {
  const stats = [
    { icon: '/Happy_Patients.png', label: 'Happy Patients', targetValue: 25000, suffix: '+', delay: 100 },
    { icon: '/Years_Of_Experience.png', label: 'Years Of Experience', targetValue: 25, suffix: '+', delay: 200 },
    { icon: '/Dental_Doctors.png', label: 'Dental Doctors', targetValue: 10, suffix: '+', delay: 300 },
    { icon: '/Dental_Implants_Placed.png', label: 'Dental Implants Placed', targetValue: 20000, suffix: '+', delay: 400 }
  ];

  return (
    <section className="py-12 sm:py-16 md:py-20 bg-[#4C3A33]">
      <div className="container mx-auto px-4">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-8 sm:mb-10 md:mb-12">
            <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">
              Our Dental Journey
            </h2>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
            {stats.map((stat, index) => (
              <StatItem
                key={index}
                icon={stat.icon}
                label={stat.label}
                targetValue={stat.targetValue}
                suffix={stat.suffix}
                delay={stat.delay}
              />
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
