import React from "react";
import Pretitle from "../ui/Pretitle";

const teamMembers = [
  {
    name: "Oumar Dia",
    role: "Fondateur & Directeur pédagogique",
    bio: "Expert en éducation numérique, il conçoit les parcours et garantit la qualité pédagogique de DunaEdu.",
  },
  {
    name: "Aïcha Mint Ahmed",
    role: "Responsable des formations",
    bio: "Elle coordonne les formateurs et s'assure que chaque programme reste aligné avec le marché.",
  },
  {
    name: "Moussa Sow",
    role: "Lead technique",
    bio: "Il pilote la plateforme technique et veille aux performances et à la sécurité.",
  },
  {
    name: "Fatou Thiam",
    role: "Conseillère apprenants",
    bio: "Elle accompagne les apprenants tout au long de leur parcours et les aide à choisir la bonne formation.",
  },
];

const Equipe = () => {
  return (
    <section className="py-20 xl:py-32 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center max-w-3xl mx-auto mb-16">
          <Pretitle text="Notre équipe" center />
          <h2 className="h2 text-primary mt-4">Les personnes derrière DunaEdu</h2>
          <p className="mt-6 text-lg text-gray-600">
            Une équipe de passionnés d'éducation, de technologie et d'accompagnement des talents.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {teamMembers.map((member) => (
            <div
              key={member.name}
              className="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center shadow-custom"
            >
              <div className="w-16 h-16 mx-auto mb-4 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">
                {member.name
                  .split(" ")
                  .map((n) => n[0])
                  .join("")}
              </div>
              <h3 className="font-semibold text-lg text-primary mb-1">{member.name}</h3>
              <p className="text-sm text-secondary font-medium mb-3">{member.role}</p>
              <p className="text-sm text-gray-600">{member.bio}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Equipe;
