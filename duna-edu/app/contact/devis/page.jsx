'use client';

import { useEffect, useState } from "react";
import { useForm } from "react-hook-form";
import Topbar from "@/components/Topbar";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import Pretitle from "@/components/ui/Pretitle";
import Button from "@/components/ui/Button";
import { postDevis } from "@/lib/api";

const DevisPage = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const { register, handleSubmit, reset } = useForm();

  useEffect(() => {
    const handleScroll = () => setIsScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const onSubmit = async (data) => {
    try {
      await postDevis({
        company: data.company,
        contact_name: data.contact,
        email: data.email,
        telephone: data.phone,
        projectType: data.projectType,
        budget: data.budget,
        message: data.message,
      }, "fr");
      alert("Merci ! Nous vous enverrons un devis personnalisé sous peu.");
      reset();
    } catch (err) {
      alert("Erreur lors de l’envoi de la demande de devis.");
    }
  };

  return (
    <div className="min-h-screen">
      <Topbar isScrolled={isScrolled} />
      <Header isScrolled={isScrolled} />
      <main className="py-20 xl:py-32 bg-gray-50">
        <div className="container mx-auto px-4 max-w-4xl">
          <div className="text-center mb-12">
            <Pretitle text="Demander un devis" center />
            <h1 className="h2 text-primary mt-4">Formations & accompagnement sur mesure</h1>
            <p className="mt-6 text-lg text-gray-600">
              Détaillez votre besoin, votre contexte et votre budget, nous construisons une proposition adaptée.
            </p>
          </div>

          <form
            onSubmit={handleSubmit(onSubmit)}
            className="bg-white rounded-2xl shadow-custom p-8 xl:p-12 space-y-6"
          >
            <div className="grid md:grid-cols-2 gap-6">
              <input
                {...register("company", { required: true })}
                placeholder="Organisation / Entreprise *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
              <input
                {...register("contact", { required: true })}
                placeholder="Nom du contact *"
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

            <select
              {...register("projectType")}
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition bg-white"
              defaultValue="formation-individuelle"
            >
              <option value="formation-individuelle">Formation individuelle</option>
              <option value="formation-equipe">Formation pour une équipe</option>
              <option value="workshop">Workshop / Bootcamp</option>
              <option value="accompagnement">Accompagnement & coaching</option>
            </select>

            <input
              {...register("budget")}
              placeholder="Budget approximatif (optionnel)"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
            />

            <textarea
              {...register("message", { required: true })}
              rows={6}
              placeholder="Précisez votre besoin, le nombre de personnes, les thèames, les délais... *"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition resize-none"
            />

            <Button text="Envoyer la demande de devis" />
          </form>
        </div>
      </main>
      <Footer />
    </div>
  );
};

export default DevisPage;
