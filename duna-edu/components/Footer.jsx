"use client";

import { motion } from "framer-motion";
import { useEffect, useMemo, useState } from "react";
import Logo from "./ui/Logo";
import Socials from "./ui/Socials";
import { RiPhoneFill, RiMailFill, RiMapPinFill, RiArrowRightUpLine } from "react-icons/ri";
import Link from "next/link";
import { getSite, postNewsletter } from "@/lib/api";

const quickLinks = [
  { name: "Accueil", href: "" },
  { name: "À propos", href: "a-propos" },
  { name: "Nos Services & Offres", href: "services" },
  { name: "Carrières", href: "carrieres" },
  { name: "Contact", href: "contact" },
];

const services = [
  "Cours & Formations",
  "Workshops & Bootcamps",
  "Ressources éducatives",
  "Accompagnement personnalisé",
  "Formations en entreprise",
];

export default function Footer() {
  const [site, setSite] = useState(null);

  useEffect(() => {
    let mounted = true;
    getSite("fr")
      .then((data) => {
        if (mounted) setSite(data);
      })
      .catch(() => {
        // ignore
      });
    return () => {
      mounted = false;
    };
  }, []);

  const contactInfo = useMemo(() => {
    const company = site?.company;
    const location = [company?.address?.city, company?.address?.country]
      .filter(Boolean)
      .join(", ");

    return {
      location: location || null,
      phone: company?.phone ?? site?.phones?.[0]?.number ?? null,
      email:
        company?.email ??
        site?.emails?.find((e) => e.type === "contact")?.email ??
        site?.emails?.[0]?.email ??
        null,
    };
  }, [site]);

  return (
    <footer className="bg-gradient-to-b from-gray-900 to-black text-white pt-20 pb-10">
      {/* Newsletter Section */}
      <div id="newsletter" className="bg-gradient-to-r from-primary to-primary/90 -mt-10 pt-16 pb-20">
        <div className="container mx-auto px-4 text-center">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            className="text-4xl md:text-5xl font-bold mb-6"
          >
            Restez informé des prochaines formations
          </motion.h2>
          <motion.p
            initial={{ opacity: 0 }}
            whileInView={{ opacity: 1 }}
            transition={{ delay: 0.2 }}
            className="text-xl mb-10 text-white/90"
          >
            Recevez en exclusivité nos nouveaux cours, workshops gratuits et bons plans éducation.
          </motion.p>

          <motion.form
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.4 }}
            onSubmit={async (e) => {
              e.preventDefault();
              const form = e.currentTarget;
              const emailInput = form.querySelector("input[type='email']");
              const email = emailInput?.value;
              if (!email) return;
              try {
                await postNewsletter(email, "fr");
                alert("Inscription newsletter réussie !");
                form.reset();
              } catch (err) {
                alert("Erreur lors de l’inscription à la newsletter.");
              }
            }}
            className="max-w-2xl mx-auto flex flex-col sm:flex-row gap-4"
          >
            <input
              type="email"
              placeholder="Votre adresse email"
              required
              className="flex-1 px-8 py-5 rounded-xl text-gray-900 text-lg focus:outline-none focus:ring-4 focus:ring-secondary/50"
            />
            <button
              type="submit"
              className="px-10 py-5 bg-secondary text-primary font-bold rounded-xl hover:bg-yellow-400 transition-all duration-300 flex items-center justify-center gap-3 shadow-xl hover:shadow-2xl group"
            >
              S’inscrire à la newsletter
              <RiArrowRightUpLine className="text-xl group-hover:rotate-45 transition-transform" />
            </button>
          </motion.form>
        </div>
      </div>

      {/* Main Footer */}
      <div className="container mx-auto px-4 mt-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Colonne 1 – Logo & Description */}
          <div className="lg:col-span-1">
            <Logo color="#ffffff" className="h-12 mb-6" />
            <p className="text-gray-300 leading-relaxed mb-6">
              DunaEdu centralise et rend accessible le savoir de qualité pour tous.
              <br />
              <strong className="text-secondary">L’éducation centralisée, accessible à tous.</strong>
            </p>
            <Socials
              containerStyles="flex gap-5"
              iconStyles="text-2xl hover:text-secondary transition-colors duration-300"
            />
          </div>

          {/* Colonne 2 – Navigation */}
          <div>
            <h3 className="text-xl font-bold mb-6 text-secondary">Navigation</h3>
            <ul className="space-y-4">
              {quickLinks.map((link, index) => (
                <li key={index}>
                  <Link href={link.href} target="_blank" rel="noopener noreferrer" className="text-gray-300 hover:text-white transition-colors duration-200">
                    {link.name} 
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Colonne 3 – Nos services */}
          <div>
            <h3 className="text-xl font-bold mb-6 text-secondary">Nos services</h3>
            <ul className="space-y-4">
              {services.map((service) => (
                <li key={service}>
                  <span className="text-gray-300 hover:text-white transition-colors duration-200 flex items-center gap-2">
                    <div className="w-1 h-1 bg-secondary rounded-full" />
                    {service}
                  </span>
                </li>
              ))}
            </ul>
          </div>

          {/* Colonne 4 – Contact & Infos légales */}
          <div>
            <h3 className="text-xl font-bold mb-6 text-secondary">Contact & Légale</h3>
            <div className="space-y-5 text-gray-300">
              <div className="flex items-start gap-3 mb-4">
                <RiMapPinFill className="text-secondary text-xl flex-shrink-0 mt-1" />
                <p>{contactInfo.location || "-"}<br />(100 % télétravail)</p>
              </div>
              <div className="flex items-center gap-3 mb-4">
                <RiPhoneFill className="text-secondary text-xl" />
                <p>{contactInfo.phone || "-"}</p>
              </div>
              <div className="flex items-center gap-3 mb-8">
                <RiMailFill className="text-secondary text-xl" />
                <p>{contactInfo.email || "-"}</p>
              </div>
            </div>
          </div>
        </div>

        {/* Bottom bar */}
        <div className="mt-16 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
          <p>
            © {new Date().getFullYear()} <span className="text-secondary font-bold">DunaEdu</span> • Tous droits réservés.
            <br className="md:hidden" /> Made with passion in Mauritania-Mali
          </p>
        </div>
      </div>
    </footer>
  );
}