export default function Hero() {
  return (
    <section id="home" className="relative w-full overflow-hidden pt-[56px] md:pt-[80px]">
      <div className="relative w-full bg-stone-900">
        <div className="relative w-full">
          <img
            src="/Koel_Mallick_with_dentist_in_kolkata.JPG.jpeg"
            alt="Dontia Dental Clinic Team"
            className="w-full h-auto object-contain animate-hero-zoom"
            style={{
              maxHeight: '85vh',
              minHeight: '400px'
            }}
          />

          <div
            className="absolute inset-0"
            style={{
              background: 'linear-gradient(rgba(76, 58, 51, 0.3), rgba(76, 58, 51, 0.3))'
            }}
          />

          <div className="absolute inset-0 flex items-end px-4 pb-16 md:pb-20 lg:pb-24">
            <div className="max-w-4xl mx-auto w-full animate-fade-in-up">
              <h1 className="text-2xl sm:text-3xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white leading-tight mb-3 md:mb-5 drop-shadow-lg">
                Dontia Care Clinic
              </h1>

              <p className="text-sm sm:text-base md:text-2xl lg:text-3xl text-soft-ivory leading-snug md:leading-relaxed font-semibold drop-shadow-md">
                Your One-Stop Destination for a <br></br>Radiant Smile & Dental Needs
              </p>
            </div>
          </div>


          <div className="absolute inset-0 pointer-events-none">
            <div className="absolute top-1/4 left-1/4 w-2 h-2 bg-white/30 rounded-full animate-float-1"></div>
            <div className="absolute top-1/3 right-1/4 w-3 h-3 bg-white/20 rounded-full animate-float-2"></div>
            <div className="absolute bottom-1/3 left-1/3 w-2 h-2 bg-white/25 rounded-full animate-float-3"></div>
            <div className="absolute top-1/2 right-1/3 w-2 h-2 bg-white/30 rounded-full animate-float-1"></div>
          </div>
        </div>
      </div>
    </section>
  );
}
