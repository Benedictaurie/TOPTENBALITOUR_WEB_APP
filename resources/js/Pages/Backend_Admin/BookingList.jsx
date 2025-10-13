import AuthenticatedLayout from '@/Layouts/Backend_Admin/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function BookingList({ auth, bookings = [] }) {
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="text-xl font-semibold text-gray-800">Data Booking Pelanggan</h2>}
    >
      <Head title="Booking Pelanggan" />

      <div className="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div className="bg-white p-6 rounded-lg shadow">
          <table className="w-full text-left border">
            <thead className="bg-gray-100">
              <tr>
                <th className="p-3 border">Nama Pelanggan</th>
                <th className="p-3 border">Paket</th>
                <th className="p-3 border">Tanggal</th>
                <th className="p-3 border">Status</th>
                <th className="p-3 border">Aksi</th>
              </tr>
            </thead>
            <tbody>
              {bookings.length ? (
                bookings.map((b, index) => (
                  <tr key={index}>
                    <td className="p-3 border">{b.nama}</td>
                    <td className="p-3 border">{b.paket}</td>
                    <td className="p-3 border">{b.tanggal}</td>
                    <td className="p-3 border">{b.status}</td>
                    <td className="p-3 border">
                      <button className="bg-green-600 text-white px-3 py-1 rounded">Konfirmasi</button>
                    </td>
                  </tr>
                ))
              ) : (
                <tr>
                  <td colSpan="5" className="text-center py-6 text-gray-500">
                    Belum ada data booking
                  </td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}