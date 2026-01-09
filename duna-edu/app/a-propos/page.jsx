'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import About from "@/components/navigation/About";
import Stats from "@/components/Stats";
import Testimonials from "@/components/Testimonials";
import Faq from "@/components/Faq";

const AProposPage = () => {
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
        {/* L'entreprise */}
        <section id="entreprise">
          <About />
        </section>

        {/* Culture & pédagogie (placeholder basé sur About/Stats) */}
        <section id="culture">
          <Stats />
        </section>

        {/* Témoignages & équipe (équipe pourra être détaillée plus tard) */}
        <section id="equipe">
          <Testimonials />
        </section>

        <Faq />
      </main>
      <Footer />
    </div>
  );
};

export default AProposPage;
