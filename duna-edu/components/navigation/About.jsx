import { motion } from "framer-motion";
import Image from "next/image";
import Pretitle from "../ui/Pretitle";
import Button from "../ui/Button";
import { FiEye, FiTarget, FiHeart } from "react-icons/fi";

const translations = {
  fr: {
    pretitle: "À propos de DunaEdu",
    title: ["L'éducation centralisée,", "accessible à tous"],
    description: "DunaEdu regroupe les meilleures formations du marché dans une plateforme unique, moderne et intuitive. Notre mission : démocratiser l’accès à un savoir de qualité, certifié et adapté aux besoins réels des entreprises et des apprenants.",
    mission: "Notre mission",
    missionText: "Rendre l’éducation de pointe accessible à chaque individu, où qu’il soit.",
    vision: "Notre vision",
    visionText: "Un monde où le savoir circule librement et transforme des vies.",
    values: [
      { title: "Excellence", desc: "Contenus validés par des experts du secteur" },
      { title: "Accessibilité", desc: "Apprendre partout, tout le temps, pour tous" },
      { title: "Impact", desc: "Former les talents qui changent le monde" },
    ],
    cta: "Découvrir nos formations",
  },
  en: {
    pretitle: "About DunaEdu",
    title: ["Centralized education,", "accessible to all"],
    description: "DunaEdu brings together the best training on the market in a single, modern and intuitive platform. Our mission: democratize access to quality, certified knowledge tailored to the real needs of businesses and learners.",
    mission: "Our mission",
    missionText: "Make cutting-edge education accessible to everyone, everywhere.",
    vision: "Our vision",
    visionText: "A world where knowledge flows freely and transforms lives.",
    values: [
      { title: "Excellence", desc: "Content validated by industry experts" },
      { title: "Accessibility", desc: "Learn anywhere, anytime, for everyone" },
      { title: "Impact", desc: "Train talents who change the world" },
    ],
    cta: "Discover our courses",
  },
  ar: {
    pretitle: "عن دونا إدو",
    title: ["التعليم المركزي،", "متاح للجميع"],
    description: "تجمع دونا إدو أفضل الدورات التدريبية في السوق ضمن منصة واحدة حديثة وبديهية. مهمتنا: جعل التعليم الجيد متاحًا للجميع، معتمدًا ومصممًا حسب احتياجات الشركات والمتعلمين.",
    mission: "مهمتنا",
    missionText: "جعل التعليم المتطور في متناول كل فرد، أينما كان.",
    vision: "رؤيتنا",
    visionText: "عالم يتدفق فيه المعرفة بحرية وتغير حياة الناس.",
    values: [
      { title: "التميز", desc: "محتوى معتمد من خبراء القطاع" },
      { title: "الوصول", desc: "تعلم في أي مكان، في أي وقت، للجميع" },
      { title: "التأثير", desc: "تكوين المواهب التي تغير العالم" },
    ],
    cta: "اكتشف دوراتنا",
  },
};

const About = ({ lang = "fr" }) => {
  const t = translations[lang] || translations.fr;

  return (
    <section id="About" className="py-20 xl:py-32 overflow-hidden">
      <div className="container mx-auto px-6">
        <div className="grid xl:grid-cols-2 gap-16 xl:gap-24 items-center">
          <motion.div initial={{ opacity: 0, x: lang === "ar" ? 60 : -60 }} whileInView={{ opacity: 1, x: 0 }} viewport={{ once: true }} transition={{ duration: 0.8 }}>
            <Pretitle text={t.pretitle} center={false} />
            <h2 className="h1 mt-4 mb-8 leading-tight">
              {t.title[0]}<br />
              <span className="text-secondary">{t.title[1]}</span>.
            </h2>

            <p className="text-lg text-muted-foreground mb-10 leading-relaxed">{t.description}</p>

            <div className="grid md:grid-cols-2 gap-8 mb-12">
              <div>
                <h3 className="font-secondary text-2xl font-bold text-primary mb-3">{t.mission}</h3>
                <p className="text-muted-foreground">{t.missionText}</p>
              </div>
              <div>
                <h3 className="font-secondary text-2xl font-bold text-primary mb-3">{t.vision}</h3>
                <p className="text-muted-foreground">{t.visionText}</p>
              </div>
            </div>

            <div className="space-y-6">
              {t.values.map((value, i) => (
                <motion.div
                  key={i}
                  initial={{ opacity: 0, y: 20 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true }}
                  transition={{ delay: i * 0.15 }}
                  className="flex gap-5"
                >
                  <div className="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                    {i === 0 && <FiTarget className="w-7 h-7 text-primary" />}
                    {i === 1 && <FiEye className="w-7 h-7 text-primary" />}
                    {i === 2 && <FiHeart className="w-7 h-7 text-primary" />}
                  </div>
                  <div>
                    <h4 className="font-bold text-lg">{value.title}</h4>
                    <p className="text-muted-foreground">{value.desc}</p>
                  </div>
                </motion.div>
              ))}
            </div>

            <div className="mt-12">
              <Button text={t.cta} />
            </div>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, x: lang === "ar" ? -60 : 60 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.8 }}
            className="relative"
          >
            <div className="absolute -inset-4 bg-secondary/20 rounded-3xl -rotate-3 scale-105" />
            <div className="relative rounded-3xl overflow-hidden shadow-2xl">
              <Image src="/assets/learning_1.jpg" alt="DunaEdu team" width={600} height={700} className="object-cover w-full h-full" />
              <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent" />
            </div>
            <motion.div
              animate={{ y: [0, -10, 0] }}
              transition={{ repeat: Infinity, duration: 4 }}
              className="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-6 border border-border"
            >
              <p className="text-3xl font-bold text-primary">+12 000</p>
              <p className="text-sm">{lang === "fr" ? "apprenants formés" : lang === "en" ? "students trained" : "متعلم تم تكوينه"}</p>
            </motion.div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};

export default About;