import AuthenticatedLayout from '@/Layouts/Backend_Admin/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useState } from 'react';

export default function PaketActivity({ auth, paketActivities = [] }) {
  const [search, setSearch] = useState('');

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="text-xl font-semibold text-gray-800">Kelola Paket Tour</h2>}
    >
      <Head title="Kelola Activity" />

      <div className="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div className="bg-white p-6 rounded-lg shadow">
          <div className="flex justify-between mb-4">
            <input
              type="text"
              placeholder="Cari paket..."
              value={search}
              onChange={(e) => setSearch(e.target.value)}
              className="border rounded px-3 py-2 w-1/3"
            />
            <button className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              + Tambah Paket
            </button>
          </div>

          <table className="w-full text-left border">
            <thead className="bg-gray-100">
              <tr>
                <th className="p-3 border">Nama Paket</th>
                <th className="p-3 border">Harga</th>
                <th className="p-3 border">Durasi</th>
                <th className="p-3 border">Aksi</th>
              </tr>
            </thead>
            <tbody>
              {paketTours.length ? (
                paketTours.map((paket, index) => (
                  <tr key={index}>
                    <td className="p-3 border">{paket.nama}</td>
                    <td className="p-3 border">{paket.harga}</td>
                    <td className="p-3 border">{paket.durasi}</td>
                    <td className="p-3 border text-sm space-x-2">
                      <button className="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                      <button className="px-3 py-1 bg-red-600 text-white rounded">Hapus</button>
                    </td>
                  </tr>
                ))
              ) : (
                <tr>
                  <td colSpan="4" className="text-center py-6 text-gray-500">
                    Belum ada data paket activity
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