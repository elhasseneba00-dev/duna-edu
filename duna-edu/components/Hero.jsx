"use client";

import { motion } from "framer-motion";
import CountUp from "react-countup";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { MdMenuBook } from "react-icons/md";
import {
  FaGraduationCap,
  FaTools,
  FaQuestionCircle,
  FaUsers,
  FaBookOpen,
  FaClock,
  FaStar,
} from "react-icons/fa";
import Button from "./ui/Button";

const quickServices = [
  { icon: <FaGraduationCap />, title: "Cours & Formations", desc: "Certifiants & professionnalisants" },
  { icon: <FaTools />, title: "Workshops", desc: "Pratique & intensifs" },
  { icon: <MdMenuBook />, title: "Ressources", desc: "E-books, vidéos, templates" },
  { icon: <FaQuestionCircle />, title: "Accompagnement", desc: "Mentorat personnalisé" },
];

const stats = [
  { value: 12000, sign: "+", label: "Apprenants" },
  { value: 650, sign: "+", label: "Cours disponibles" },
  { value: 8, sign: "", label: "Ans d’expérience" },
  { value: 98, sign: "%", label: "Satisfaits" },
];

export const Hero = () => {
  const statsRef = useRef(null);
  const statsInView = useInView(statsRef, { once: true, margin: "-100px" });

  return (
    <section id="Home" className="relative min-h-screen flex flex-col justify-center bg-gradient-to-br from-primary via-primary to-primary/90 overflow-hidden">
      {/* Fond décoratif subtil */}
      <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent" />
      <div className="absolute inset-0 bg-[url('/assets/learning_hero_1.jpg')] bg-cover bg-center bg-no-repeat opacity-20" />

      <div className="container mx-auto px-4 relative z-10 py-24 xl:py-32">
        <div className="grid lg:grid-cols-2 gap-12 xl:gap-20 items-center">
          {/* Texte + CTA */}
          <motion.div
            initial={{ opacity: 0, y: 40 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8 }}
            className="text-center lg:text-left"
          >
            <motion.p
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.3 }}
              className="text-secondary font-semibold tracking-wider uppercase mb-4"
            >
              L’éducation centralisée, accessible à tous
            </motion.p>

            <motion.h1
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.4, duration: 0.8 }}
              className="text-5xl xl:text-6xl font-bold text-white leading-tight mb-6"
            >
              Le savoir de qualité,
              <br />
              <span className="text-secondary">à portée de tous</span>
            </motion.h1>

            <motion.p
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.6 }}
              className="text-xl text-white/90 mb-10 max-w-2xl"
            >
              Formations professionnelles, workshops, ressources et accompagnement – tout au même endroit, pour tous les niveaux.
            </motion.p>

            <motion.div
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.8 }}
              className="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start"
            >
              <Button text="Découvrir les formations" />
              <button className="px-10 py-4 bg-white/10 backdrop-blur-sm text-white border-2 border-white/30 rounded-xl font-bold hover:bg-white hover:text-primary transition-all duration-300">
                Demander un devis entreprise
              </button>
            </motion.div>
          </motion.div>

          {/* Aperçu rapide des services */}
          <motion.div
            initial={{ opacity: 0, x: 50 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ delay: 0.5, duration: 0.8 }}
            className="grid grid-cols-2 gap-6"
          >
            {quickServices.map((service, i) => (
              <motion.div
                key={i}
                whileHover={{ y: -10, scale: 1.03 }}
                transition={{ type: "spring", stiffness: 300 }}
                className="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 text-center hover:bg-white/20 transition-all duration-300"
              >
                <div className="text-secondary text-4xl mb-4">{service.icon}</div>
                <h3 className="font-bold text-white text-lg mb-2">{service.title}</h3>
                <p className="text-white/80 text-sm">{service.desc}</p>
              </motion.div>
            ))}
          </motion.div>
        </div>

        {/* Chiffres clés – Preuve sociale directe */}
        <motion.div
          ref={statsRef}
          initial={{ opacity: 0, y: 50 }}
          animate={statsInView ? { opacity: 1, y: 0 } : {}}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="mt-24 grid grid-cols-2 lg:grid-cols-4 gap-8 bg-white/10 backdrop-blur-lg rounded-3xl p-10 border border-white/20"
        >
          {stats.map((stat, i) => (
            <div key={i} className="text-center">
              <div className="text-4xl xl:text-5xl font-bold text-secondary">
                {statsInView && (
                  <CountUp
                    start={0}
                    end={stat.value}
                    duration={3}
                    formattingFn={(v) => v.toLocaleString("fr-FR")}
                  />
                )}
                <span className="text-3xl text-white">{stat.sign}</span>
              </div>
              <p className="text-white/90 text-lg mt-3 font-medium">{stat.label}</p>
            </div>
          ))}
        </motion.div>
      </div>

      {/* Scroll indicator */}
      <motion.div
        animate={{ y: [0, 10, 0] }}
        transition={{ repeat: Infinity, duration: 1.5 }}
        className="absolute bottom-8 left-1/2 -translate-x-1/2 text-white"
      >
        <div className="w-6 h-10 border-2 border-white rounded-full flex justify-center">
          <div className="w-1 h-3 bg-white rounded-full mt-2" />
        </div>
      </motion.div>
    </section>
  );
};

export default Hero;