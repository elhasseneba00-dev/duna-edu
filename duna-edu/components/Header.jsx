"use client";

import React, { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { RiArrowRightUpLine, RiMenu3Fill, RiCloseLine } from "react-icons/ri";
import Link from "next/link";
import Logo from "./ui/Logo";
import Socials from "./ui/Socials";

const navItems = [
  {
    label: "Accueil",
    href: "/",
    children: [
      { label: "Vue d’ensemble", href: "/" },
      { label: "Témoignages", href: "/temoignages" },
    ],
  },
  {
    label: "À propos",
    href: "/a-propos",
    children: [
      { label: "L’entreprise", href: "/a-propos" },
      { label: "Culture & pédagogie", href: "/a-propos/culture" },
      { label: "Équipe", href: "/a-propos/equipe" },
    ],
  },
  {
    label: "Nos Services & Offres",
    href: "/services",
    children: [
      { label: "Catalogue", href: "/services" },
      { label: "Cours & formations", href: "/services/formations" },
      { label: "Workshops", href: "/services/workshops" },
      { label: "Ressources", href: "/services/ressources" },
      { label: "Accompagnement", href: "/services/accompagnement" },
    ],
  },
  {
    label: "Carrières",
    href: "/carrieres",
    children: [
      { label: "Offres d’emploi", href: "/carrieres" },
      { label: "Candidature spontanée", href: "/carrieres/candidature-spontanee" },
    ],
  },
  {
    label: "Contact",
    href: "/contact",
    children: [
      { label: "Contact général", href: "/contact" },
      { label: "Demander un devis", href: "/contact/devis" },
      { label: "Newsletter", href: "/contact/newsletter" },
    ],
  },
];

const Header = ({ isScrolled = false }) => {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [openDropdown, setOpenDropdown] = useState(null);

  return (
    <>
      {/* HEADER FIXE */}
      <motion.header
        animate={{
          top: isScrolled ? 0 : "4rem",
          backgroundColor: isScrolled ? "rgba(255,255,255,0.97)" : "rgba(0,114,177,0.98)",
          backdropFilter: isScrolled ? "blur(16px)" : "none",
          boxShadow: isScrolled ? "0 8px 32px rgba(0,0,0,0.12)" : "none",
        }}
        transition={{ duration: 0.5, ease: "easeOut" }}
        className="fixed left-0 right-0 z-50 h-20 lg:h-20 flex items-center"
      >
        <div className="container mx-auto px-4 flex items-center justify-between">
          {/* Logo */}
          <motion.div animate={{ scale: isScrolled ? 0.88 : 1 }} className="origin-left">
            <Logo color={isScrolled ? "#0072b1" : "#ffffff"} />
          </motion.div>

          {/* Desktop Nav */}
          <nav className="hidden lg:flex items-center gap-10">
            <ul className="flex items-center gap-8">
              {navItems.map((item) => (
                <li
                  key={item.label}
                  className="relative"
                  onMouseEnter={() => setOpenDropdown(item.label)}
                  onMouseLeave={() => setOpenDropdown(null)}
                >
                  <Link
                    href={item.href}
                    className={`font-medium tracking-wide transition-all ${
                      isScrolled ? "text-gray-800 hover:text-primary" : "text-white hover:text-secondary"
                    }`}
                  >
                    {item.label}
                  </Link>

                  {item.children && item.children.length > 0 && (
                    <AnimatePresence>
                      {openDropdown === item.label && (
                        <motion.ul
                          initial={{ opacity: 0, y: 10 }}
                          animate={{ opacity: 1, y: 0 }}
                          exit={{ opacity: 0, y: 10 }}
                          transition={{ duration: 0.15 }}
                          className="absolute left-0 mt-3 w-60 rounded-xl bg-white shadow-xl border border-gray-100 py-3 z-50"
                        >
                          {item.children.map((child) => (
                            <li key={child.href}>
                              <Link
                                href={child.href}
                                className="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary"
                              >
                                {child.label}
                              </Link>
                            </li>
                          ))}
                        </motion.ul>
                      )}
                    </AnimatePresence>
                  )}
                </li>
              ))}
            </ul>

            <motion.div whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}>
              <Link
                href="/contact/devis"
                className="group flex items-center gap-3 bg-secondary text-primary font-bold uppercase text-sm tracking-wider px-6 py-3 rounded-lg shadow-lg"
              >
                Demander un devis
                <RiArrowRightUpLine className="text-lg group-hover:rotate-45 transition-transform" />
              </Link>
            </motion.div>
          </nav>

          {/* Mobile Burger */}
          <button
            onClick={() => setMobileMenuOpen(true)}
            className={`lg:hidden text-3xl transition-colors ${isScrolled ? "text-primary" : "text-white"}`}
          >
            <RiMenu3Fill />
          </button>
        </div>
      </motion.header>

      {/* FULLSCREEN MOBILE MENU */}
      <AnimatePresence>
        {mobileMenuOpen && (
          <>
            {/* Overlay */}
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              onClick={() => setMobileMenuOpen(false)}
              className="fixed inset-0 bg-black/70 z-50 lg:hidden"
            />

            {/* Menu plein écran */}
            <motion.div
              initial={{ x: "100%" }}
              animate={{ x: 0 }}
              exit={{ x: "100%" }}
              transition={{ type: "tween", duration: 0.6, ease: "easeOut" }}
              className="fixed inset-0 bg-primary z-50 flex flex-col"
            >
              {/* Header mobile */}
              <div className="flex items-center justify-between p-6 border-b border-white/10">
                <Logo color="#ffffff" />
                <button
                  onClick={() => setMobileMenuOpen(false)}
                  className="text-4xl text-white hover:text-secondary transition"
                >
                  <RiCloseLine />
                </button>
              </div>

              {/* Liens */}
              <nav className="flex-1 flex flex-col items-center justify-center gap-10 px-8 overflow-y-auto">
                {navItems.map((item, i) => (
                  <motion.div
                    key={item.label}
                    initial={{ opacity: 0, y: 40 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: -40 }}
                    transition={{ delay: i * 0.1 + 0.2 }}
                    className="w-full max-w-xs"
                  >
                    <div className="mb-4">
                      <Link
                        href={item.href}
                        onClick={() => setMobileMenuOpen(false)}
                        className="block text-3xl md:text-4xl font-bold text-white hover:text-secondary transition-colors duration-300"
                      >
                        {item.label}
                      </Link>
                    </div>

                    {item.children && item.children.length > 0 && (
                      <ul className="space-y-2 pl-2 border-l border-white/10">
                        {item.children.map((child) => (
                          <li key={child.href}>
                            <Link
                              href={child.href}
                              onClick={() => setMobileMenuOpen(false)}
                              className="block text-base text-white/80 hover:text-secondary transition-colors duration-200"
                            >
                              {child.label}
                            </Link>
                          </li>
                        ))}
                      </ul>
                    )}
                  </motion.div>
                ))}

                {/* CTA Devis */}
                <motion.div
                  initial={{ opacity: 0, scale: 0.8 }}
                  animate={{ opacity: 1, scale: 1 }}
                  transition={{ delay: 0.7 }}
                  className="mt-16"
                >
                  <Link
                    href="/contact/devis"
                    onClick={() => setMobileMenuOpen(false)}
                    className="group flex items-center gap-5 bg-secondary text-primary font-black text-xl uppercase px-12 py-6 rounded-2xl shadow-2xl hover:shadow-yellow-400/50 transition-all duration-500 hover:scale-105"
                  >
                    Demander un devis
                    <RiArrowRightUpLine className="text-3xl group-hover:rotate-45 transition-transform duration-500" />
                  </Link>
                </motion.div>

                {/* Socials */}
                <motion.div
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 0.9 }}
                  className="mt-20"
                >
                  <Socials
                    containerStyles="flex gap-10"
                    iconStyles="text-5xl text-white hover:text-secondary transition-all duration-300"
                  />
                </motion.div>
              </nav>
            </motion.div>
          </>
        )}
      </AnimatePresence>
    </>
  );
};

export default Header;