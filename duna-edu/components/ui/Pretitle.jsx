// components/ui/Pretitle.jsx
const Pretitle = ({ text, center = false }) => {
  return (
    <div className={`flex items-center gap-4 ${center ? "justify-center" : ""}`}>
      <div className="h-px w-12 bg-secondary/50" />
      <p className="font-medium text-sm uppercase tracking-[4px] text-secondary">
        {text}
      </p>
      <div className="h-px w-12 bg-secondary/50" />
    </div>
  );
};

export default Pretitle;