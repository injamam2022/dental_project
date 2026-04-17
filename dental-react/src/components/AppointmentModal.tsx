import { X } from 'lucide-react';
import { useState, FormEvent } from 'react';
import { supabase } from '../lib/supabase';

interface AppointmentModalProps {
  isOpen: boolean;
  onClose: () => void;
}

const services = [
  'General Checkup',
  'Teeth Whitening',
  'Root Canal',
  'Dental Implants',
  'Braces / Aligners',
  'Smile Makeover',
  'Orthodontics',
  'ENT & Skin Support',
  'Other'
];

const branches = [
  'Ballygunge',
  'Salt Lake',
  'New Town'
];

export default function AppointmentModal({ isOpen, onClose }: AppointmentModalProps) {
  const [formData, setFormData] = useState({
    name: '',
    phone: '',
    email: '',
    service: '',
    branch: '',
    date: '',
    message: ''
  });
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = async (e: FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError('');
    setSuccess(false);

    try {
      if (!supabase) {
        throw new Error('Database not configured');
      }

      const { error: submitError } = await supabase
        .from('appointments')
        .insert([
          {
            name: formData.name,
            phone: formData.phone,
            email: formData.email || null,
            service: formData.service,
            branch: formData.branch,
            appointment_date: formData.date || null,
            message: formData.message || null
          }
        ]);

      if (submitError) throw submitError;

      setSuccess(true);
      setFormData({
        name: '',
        phone: '',
        email: '',
        service: '',
        branch: '',
        date: '',
        message: ''
      });

      setTimeout(() => {
        setSuccess(false);
        onClose();
      }, 3000);
    } catch (err) {
      setError('Failed to book appointment. Please try again.');
      console.error('Error booking appointment:', err);
    } finally {
      setLoading(false);
    }
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 animate-fadeIn">
      <div className="bg-white rounded-xl max-w-lg w-full max-h-[90vh] overflow-y-auto shadow-2xl animate-slideUp">
        <div className="sticky top-0 bg-white border-b border-neutral-grey/20 p-6 flex justify-between items-center">
          <div>
            <h2 className="text-2xl font-bold text-charcoal-black">Book Your Appointment</h2>
            <p className="text-sm text-charcoal-black/60 mt-1">Schedule your dental consultation with our specialists.</p>
          </div>
          <button
            onClick={onClose}
            className="text-charcoal-black/60 hover:text-charcoal-black transition-colors p-2 hover:bg-neutral-grey/10 rounded-full"
          >
            <X className="w-5 h-5" />
          </button>
        </div>

        <div className="p-6">
          {success && (
            <div className="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
              Thank you! Your appointment request has been received. Our team will contact you shortly.
            </div>
          )}

          {error && (
            <div className="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg text-sm">
              {error}
            </div>
          )}

          <form onSubmit={handleSubmit} className="space-y-4">
            <div>
              <label htmlFor="name" className="block text-sm font-medium text-charcoal-black mb-2">
                Full Name *
              </label>
              <input
                type="text"
                id="name"
                name="name"
                required
                value={formData.name}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black placeholder:text-charcoal-black/40 focus:outline-none focus:ring-2 focus:ring-deep-brown"
                placeholder="Enter your full name"
              />
            </div>

            <div>
              <label htmlFor="phone" className="block text-sm font-medium text-charcoal-black mb-2">
                Phone Number *
              </label>
              <input
                type="tel"
                id="phone"
                name="phone"
                required
                value={formData.phone}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black placeholder:text-charcoal-black/40 focus:outline-none focus:ring-2 focus:ring-deep-brown"
                placeholder="Enter your phone number"
              />
            </div>

            <div>
              <label htmlFor="email" className="block text-sm font-medium text-charcoal-black mb-2">
                Email Address
              </label>
              <input
                type="email"
                id="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black placeholder:text-charcoal-black/40 focus:outline-none focus:ring-2 focus:ring-deep-brown"
                placeholder="Enter your email address"
              />
            </div>

            <div>
              <label htmlFor="service" className="block text-sm font-medium text-charcoal-black mb-2">
                Select Service *
              </label>
              <select
                id="service"
                name="service"
                required
                value={formData.service}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black focus:outline-none focus:ring-2 focus:ring-deep-brown"
              >
                <option value="">Choose a service</option>
                {services.map((service) => (
                  <option key={service} value={service}>
                    {service}
                  </option>
                ))}
              </select>
            </div>

            <div>
              <label htmlFor="branch" className="block text-sm font-medium text-charcoal-black mb-2">
                Preferred Branch *
              </label>
              <select
                id="branch"
                name="branch"
                required
                value={formData.branch}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black focus:outline-none focus:ring-2 focus:ring-deep-brown"
              >
                <option value="">Select a branch</option>
                {branches.map((branch) => (
                  <option key={branch} value={branch}>
                    {branch}
                  </option>
                ))}
              </select>
            </div>

            <div>
              <label htmlFor="date" className="block text-sm font-medium text-charcoal-black mb-2">
                Appointment Date
              </label>
              <input
                type="date"
                id="date"
                name="date"
                value={formData.date}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black focus:outline-none focus:ring-2 focus:ring-deep-brown"
              />
            </div>

            <div>
              <label htmlFor="message" className="block text-sm font-medium text-charcoal-black mb-2">
                Message (Optional)
              </label>
              <textarea
                id="message"
                name="message"
                rows={3}
                value={formData.message}
                onChange={handleChange}
                className="w-full px-4 py-3 rounded-lg bg-white border border-neutral-grey text-charcoal-black placeholder:text-charcoal-black/40 focus:outline-none focus:ring-2 focus:ring-deep-brown resize-none"
                placeholder="Any additional information..."
              ></textarea>
            </div>

            <button
              type="submit"
              disabled={loading}
              className="w-full bg-deep-brown text-white py-4 rounded-lg font-semibold hover:bg-[#3A2C26] transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg"
            >
              {loading ? 'Submitting...' : 'Confirm Appointment'}
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}
