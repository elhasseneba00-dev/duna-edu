import Link from 'next/link';
import React from 'react'
import { RiFacebookFill, RiInstagramFill, RiTwitterFill, RiYoutubeFill } from 'react-icons/ri'

const socials = [
  { icon: <RiFacebookFill />, link: 'https://facebook.com' },
  { icon: <RiYoutubeFill />, link: 'https://youtube.com' },
  { icon: <RiInstagramFill />, link: 'https://instagram.com' },
  { icon: <RiTwitterFill />, link: 'https://twitter.com' },
];
const Socials = ({containerStyles, iconStyles}) => {
  return (
    <div className={`${containerStyles}`}>
      {socials.map((social, index) => (
        <Link key={index} href={social.link} target="_blank" rel="noopener noreferrer" className={`${iconStyles}`}>
          {social.icon}
        </Link>
      ))}
    </div>
  );
}

export default Socials