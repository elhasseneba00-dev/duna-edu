import React from "react";
import Pretitle from "./ui/Pretitle";

const testimonials = [
  {
    name: "Aïcha, développeuse web",
    role: "Ancienne apprenante DunaEdu",
    formation: "Parcours Développeur Frontend",
    text:
      "Grâce aux formations DunaEdu, j'ai pu passer de débutante à développeuse frontend en poste en moins d'un an.",
  },
  {
    name: "Moussa, responsable RH",
    role: "Partenaire entreprise",
    formation: "Formations sur mesure pour entreprises",
    text:
      "Nous faisons monter en compétences nos équipes avec des programmes 100 % adaptés à nos besoins métier.",
  },
  {
    name: "Fatou, étudiante",
    role: "Apprenante",
    formation: "Workshops Data & IA",
    text:
      "Les workshops pratiques m'ont permis de comprendre concrètement les métiers de la data et de l'intelligence artificielle.",
  },
];

const Testimonials = () => {
  return (
    <section id="Testimonials" className="py-20 xl:py-32 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center max-w-3xl mx-auto mb-16">
          <Pretitle text="Témoignages" center />
          <h2 className="h2 text-primary mt-4">Ils nous font confiance</h2>
          <p className="mt-6 text-lg text-gray-600">
            Étudiants, professionnels et entreprises parlent de leur expérience avec DunaEdu.
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-8">
          {testimonials.map((t, index) => (
            <div
              key={index}
              className="flex flex-col h-full bg-gray-50 border border-gray-200 rounded-2xl p-8 shadow-custom"
            >
              <p className="text-gray-700 mb-6 flex-1">“{t.text}”</p>
              <div>
                <p className="font-semibold text-primary">{t.name}</p>
                <p className="text-sm text-gray-500">{t.role}</p>
                <p className="text-sm text-secondary mt-2">{t.formation}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Testimonials;
