"use client";

import { motion } from "framer-motion";
import { useEffect, useMemo, useState } from "react";
import { RiPhoneFill, RiMailFill, RiMapPinFill } from "react-icons/ri";
import Socials from "./ui/Socials";
import { getSite } from "@/lib/api";

const Topbar = ({ isScrolled }) => {
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
    <motion.div
      animate={{
        y: isScrolled ? -100 : 0,
        opacity: isScrolled ? 0 : 1}}
      transition={{ duration: 0.4, ease: "easeInOut" }}
      className="bg-gradient-to-r from-secondary via-[#ffca3b] to-secondary text-primary py-3 md:py-4 overflow-hidden"
    >
      <div className="container mx-auto px-4">
        <div className="flex flex-col lg:flex-row justify-between items-center gap-4 text-sm">
          <div className="flex flex-col lg:flex-row items-center gap-4 lg:gap-8 text-center lg:text-left">
            <div className="font-bold text-base tracking-wider">
              DunaEdu — L’éducation centralisée, accessible à tous
            </div>
            <div className="hidden md:flex items-center gap-6">
              <div className="flex items-center gap-2">
                <RiMapPinFill className="text-lg" />
                <span>{contactInfo.location || "-"}</span>
              </div>
              <div className="flex items-center gap-2">
                <RiPhoneFill className="text-lg" />
                <span>{contactInfo.phone || "-"}</span>
              </div>
              <div className="flex items-center gap-2">
                <RiMailFill className="text-lg" />
                <span>{contactInfo.email || "-"}</span>
              </div>
            </div>
          </div>

          <Socials
            containerStyles="flex gap-5"
            iconStyles="text-xl hover:scale-125 hover:text-white transition-all duration-300"
          />
        </div>

        {/* Mobile contacts */}
        <div className="md:hidden flex justify-center gap-6 text-sm mt-2 ">
          <span className="flex items-center gap-2">
            <RiPhoneFill /> {contactInfo.phone || "-"}
          </span>
          <span className="flex items-center gap-2">
            <RiMailFill /> {contactInfo.email || "-"}
          </span>
        </div>
      </div>
    </motion.div>
  );
};

export default Topbar;