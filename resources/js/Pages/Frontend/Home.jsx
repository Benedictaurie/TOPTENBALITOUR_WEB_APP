import React, { useEffect, useState } from "react";
import FrontendLayout from "../../Layouts/Frontend/FrontendLayout";
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export default function Home() {
  const images = [
    "/assets/Nusa-Penida-Bali.jpg",
    "/assets/Pura Luhur Lempuyang.jpg",
    "/assets/Pura Ulun Danu Bratan Temple.jpg",
  ];

  const [current, setCurrent] = useState(0);

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrent((prev) => (prev + 1) % images.length);
    }, 5000);
    return () => clearInterval(interval);
  }, [images.length]);

  return (
    <FrontendLayout>
      {/* Hero Section */}
      <section
        id="home"
        className="relative h-screen flex items-center justify-center text-white"
      >
        <img
          src={images[current]}
          alt="Bali"
          className="absolute inset-0 w-full h-full object-cover transition-all duration-1000"
        />
        <div className="relative z-10 text-center">
          <h1 className="text-4xl font-bold">LET’S TRAVEL!</h1>
          <p className="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="py-20 px-8 bg-white">
        <h2 className="text-2xl font-bold mb-4">WHO WE ARE?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        <button className="mt-4 px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded">
          Read More →
        </button>
      </section>

      {/* Services */}
      <section id="services" className="py-20 px-8 bg-white text-center">
        <h2 className="text-2xl font-bold mb-4">SERVICES</h2>
        {/* Paket Tour Section */}
        <div className="mb-16">
          <h3 className="text-xl font-semibold mb-6">PAKET TOUR</h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            {[
              { title: "Paket 1 hari", price: "Rp. 123.000", img: "/assets/tour1.jpg" },
              { title: "Paket 2 hari", price: "Rp. 266.000", img: "/assets/tour2.jpg" },
              { title: "Paket 3 hari", price: "Rp. 340.000", img: "/assets/tour3.jpg" },
              { title: "Paket 3 hari", price: "Rp. 410.000", img: "/assets/tour4.jpg" },
              { title: "Paket 3 hari", price: "Rp. 520.000", img: "/assets/tour5.jpg" },
              { title: "Paket 3 hari", price: "Rp. 611.000", img: "/assets/tour6.jpg" },
            ].map((pkg, i) => (
              <div key={i} className="relative overflow-hidden rounded-lg shadow-md">
                <img src={pkg.img} alt={pkg.title} className="w-full h-48 object-cover" />
                <div className="absolute inset-0 bg-black bg-opacity-30 flex flex-col justify-end p-4 text-white">
                  <h4 className="font-semibold">{pkg.title}</h4>
                  <p className="text-sm">{pkg.price}</p>
                  <button className="text-xs bg-white text-gray-800 mt-2 px-3 py-1 rounded hover:bg-gray-200">
                    DETAIL
                  </button>
                </div>
              </div>
            ))}
          </div>
          <button className="mt-6 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">More</button>
        </div>
        
        {/* Paket Activity Section */}
        <div className="mb-16">
          <h3 className="text-xl font-semibold mb-6">ACTIVITY</h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            {[
              { title: "ATV", price: "Rp. 410.000", img: "/assets/atv.jpg" },
              { title: "Swing", price: "Rp. 410.000", img: "/assets/swing.jpg" },
              { title: "Water Sports", price: "Rp. 410.000", img: "/assets/watersport.jpg" },
              { title: "Arum Jeram", price: "Rp. 410.000", img: "/assets/rafting.jpg" },
              { title: "Helicopter", price: "Rp. 410.000", img: "/assets/heli.jpg" },
              { title: "Surfing", price: "Rp. 410.000", img: "/assets/surfing.jpg" },
            ].map((pkg, i) => (
              <div key={i} className="relative overflow-hidden rounded-lg shadow-md">
                <img src={pkg.img} alt={pkg.title} className="w-full h-48 object-cover" />
                <div className="absolute inset-0 bg-black bg-opacity-30 flex flex-col justify-end p-4 text-white">
                  <h4 className="font-semibold">{pkg.title}</h4>
                  <p className="text-sm">{pkg.price}</p>
                  <button className="text-xs bg-white text-gray-800 mt-2 px-3 py-1 rounded hover:bg-gray-200">
                    DETAIL
                  </button>
                </div>
              </div>
            ))}
          </div>
          <button className="mt-6 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">More</button>
        </div>
            
        {/* Paket Rental Section */}
        <div className="mb-16">
          <h3 className="text-xl font-semibold mb-6">RENTAL MOBIL/MOTOR</h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center">
            {[
              { title: "Hiace", price: "Rp. 220.000", img: "/assets/hiace.jpg" },
              { title: "Yamaha Mio Z Suzuki", price: "Rp. 120.000", img: "/assets/motor.jpg" },
            ].map((pkg, i) => (
              <div key={i} className="bg-white rounded-lg shadow-md overflow-hidden">
                <img src={pkg.img} alt={pkg.title} className="w-full h-48 object-cover" />
                <div className="p-4 text-center">
                  <h4 className="font-semibold">{pkg.title}</h4>
                  <p className="text-sm">{pkg.price}</p>
                  <button className="mt-2 px-4 py-1 bg-gray-200 hover:bg-gray-300 rounded">
                    Lihat Detail
                  </button>
                </div>
              </div>
            ))}
          </div>
          <button className="mt-6 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">More</button>
        </div>

        {/*Testimonial Section*/}
        <div className="mb-16">
          <h3 className="text-xl font-semibold mb-6">TESTIMONIAL PELANGGAN</h3>
          
          <Swiper
            modules={[Navigation, Pagination, Autoplay]}
            spaceBetween={20} //jarak tiap card
            slidesPerView={1} //atur slidenya
            breakpoints={{
              640: { slidesPerView: 1 }, //atur slide di mobile - 1 card
              768: { slidesPerView: 2 }, //atur slide di tablet - 2 card
              1024: { slidesPerView: 3 }, //atur slide di desktop - 3 card
            }}
            navigation //menampilkan panah kiri-kanan
            pagination={{ clickable: true }} //titik pagination dibawah slider
            autoplay={{ delay: 5000, disableOnInteraction: false }} //otomatis geser tiap 5 detik
            loop={true} //geser terus tnpa habis
            className="pb-10"
          >
            {[1, 2, 3, 4, 5, 6].map((_, i) => (
              <SwiperSlide key={i}> {/* swiper slide adalah semua kartu testimoni */}
                <div className="bg-gray-100 p-6 rounded-lg shadow text-left">
                  <div className="flex items-center mb-2">
                    <span className="font-semibold">Customer Name {i + 1}</span>
                    <span className="text-sm ml-auto text-gray-500">
                      2025-12-12
                     </span>
                  </div>
                  <p className="text-yellow-500 text-sm mb-2">★★★★★</p>
                  <p className="text-sm text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  </p>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
          <div className="text-center mt-4">
            <button className="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">
              Lihat semua ulasan
            </button>
          </div>
        </div>
      </section> 
    </FrontendLayout>
  );
}