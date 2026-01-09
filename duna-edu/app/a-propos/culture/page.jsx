'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Stats from "@/components/Stats";
import Faq from "@/components/Faq";

const CulturePage = () => {
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
        <section className="py-20 xl:py-28 bg-white">
          <div className="container mx-auto px-4 max-w-3xl">
            <h1 className="h2 text-primary mb-4">Culture & approche pédagogique</h1>
            <p className="text-lg text-gray-700 mb-6">
              Chez DunaEdu, nous croyons à une pédagogie active, centrée sur la pratique, les projets
              réels et l'accompagnement personnalisé.
            </p>
            <p className="text-lg text-gray-700">
              Nos programmes sont construits avec des experts du terrain, mis à jour en continu et pensés
              pour s'adapter au rythme de chaque apprenant.
            </p>
          </div>
        </section>
        <Stats />
        <Faq />
      </main>
      <Footer />
    </div>
  );
};

export default CulturePage;
