import AuthenticatedLayout from '@/Layouts/Backend_Admin/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="text-xl font-semibold leading-tight text-gray-800">Admin Dashboard</h2>}
    >
      <Head title="Admin Dashboard" />

      <div className="py-8">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 className="text-lg font-medium mb-4">Selamat datang, {auth.user?.name || 'Admin'}!</h3>
            <p className="text-gray-600">Gunakan panel di samping untuk mengelola konten situs.</p>

            <div className="grid grid-cols-3 gap-6 mt-8">
              {[
                { title: 'Paket Tour', link: '/admin/paket-tours' },
                { title: 'Activity', link: '/admin/paket-activities' },
                { title: 'Rental Mobil/Motor', link: '/admin/paket-rentals' },
                { title: 'Booking Pelanggan', link: '/admin/bookings' },
                { title: 'Ulasan User', link: '/admin/reviews' },
              ].map((item, i) => (
                <a
                  key={i}
                  href={item.link}
                  className="bg-gray-100 p-5 rounded-lg shadow hover:bg-blue-100 transition"
                >
                  <h4 className="font-semibold text-gray-800">{item.title}</h4>
                </a>
              ))}
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}