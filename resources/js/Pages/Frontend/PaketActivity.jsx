import React from "react";
import FrontendLayout from "../../Layouts/Frontend/FrontendLayout";

export default function Activity() {
  const paketList = [
    { id: 1, title: "ATV", price: "Rp. 410.000", img: "/assets/atv.jpg" },
    { id: 2, title: "Swing", price: "Rp. 410.000", img: "/assets/swing.jpg" },
    { id: 3, title: "Water Sports", price: "Rp. 410.000", img: "/assets/watersport.jpg" },
    { id: 4, title: "Arung Jeram", price: "Rp. 410.000", img: "/assets/arung-jeram.jpg" },
    { id: 5, title: "Helicopter", price: "Rp. 410.000", img: "/assets/heli.jpg" },
    { id: 6, title: "Surfing", price: "Rp. 410.000", img: "/assets/surfing.jpg" },
  ];

  return (
    <FrontendLayout title="Activity">
      {/* Header Section */}
      <div className="relative">
        <img
          src="/assets/arung-jeram.jpg"
          alt="Activity"
          className="w-full h-[400px] object-cover brightness-75"
        />
        <div className="absolute inset-0 flex flex-col justify-center items-center text-white">
          <h1 className="text-4xl font-bold">ACTIVITY</h1>
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
              <option value="day1">ATV</option>
              <option value="day2">Swing</option>
              <option value="day3">Water Sports</option>
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