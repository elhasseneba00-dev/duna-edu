'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";

const RessourcesPage = () => {
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
            <h1 className="h2 text-primary mb-4">Ressources & visualisations</h1>
            <p className="text-lg text-gray-700 mb-6">
              Une bibliothèque d'e-books, de vidéos, de templates et bientôt des outils de data visualisation
              pour suivre votre progression.
            </p>
            <p className="text-lg text-gray-700">
              Cette section sera enrichie en Phase B avec un espace étudiant complet et des dashboards
              personnalisés.
            </p>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
};

export default RessourcesPage;
