import React from "react";
import FrontendLayout from "../../Layouts/Frontend/FrontendLayout";

export default function PaketTour() {
  const paketList = [
    { id: 1, title: "Paket 1 Hari", price: "Rp. 123.000", img: "/assets/tour1.jpg" },
    { id: 2, title: "Paket 2 Hari", price: "Rp. 266.000", img: "/assets/tour2.jpg" },
    { id: 3, title: "Paket 3 Hari", price: "Rp. 340.000", img: "/assets/tour3.jpg" },
    { id: 4, title: "Paket 4 Hari", price: "Rp. 410.000", img: "/assets/tour4.jpg" },
    { id: 5, title: "Paket 5 Hari", price: "Rp. 520.000", img: "/assets/tour5.jpg" },
    { id: 6, title: "Paket 6 Hari", price: "Rp. 611.000", img: "/assets/tour6.jpg" },
  ];

  return (
    <FrontendLayout title="Paket Tour">
      {/* Header Section */}
      <div className="relative">
        <img
          src="/assets/Kuta Beach.jpg"
          alt="Paket Tour"
          className="w-full h-[400px] object-cover brightness-75"
        />
        <div className="absolute inset-0 flex flex-col justify-center items-center text-white">
          <h1 className="text-4xl font-bold">PAKET TOUR</h1>
        </div>

        {/* Search Box */}
        <div className="absolute bottom-[-40px] w-full flex justify-center">
          <div className="bg-white shadow-md p-4 rounded-lg flex gap-4 w-[80%] max-w-3xl">
            <input
              type="text"
              placeholder="Cari disini..."
              className="flex-1 border rounded px-3 py-2 focus:outline-none"
            />
            <select className="flex-1 border rounded px-3 py-2 focus:outline-none">
              <option value="">Pilih Kategori</option>
              <option value="day1">Paket 1 Hari</option>
              <option value="day2">Paket 2 Hari</option>
              <option value="day3">Paket 3 Hari</option>
            </select>
            <button className="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">
              Search
            </button>
          </div>
        </div>
      </div>

      {/* Content Section */}
      <section className="pt-32 pb-20 px-8 bg-white">
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          {paketList.map((item) => (
            <div
              key={item.id}
              className="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition"
            >
              <img src={item.img} alt={item.title} className="h-48 w-full object-cover" />
              <div className="p-4 text-left">
                <h3 className="text-lg font-semibold mb-1">{item.title}</h3>
                <p className="text-sm text-gray-500 mb-3">Start from</p>
                <p className="text-base font-semibold text-gray-800">{item.price}</p>
                <button className="mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                  Detail
                </button>
              </div>
            </div>
          ))}
        </div>
      </section>
    </FrontendLayout>
  );
}