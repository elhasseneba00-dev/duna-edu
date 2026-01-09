'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Carrieres from "@/components/navigation/Carrieres";
import Faq from "@/components/Faq";

const CarrieresPage = () => {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <div className="min-h-screen">
      <Topbar isScrolled={isScrolled} />
      <Header isScrolled={isScrolled} />
      <main>
        <Carrieres />
        <Faq />
      </main>
      <Footer />
    </div>
  );
};

export default CarrieresPage;
