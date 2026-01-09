"use client";

import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { FaGraduationCap, FaTools, FaQuestionCircle } from "react-icons/fa";
import { MdMenuBook } from "react-icons/md";
import Image from "next/image";
import Pretitle from "../ui/Pretitle";
import Button from "../ui/Button";

const services = [
  {
    name: "Cours & Formations",
    icon: <FaGraduationCap className="text-4xl" />,
    description: "Formations complètes et certifiantes dans tous les domaines porteurs.",
    highlights: ["Développement web & mobile", "Data Science & IA", "Marketing digital", "Cybersécurité", "Management & soft skills"],
    images: ["/assets/services/web_dev.jpg", "/assets/services/market_digit.jpg"],
  },
  {
    name: "Workshops",
    icon: <FaTools className="text-4xl" />,
    description: "Ateliers pratiques gratuits ou premium pour monter rapidement en compétences.",
    highlights: ["Bootcamps intensifs", "Ateliers live avec experts", "Projets réels", "Certificat de participation"],
    images: ["/assets/services/workshop_2.jpg", "/assets/services/workshop_1.jpg"],
  },
  {
    name: "Ressources éducatives",
    icon: <MdMenuBook className="text-4xl" />,
    description: "Bibliothèque complète de supports pédagogiques à disposition.",
    highlights: ["E-books & guides PDF", "Vidéos enregistrées", "Templates & outils", "Quiz interactifs"],
    images: ["/assets/services/e_book_1.jpg", "/assets/services/video_cours.jpg"],
  },
  {
    name: "Accompagnement",
    icon: <FaQuestionCircle className="text-4xl" />,
    description: "Un suivi personnalisé pour garantir votre réussite.",
    highlights: ["Coaching individuel", "Mentorat par des pros", "Correction de projets", "Préparation entretien"],
    images: ["/assets/services/assistant_scolaire.jpg", "/assets/services/assistant_scolaire_2.jpg"],
  },
];

const Services = () => {
  const [activeTab, setActiveTab] = useState(services[0].name);

  return (
    <section id="Services" className="py-20 xl:py-32 bg-gray-50">
      <div className="container mx-auto px-4">
        {/* Titre */}
        <div className="text-center max-w-3xl mx-auto mb-20">
          <Pretitle text="Nos Services & Offres" center />
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="h2 text-primary mt-4"
          >
            Une offre complète pour tous les apprenants
          </motion.h2>
          <motion.p
            initial={{ opacity: 0 }}
            whileInView={{ opacity: 1 }}
            transition={{ delay: 0.2 }}
            viewport={{ once: true }}
            className="mt-6 text-lg text-gray-600"
          >
            Du cours en ligne à l’accompagnement personnalisé, DunaEdu centralise tout le savoir dont vous avez besoin.
          </motion.p>
        </div>

        <div className="grid lg:grid-cols-3 gap-12 items-start">
          {/* Onglets verticaux */}
          <div className="space-y-4">
            {services.map((service) => (
              <motion.button
                key={service.name}
                onClick={() => setActiveTab(service.name)}
                whileHover={{ x: 8 }}
                className={`w-full flex items-center gap-6 p-6 rounded-xl text-left transition-all duration-300 shadow-custom ${
                  activeTab === service.name
                    ? "bg-primary text-white"
                    : "bg-white text-primary hover:bg-primary/5"
                }`}
              >
                <div className={activeTab === service.name ? "text-secondary" : "text-primary"}>
                  {service.icon}
                </div>
                <span className="font-semibold text-lg">{service.name}</span>
              </motion.button>
            ))}
          </div>

          {/* Contenu actif */}
          <AnimatePresence mode="wait">
            {services.map(
              (service) =>
                activeTab === service.name && (
                  <motion.div
                    key={service.name}
                    initial={{ opacity: 0, x: 50 }}
                    animate={{ opacity: 1, x: 0 }}
                    exit={{ opacity: 0, x: -50 }}
                    transition={{ duration: 0.3 }}
                    className="lg:col-span-2 bg-white rounded-2xl shadow-custom overflow-hidden"
                  >
                    <div className="grid md:grid-cols-2">
                      {/* Images */}
                      <div className="flex flex-col gap-6 p-8">
                        {service.images.map((img, i) => (
                          <div key={i} className="relative aspect-video rounded-xl overflow-hidden">
                            <Image
                              src={img}
                              alt={service.name}
                              fill
                              className="object-cover hover:scale-110 transition-transform duration-700"
                            />
                          </div>
                        ))}
                      </div>

                      {/* Texte */}
                      <div className="p-8 xl:p-12 flex flex-col justify-center">
                        <h3 className="text-3xl font-bold text-primary mb-6">{service.name}</h3>
                        <p className="text-gray-600 text-lg mb-8 leading-relaxed">{service.description}</p>

                        <ul className="space-y-4 mb-10">
                          {service.highlights.map((item, i) => (
                            <motion.li
                              key={i}
                              initial={{ opacity: 0, x: -20 }}
                              animate={{ opacity: 1, x: 0 }}
                              transition={{ delay: i * 0.1 }}
                              className="flex items-center gap-4"
                            >
                              <div className="w-2 h-2 bg-secondary rounded-full flex-shrink-0" />
                              <span className="text-gray-700 font-medium">{item}</span>
                            </motion.li>
                          ))}
                        </ul>

                        <Button text="Découvrir l’offre" />
                      </div>
                    </div>
                  </motion.div>
                )
            )}
          </AnimatePresence>
        </div>
      </div>
    </section>
  );
};

export default Services;