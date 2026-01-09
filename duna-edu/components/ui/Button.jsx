// components/ui/Button.jsx
import { RiArrowRightUpLine } from "react-icons/ri";
import { motion } from "framer-motion";

const Button = ({ text, variant = "primary" }) => {
  return (
    <motion.button
      whileHover={{ scale: 1.05 }}
      whileTap={{ scale: 0.95 }}
      className={`
        group relative overflow-hidden rounded-xl px-8 py-4 font-bold uppercase tracking-wider
        flex items-center gap-4 transition-all duration-300
        ${variant === "primary"
          ? "bg-secondary text-primary"
          : "bg-primary text-white border-2 border-primary"
        }
      `}
    >
      <span className="relative z-10">{text}</span>
      <div className="w-12 h-12 rounded-lg flex items-center justify-center
                      bg-primary group-hover:bg-white transition-colors duration-300">
        <RiArrowRightUpLine className="text-xl text-white group-hover:text-primary transition-colors duration-300
          group-hover:rotate-45" />
      </div>

      {/* shine effect */}
      <div className="absolute inset-0 -translate-x-full bg-white/20 skew-x-12
                      group-hover:translate-x-full transition-transform duration-700" />
    </motion.button>
  );
};

export default Button;