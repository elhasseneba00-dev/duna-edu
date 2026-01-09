import React from "react";
import Pretitle from "./ui/Pretitle";

const faqs = [
  {
    question: "Comment se déroulent les formations DunaEdu ?",
    answer:
      "Les formations sont 100 % en ligne, composées de vidéos, d'exercices pratiques et de sessions live avec nos formateurs.",
  },
  {
    question: "Les formations sont-elles certifiantes ?",
    answer:
      "Oui, à la fin de chaque parcours, vous obtenez une attestation ou un certificat DunaEdu validant vos acquis.",
  },
  {
    question: "Puis-je suivre les cours en parallèle de mon travail ou de mes études ?",
    answer:
      "Les parcours sont pensés pour être suivis à votre rythme, avec un accès flexible 24h/24 et 7j/7.",
  },
  {
    question: "Proposez-vous des formations pour les entreprises ?",
    answer:
      "Oui, nous construisons des programmes sur mesure pour les équipes et les besoins de chaque entreprise.",
  },
];

const Faq = () => {
  return (
    <section id="FAQ" className="py-20 xl:py-32 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="text-center max-w-3xl mx-auto mb-16">
          <Pretitle text="Questions fréquentes" center />
          <h2 className="h2 text-primary mt-4">Tout ce que vous devez savoir</h2>
          <p className="mt-6 text-lg text-gray-600">
            Une sélection de réponses aux questions les plus courantes sur nos formations et nos services.
          </p>
        </div>

        <div className="max-w-3xl mx-auto space-y-4">
          {faqs.map((item, index) => (
            <details key={index} className="group bg-white border border-gray-200 rounded-2xl p-5 open:shadow-custom">
              <summary className="flex cursor-pointer items-center justify-between gap-4 text-left">
                <span className="font-semibold text-primary">{item.question}</span>
                <span className="text-secondary text-2xl leading-none transition-transform duration-200 group-open:rotate-45">+</span>
              </summary>
              <p className="mt-4 text-gray-600">{item.answer}</p>
            </details>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Faq;


