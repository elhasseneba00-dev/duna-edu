import React from "react";
import Pretitle from "./ui/Pretitle";

const steps = [
  {
    title: "Choisissez votre parcours",
    description:
      "Sélectionnez la formation ou le workshop qui correspond à vos objectifs professionnels.",
  },
  {
    title: "Inscrivez-vous en ligne",
    description:
      "Complétez votre profil et validez votre inscription en quelques minutes seulement.",
  },
  {
    title: "Suivez vos modules",
    description:
      "Accédez aux vidéos, exercices, ressources et sessions live depuis votre espace d’apprentissage.",
  },
  {
    title: "Validez & progressez",
    description:
      "Obtenez votre certificat, enrichissez votre CV et continuez à monter en compétences.",
  },
];

const Work = () => {
  return (
    <section id="Parcours" className="py-20 xl:py-32 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center max-w-3xl mx-auto mb-16">
          <Pretitle text="Votre parcours chez DunaEdu" center />
          <h2 className="h2 text-primary mt-4">Un parcours simple en 4 étapes</h2>
          <p className="mt-6 text-lg text-gray-600">
            De votre première visite sur le site jusqu'à l’obtention de votre certificat, nous vous accompagnons à chaque étape.
          </p>
        </div>

        <div className="grid md:grid-cols-4 gap-8">
          {steps.map((step, index) => (
            <div
              key={index}
              className="relative bg-gray-50 border border-gray-200 rounded-2xl p-6 text-left shadow-custom"
            >
              <div className="w-10 h-10 mb-4 flex items-center justify-center rounded-full bg-secondary text-primary font-bold">
                {index + 1}
              </div>
              <h3 className="font-semibold text-lg mb-2 text-primary">{step.title}</h3>
              <p className="text-gray-600 text-sm">{step.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Work;
