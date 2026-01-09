"use client";

import { motion } from "framer-motion";
import { useEffect, useMemo, useState } from "react";
import { useForm } from "react-hook-form";
import Pretitle from "../ui/Pretitle";
import Button from "../ui/Button";
import { RiMailFill, RiPhoneFill, RiMapPinFill } from "react-icons/ri";
import { getSite, postContact } from "@/lib/api";

const Contact = () => {
  const { register, handleSubmit, reset, formState: { errors } } = useForm();
  const [site, setSite] = useState(null);

  useEffect(() => {
    let mounted = true;
    getSite("fr")
      .then((data) => {
        if (mounted) setSite(data);
      })
      .catch(() => {
        // keep UI functional even if API is unavailable
      });
    return () => {
      mounted = false;
    };
  }, []);

  const contactInfo = useMemo(() => {
    const company = site?.company;

    const phone = company?.phone ?? site?.phones?.[0]?.number ?? null;
    const email = company?.email ?? site?.emails?.find((e) => e.type === "contact")?.email ?? site?.emails?.[0]?.email ?? null;

    const city = company?.address?.city ?? null;
    const country = company?.address?.country ?? null;
    const address = [city, country].filter(Boolean).join(", ") || null;

    return { phone, email, address };
  }, [site]);

  const onSubmit = async (data) => {
    try {
      await postContact({
        prenom: data.firstname,
        nom: data.lastname,
        email: data.email,
        subject: data.subject,
        message: data.message,
      }, "fr");
      alert("Merci ! Nous revenons vers vous très rapidement");
      reset();
    } catch (err) {
      alert("Erreur lors de l’envoi du message. Veuillez réessayer.");
    }
  };

  return (
    <section id="Contact" className="py-20 xl:py-32 bg-gray-50">
      <div className="container mx-auto px-4">
        <motion.div
          id="devis"
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          className="text-center max-w-3xl mx-auto mb-20"
        >
          <Pretitle text="Contactez-nous" center />
          <h2 className="h2 text-primary mt-4">Une question ? Un projet ? Parlons-en !</h2>
          <p className="mt-6 text-lg text-gray-600">
            Que vous soyez apprenant, entreprise ou futur formateur, notre équipe vous répond sous 24h.
          </p>
        </motion.div>

        <div className="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
          {/* Formulaire */}
          <motion.form
            initial={{ opacity: 0, x: -50 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            onSubmit={handleSubmit(onSubmit)}
            className="bg-white rounded-2xl shadow-custom p-8 xl:p-12 space-y-8"
          >
            <div className="grid md:grid-cols-2 gap-6">
              <input
                {...register("firstname", { required: true })}
                placeholder="Prénom *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
              <input
                {...register("lastname", { required: true })}
                placeholder="Nom *"
                className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
              />
            </div>

            <input
              {...register("email", { required: true })}
              type="email"
              placeholder="Email *"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
            />

            <input
              {...register("subject")}
              placeholder="Sujet"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition"
            />

            <textarea
              {...register("message", { required: true })}
              rows={6}
              placeholder="Votre message *"
              className="w-full px-6 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-primary transition resize-none"
            />

            <Button text="Envoyer le message" />
          </motion.form>

          {/* Coordonnées & carte */}
          <motion.div
            initial={{ opacity: 0, x: 50 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            className="space-y-10"
          >
            <div className="bg-white rounded-2xl shadow-custom p-8">
              <h3 className="text-2xl font-bold text-primary mb-8">Nous contacter directement</h3>
              <div className="space-y-6">
                <div className="flex items-center gap-5">
                  <div className="w-14 h-14 bg-primary text-white rounded-full flex items-center justify-center text-2xl">
                    <RiPhoneFill />
                  </div>
                  <div>
                    <p className="font-semibold">Téléphone</p>
                    <p className="text-gray-600">{contactInfo.phone || "-"}</p>
                  </div>
                </div>

                <div className="flex items-center gap-5">
                  <div className="w-14 h-14 bg-primary text-white rounded-full flex items-center justify-center text-2xl">
                    <RiMailFill />
                  </div>
                  <div>
                    <p className="font-semibold">Email</p>
                    <p className="text-gray-600">{contactInfo.email || "-"}</p>
                  </div>
                </div>

                <div className="flex items-center gap-5">
                  <div className="w-14 h-14 bg-primary text-white rounded-full flex items-center justify-center text-2xl">
                    <RiMapPinFill />
                  </div>
                  <div>
                    <p className="font-semibold">Adresse</p>
                    <p className="text-gray-600">{contactInfo.address || "-"}<br />(100 % télétravail possible)</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Petite carte ou illustration */}
            <div className="bg-gradient-to-br from-primary to-secondary rounded-2xl h-64 flex items-center justify-center text-white text-center p-8">
              <p className="text-2xl font-bold">
                On vous attend avec impatience !
              </p>
            </div>
          </motion.div>
        </div>
      </div>

      
    </section>
  );
};

export default Contact;