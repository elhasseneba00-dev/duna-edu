'use client';

import { useEffect, useState } from "react";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Faq from "@/components/Faq";

const AccompagnementPage = () => {
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
            <h1 className="h2 text-primary mb-4">Accompagnement & support</h1>
            <p className="text-lg text-gray-700 mb-6">
              DunaEdu ne se limite pas aux contenus : nous vous accompagnons avec du mentorat, du coaching et
              une équipe support dédiée.
            </p>
          </div>
        </section>
        <Faq />
      </main>
      <Footer />
    </div>
  );
};

export default AccompagnementPage;
