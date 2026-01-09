'use client';

import { useEffect, useState } from "react";
import { motion } from "framer-motion";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import { postNewsletter } from "@/lib/api";

const NewsletterPage = () => {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const handleSubmit = async (e) => {
    e.preventDefault();
    const form = e.currentTarget;
    const emailInput = form.querySelector("input[type='email']");
    const email = emailInput?.value;
    if (!email) return;
    try {
      await postNewsletter(email, "fr");
      alert("Inscription newsletter réussie !");
      form.reset();
    } catch (err) {
      alert("Erreur lors de l’inscription à la newsletter.");
    }
  };

  return (
    <div className="min-h-screen">
      <Topbar isScrolled={isScrolled} />
      <Header isScrolled={isScrolled} />
      <main className="py-20 xl:py-32 bg-primary">
        <div className="container mx-auto px-4 text-center text-white max-w-3xl">
          <motion.h1
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            className="text-4xl md:text-5xl font-bold mb-6"
          >
            Rejoignez la newsletter DunaEdu
          </motion.h1>
          <motion.p initial={{ opacity: 0 }} animate={{ opacity: 1 }} transition={{ delay: 0.2 }} className="text-xl mb-10 text-white/90">
            Recevez en exclusivité nos nouvelles formations, workshops gratuits, ressources et offres pour
            entreprises.
          </motion.p>

          <motion.form
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.4 }}
            onSubmit={handleSubmit}
            className="max-w-2xl mx-auto flex flex-col sm:flex-row gap-4"
          >
            <input
              type="email"
              placeholder="Votre adresse email"
              required
              className="flex-1 px-8 py-5 rounded-xl text-gray-900 text-lg focus:outline-none focus:ring-4 focus:ring-secondary/50"
            />
            <button
              type="submit"
              className="px-10 py-5 bg-secondary text-primary font-bold rounded-xl hover:bg-yellow-400 transition-all duration-300 flex items-center justify-center gap-3 shadow-xl hover:shadow-2xl"
            >
              M'inscrire
            </button>
          </motion.form>
        </div>
      </main>
      {/* <Footer /> */}
    </div>
  );
};

export default NewsletterPage;
