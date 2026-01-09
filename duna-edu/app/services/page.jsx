'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Services from "@/components/navigation/Services";
import Work from "@/components/Work";
import Faq from "@/components/Faq";

const ServicesPage = () => {
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
        <section id="formations">
          <Services />
        </section>
        <section id="workshops">
          <Work />
        </section>
        <section id="ressources">
          {/* Future section ressources / data viz – placeholder pour Phase B */}
        </section>
        <section id="accompagnement">
          <Faq />
        </section>
      </main>
      <Footer />
    </div>
  );
};

export default ServicesPage;
