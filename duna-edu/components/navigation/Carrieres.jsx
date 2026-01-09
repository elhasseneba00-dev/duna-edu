"use client";

import { motion } from "framer-motion";
import Pretitle from "../ui/Pretitle";
import Button from "../ui/Button";
import { RiBriefcase4Fill, RiMapPinFill, RiTimeFill } from "react-icons/ri";

const jobOffers = [
  {
    title: "Formateur Expert – Développement Web",
    type: "Temps plein",
    location: "100 % télétravail",
    desc: "Animez nos formations phares en React, Next.js et Node.js auprès de centaines d’apprenants.",
    featured: true,
  },
  {
    title: "Content Manager Éducation",
    type: "CDI",
    location: "DunaEdu Headquarters ou télétravail",
    desc: "Structurez et enrichissez nos programmes pédagogiques avec les meilleurs experts du marché.",
    featured: false,
  },
  {
    title: "Chargé(e) de Relation Apprenants",
    type: "CDI – Temps partiel possible",
    location: "Télétravail",
    desc: "Accompagnez nos élèves au quotidien et assurez leur réussite tout au long de leur parcours.",
    featured: false,
  },
];

const Carrieres = () => {
  return (
    <section id="Carrieres" className="py-20 xl:py-32 bg-white">
      <div className="container mx-auto px-4">
        {/* Titre */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          className="text-center max-w-3xl mx-auto mb-20"
        >
          <Pretitle text="Rejoignez l’aventure" center />
          <h2 className="h2 text-primary mt-4">Rejoignez DunaEdu et formez les talents de demain</h2>
          <p className="mt-6 text-lg text-gray-600">
            Nous recrutons des passionnés d’éducation qui partagent nos valeurs : accessibilité, qualité et innovation.
          </p>
        </motion.div>

        {/* Offres d’emploi */}
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
          {jobOffers.map((job, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ delay: i * 0.15 }}
              viewport={{ once: true }}
              className={`relative p-8 rounded-2xl border ${
                job.featured
                  ? "border-secondary bg-secondary/5 shadow-xl"
                  : "border-gray-200 bg-white shadow-custom"
              } hover:shadow-2xl transition-all duration-500 group`}
            >
              {job.featured && (
                <div className="absolute -top-4 left-1/2 -translate-x-1/2 bg-secondary text-primary px-6 py-2 rounded-full text-sm font-bold">
                  Offre en vedette
                </div>
              )}

              <h3 className="text-2xl font-bold text-primary mb-4">{job.title}</h3>

              <div className="space-y-3 mb-6 text-gray-600">
                <div className="flex items-center gap-3">
                  <RiBriefcase4Fill className="text-secondary" />
                  <span>{job.type}</span>
                </div>
                <div className="flex items-center gap-3">
                  <RiMapPinFill className="text-secondary" />
                  <span>{job.location}</span>
                </div>
              </div>

              <p className="text-gray-700 mb-8">{job.desc}</p>

              <Button text="Postuler" />
            </motion.div>
          ))}
        </div>

        {/* Candidature spontanée */}
        <motion.div
          id="candidature-spontanee"
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          viewport={{ once: true }}
          className="text-center bg-gradient-to-r from-primary to-primary/90 text-white rounded-3xl p-12 xl:p-20"
        >
          <h3 className="text-3xl xl:text-4xl font-bold mb-6">
            Vous ne trouvez pas votre bonheur ?
          </h3>
          <p className="text-xl mb-10 max-w-2xl mx-auto">
            Envoyez-nous votre candidature spontanée, nous sommes toujours à la recherche de talents passionnés.
          </p>
          <Button text="Candidature spontanée" />
        </motion.div>
      </div>
    </section>
  );
};

export default Carrieres;