'use client';
import Link from 'next/link';
import { useSession, signOut } from 'next-auth/react';
import { useRouter } from 'next/navigation';
import { useState } from 'react';

export default function Navbar() {
  const { data: session } = useSession();
  const router = useRouter();
  const [locale, setLocale] = useState('en');

  const handleLanguageChange = (lang) => {
    setLocale(lang);
    document.cookie = `locale=${lang}; path=/`;
    router.refresh();
  };

  return (
    <nav className="bg-blue-800 text-white p-4">
      <div className="container mx-auto flex justify-between items-center">
        <Link href="/" className="text-2xl font-bold">
          Sri Lankan Resort
        </Link>
        <div className="space-x-4">
          <Link href="/villas" className="hover:underline">
            Villas
          </Link>
          <Link href="/menu" className="hover:underline">
            Menu
          </Link>
          {session ? (
            <>
              <Link href="/bookings" className="hover:underline">
                My Bookings
              </Link>
              <button onClick={() => signOut()} className="hover:underline">
                Logout
              </button>
            </>
          ) : (
            <Link href="/login" className="hover:underline">
              Login
            </Link>
          )}
        </div>
        <div className="flex space-x-2">
          <button onClick={() => handleLanguageChange('en')} className={`px-2 ${locale === 'en' ? 'font-bold' : ''}`}>
            EN
          </button>
          <button onClick={() => handleLanguageChange('si')} className={`px-2 ${locale === 'si' ? 'font-bold' : ''}`}>
            SI
          </button>
          <button onClick={() => handleLanguageChange('ta')} className={`px-2 ${locale === 'ta' ? 'font-bold' : ''}`}>
            TA
          </button>
        </div>
      </div>
    </nav>
  );
}