"use client";

import React, { useRef } from "react";
import { motion, useInView } from "framer-motion";
import CountUp from "react-countup";

const statsData = [
  { value: 12000, sign: "+", label: "Apprenants formés" },
  { value: 8, sign: "", label: "Années d’expérience" },
  { value: 650, sign: "+", label: "Cours & formations" },
  { value: 98, sign: "%", label: "Satisfaction client" },
];

const Stats = () => {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-100px" });

  const containerVariants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: { staggerChildren: 0.2},
    }
  };

  const itemVariants = {
    hidden: { opacity: 0, y: 30 },
    visible: { opacity: 1, y: 0, transition: { duration: 0.8, ease: "easeOut" } },
  };

  return (
    <section ref={ref} className="py-20 xl:py-32 bg-gradient-to-br from-primary to-primary/90">
      <div className="container mx-auto">
        <motion.div
          variants={containerVariants}
          initial="hidden"
          animate={inView ? "visible" : "hidden"}
          className="grid grid-cols-2 lg:grid-cols-4 gap-12 xl:gap-20 text-center"
        >
          {statsData.map((stat, i) => (
            <motion.div key={i} variants={itemVariants} className="flex flex-col items-center">
              <div className="text-5xl xl:text-6xl font-bold text-secondary mb-3">
                {inView && (
                  <>
                    <CountUp start={0} end={stat.value} duration={3.5} formattingFn={(v) => v.toLocaleString("fr-FR")} />
                    <span className="text-4xl">{stat.sign}</span>
                  </>
                )}
              </div>
              <p className="text-white/90 text-lg font-medium tracking-wide">{stat.label}</p>
            </motion.div>
          ))}
        </motion.div>
      </div>
    </section>
  );
};

export default Stats;