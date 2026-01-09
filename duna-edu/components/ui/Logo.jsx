import Image from 'next/image'
import Link from 'next/link'
import React from 'react'

const Logo = () => {
  return (
    <Link href="">
        <Image src='/assets/logo-dunaedu.jpg' width={82} height={10}  alt=''/>
    </Link>
  )
}

export default Logo