import React from "react";
import Dropdown from "@/Components/Dropdown";
import { Link } from "@inertiajs/react";


export default function FrontendLayout({ children }) {
  return (
    <div className="font-sans text-gray-900">
      {/* Navbar */}
      <nav className="flex justify-between items-center px-9 py-7 shadow-md bg-white fixed w-full top-0 z-50">
        <div className="font-bold text-lg">
          <a href={route('home')}>TOPTEN BALI TOUR</a>
        </div>
        <ul className="flex space-x-6">
          <li>
            <a href= {route('home')} className="hover:text-blue-500">Home</a>
          </li>
          <li>
            <a href="#about" className="hover:text-blue-500">About</a>
          </li>
          <li>
            <Dropdown>
              <Dropdown.Trigger>
                <button className="flex items-center hover:text-blue-500 focus:outline-none">
                  Services <span className="ml-1">▼</span>
                </button>
              </Dropdown.Trigger>

              <Dropdown.Content align="center" width="45">
                <Dropdown.Link href={route('paket-tour')} className="flex items-center hover:text-blue-500 focus:outline-none">
                  Paket Tour
                </Dropdown.Link>
                <Dropdown.Link href={route('activity')} className="flex items-center hover:text-blue-500 focus:outline-none">
                  Activity
                </Dropdown.Link>
                <Dropdown.Link href={route('rental')} className="flex items-center hover:text-blue-500 focus:outline-none">
                  Rental Mobil/Motor
                </Dropdown.Link>
              </Dropdown.Content>
            </Dropdown>
          </li>
          <li>
            <a href="#contact" className="hover:text-blue-500">Contact Us</a>
          </li>
        </ul>
      </nav>

      {/* Content dari setiap Page */}
      <main className="pt-20">{children}</main>

      {/* Footer */}
      <footer id="contact" className="bg-gray-200 py-12 px-8 mt-20">
        <div className="grid grid-cols-3 gap-6">
          <div>
            <h3 className="font-bold">TOPTEN BALI TOUR</h3>
            <p>Lorem ipsum dolor sit amet...</p>
          </div>
          <div>
            <h3 className="font-bold">Contacts Us</h3>
            <p>📱 +62xxxxx</p>
            <p>📧 topten@gmail.com</p>
          </div>
          <div>
            <h3 className="font-bold">Gallery</h3>
            <div className="flex space-x-4 mt-2">
              <div className="bg-gray-500 w-24 h-16 flex items-center justify-center text-white">PICTURE</div>
              <div className="bg-gray-500 w-24 h-16 flex items-center justify-center text-white">PICTURE</div>
            </div>
          </div>
        </div>
        <p className="text-center mt-8 text-sm">
          Copyright © 2025 TOPTEN BALI TOUR. All Rights Reserved.
        </p>
      </footer>
    </div>
  );
}