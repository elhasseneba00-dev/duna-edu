'use client';

import { useEffect, useState } from "react";
import { useForm } from "react-hook-form";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Pretitle from "@/components/ui/Pretitle";
import Button from "@/components/ui/Button";
import { postCandidature } from "@/lib/api";

const CandidatureSpontaneePage = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const { register, handleSubmit, reset } = useForm();

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const onSubmit = async (data) => {
    try {
      await postCandidature({
        firstname: data.firstname,
        lastname: data.lastname,
        email: data.email,
        phone: data.phone,
        role: data.role,
        message: data.message,
      }, "fr");
      alert("Merci pour votre candidature ! Nous vous recontacterons si un poste correspond.");
      reset();
    } catch (err) {
      alert("Erreur lors de l’envoi de la candidature.");
    }
  };

  return (
    <div className="min-h-screen">
      <Topbar isScrolled={isScrolled} />
      <Header isScrolled={isScrolled} />
      <main className="py-20 xl:py-32 bg-gray-50">
        <div className="container mx-auto px-4 max-w-4xl">
          <div className="text-center mb-12">
            <Pretitle text="Candidature spontanée" center />
            <h1 className="h2 text-primary mt-4">Envoyez-nous votre profil</h1>
            <p className="mt-6 text-lg text-gray-600">
              Vous ne trouvez pas d'offre qui vous correspond ? Proposez-nous votre profil, nous gardons chaque
              candidature pour nos besoins futurs.
            </p>
          </div>

          <form
            onSubmit={handleSubmit(onSubmit)}
            className="bg-white rounded-2xl shadow-custom p-8 xl:p-12 space-y-6"
          >
            <div className="grid md:grid-cols-2 gap-6">
              <input
                {...register("firstname", { required: true })}
                placeholder="Préanom *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
              <input
                {...register("lastname", { required: true })}
                placeholder="Nom *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
            </div>

            <div className="grid md:grid-cols-2 gap-6">
              <input
                {...register("email", { required: true })}
                type="email"
                placeholder="Email *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
              <input
                {...register("phone")}
                placeholder="Télephone"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
            </div>

            <input
              {...register("role")}
              placeholder="Poste recherchée (ex : Formateur web, Support apprenants...)"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
            />

            <textarea
              {...register("message", { required: true })}
              rows={6}
              placeholder="Parlez-nous de vous, de vos expériences et de ce que vous cherchez chez DunaEdu *"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition resize-none"
            />

            <Button text="Envoyer la candidature" />
          </form>
        </div>
      </main>
      <Footer />
    </div>
  );
};

export default CandidatureSpontaneePage;
