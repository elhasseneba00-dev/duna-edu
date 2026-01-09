import React, { useState } from 'react'
import { Sheet, SheetContent, SheetDescription, SheetHeader, SheetTitle, SheetTrigger } from './ui/sheet';
import { RiMenu3Fill } from 'react-icons/ri';
import Logo from './ui/Logo';
import { Link as ScrollLink } from 'react-scroll';
import Socials from './ui/Socials';

const navigationLinks = [
  { name: 'Accueil', path: 'Home' },
  { name: 'À propos', path: 'About' },
  { name: 'Nos Services & Offres', path: 'Services' },
  { name: 'Carrières', path: 'Carrieres' },
  { name: 'Contact', path: 'Contact' },
];

const NavMobile = () => {

    const [isOpen, setIsOpen] = useState(false);
  return (
    <Sheet open={isOpen} onOpenChange={setIsOpen}>
        <SheetTrigger className='text-white flex items-center justify-center text-3xl' onClick={()=>setIsOpen(true)} >
            <RiMenu3Fill/>
        </SheetTrigger>
        <SheetContent className='bg-primary border-none text-white'>
            <div className='flex flex-col pt-16 items-center justify-between h-full'>
                <SheetHeader>
                    <SheetTitle>
                        <Logo/>
                    </SheetTitle>
                    <SheetDescription className='sr-only'>Navigation Menu</SheetDescription>
                </SheetHeader>
                <ul className='w-full flex flex-col gap-8 justify-center text-center'>
                    {navigationLinks.map((link, index) => {
                        return (
                            <li key={index} className='text-secondary uppercase font-primary font-medium tracking-[1.2px]'>
                                <ScrollLink to={link.path} smooth={true} spy={true} duration={500} className='cursor-pointer' activeClass='text-secondary' onClick={()=>setIsOpen(false)}>
                                    {link.name}
                                </ScrollLink>
                            </li>
                        );
                    }
                )}
                </ul>

                {/* social média */}
                <Socials containerStyles='text-secondary text-xl flex gap-6' iconStyles="text-2xl hover:text-blue-900" />
            </div>
        </SheetContent>
    </Sheet>
  )
}

export default NavMobile