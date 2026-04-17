import { useState } from 'react';

const mapUrl1 = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.2843285678547!2d88.44060627602562!3d22.623503633995577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89ff4cfe982d1%3A0x64854198c39abe7!2sDontia%20Care%20Clinic!5e0!3m2!1sen!2sin!4v1709641234567!5m2!1sen!2sin';
const mapUrl2 = 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d235857.2326899533!2d88.2385798!3d22.5315841!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277407a40b10f%3A0xce0b3166ae5f2ed9!2sDontia%20Dental%2C%20Skin%2C%20ENT%20Care%20Clinic!5e0!3m2!1sen!2sin!4v1775669637915!5m2!1sen!2sin';

export default function AppointmentNew() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    phone: '',
    service: '',
    date: ''
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Form submitted:', formData);
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  return (
    <section id="appointment" className="py-section bg-gradient-to-br from-stone-100 via-rose-50 to-amber-50">
      <div className="container mx-auto px-4">
        <div className="max-w-7xl mx-auto bg-white/80 backdrop-blur-sm rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden">
          <div className="grid md:grid-cols-2 gap-0">
            {/* Maps Section */}
            <div className="flex flex-col h-[400px] sm:h-[500px] md:h-[600px] lg:h-[700px]">
              <div className="relative flex-1">
                <iframe
                  src={mapUrl1}
                  width="100%"
                  height="100%"
                  style={{ border: 0 }}
                  allowFullScreen
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                  className="absolute inset-0 w-full h-full"
                ></iframe>
              </div>
              <div className="h-2 bg-white/80"></div>
              <div className="relative flex-1">
                <iframe
                  src={mapUrl2}
                  width="100%"
                  height="100%"
                  style={{ border: 0 }}
                  allowFullScreen
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                  className="absolute inset-0 w-full h-full"
                ></iframe>
              </div>
            </div>

            {/* Form Section */}
            <div className="p-5 sm:p-6 md:p-8 lg:p-12 bg-gradient-to-br from-stone-50 to-rose-50/30 flex flex-col justify-center">
              <div className="mb-6 md:mb-8">
                <h2 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-charcoal-black mb-3 md:mb-4">
                  Dontia Care Clinic
                </h2>
              </div>

              <form onSubmit={handleSubmit} className="space-y-4 md:space-y-5">
                <div>
                  <input
                    type="text"
                    name="name"
                    placeholder="Enter Your Name"
                    value={formData.name}
                    onChange={handleChange}
                    className="w-full px-4 sm:px-5 py-3 sm:py-3.5 bg-white border border-stone-200 rounded-xl text-sm sm:text-base text-charcoal-black placeholder:text-charcoal-black/50 focus:outline-none focus:ring-2 focus:ring-amber-700/30 focus:border-amber-700 transition-all"
                    required
                  />
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                  <input
                    type="email"
                    name="email"
                    placeholder="Enter Your Email id"
                    value={formData.email}
                    onChange={handleChange}
                    className="w-full px-4 sm:px-5 py-3 sm:py-3.5 bg-white border border-stone-200 rounded-xl text-sm sm:text-base text-charcoal-black placeholder:text-charcoal-black/50 focus:outline-none focus:ring-2 focus:ring-amber-700/30 focus:border-amber-700 transition-all"
                    required
                  />
                  <input
                    type="tel"
                    name="phone"
                    placeholder="Enter Your Phone Number"
                    value={formData.phone}
                    onChange={handleChange}
                    className="w-full px-4 sm:px-5 py-3 sm:py-3.5 bg-white border border-stone-200 rounded-xl text-sm sm:text-base text-charcoal-black placeholder:text-charcoal-black/50 focus:outline-none focus:ring-2 focus:ring-amber-700/30 focus:border-amber-700 transition-all"
                    required
                  />
                </div>

                <div>
                  <select
                    name="service"
                    value={formData.service}
                    onChange={handleChange}
                    className="w-full px-4 sm:px-5 py-3 sm:py-3.5 bg-white border border-stone-200 rounded-xl text-sm sm:text-base text-charcoal-black focus:outline-none focus:ring-2 focus:ring-amber-700/30 focus:border-amber-700 transition-all appearance-none cursor-pointer"
                    required
                  >
                    <option value="">- Select Services -</option>
                    <option value="general">General Dentistry</option>
                    <option value="cosmetic">Cosmetic Dentistry</option>
                    <option value="orthodontics">Orthodontics</option>
                    <option value="implants">Dental Implants</option>
                    <option value="whitening">Teeth Whitening</option>
                    <option value="cleaning">Dental Cleaning</option>
                  </select>
                </div>

                <div>
                  <input
                    type="date"
                    name="date"
                    placeholder="Appointment Date"
                    value={formData.date}
                    onChange={handleChange}
                    className="w-full px-5 py-3.5 bg-white border border-stone-200 rounded-xl text-charcoal-black focus:outline-none focus:ring-2 focus:ring-amber-700/30 focus:border-amber-700 transition-all"
                    required
                  />
                </div>

                <button
                  type="submit"
                  className="w-full bg-gradient-to-r from-amber-800 to-amber-900 hover:from-amber-900 hover:to-amber-950 text-white text-sm sm:text-base font-semibold py-3 sm:py-4 px-6 sm:px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300"
                >
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
