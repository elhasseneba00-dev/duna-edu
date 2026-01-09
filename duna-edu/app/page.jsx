'use client';

import Faq from "@/components/Faq";
import Footer from "@/components/Footer";
import Header from "@/components/Header";
import Hero from "@/components/Hero";
import About from "@/components/navigation/About";
import Carrieres from "@/components/navigation/Carrieres";
import Contact from "@/components/navigation/Contact";
import Services from "@/components/navigation/Services";
import Stats from "@/components/Stats";
import Testimonials from "@/components/Testimonials";
import Topbar from "@/components/Topbar";
import Work from "@/components/Work";
import { useEffect, useState } from "react";

const Home = () => {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {

    const handleScroll = () => {
      setIsScrolled(window.scrollY > 50);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  // if (!data) return <div className="h-screen flex items-center justify-center">Chargement...</div>;

  return (
    <div className="min-h-screen">
      <Topbar isScrolled={isScrolled} />
      <Header isScrolled={isScrolled} />
      <Hero />
      <About />
      <Stats />
      <Services />
      <Work />
      <Testimonials />
      <Faq />
      <Carrieres />
      <Contact />
      <Footer />
    </div>
  );
};

export default Home;
