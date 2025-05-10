import './globals.css';
import { Inter } from 'next/font/google';
import { SessionProvider } from 'next-auth/react';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';
import Navbar from '../components/Navbar';

const inter = Inter({ subsets: ['latin'] });
const queryClient = new QueryClient();

export const metadata = {
  title: 'Sri Lankan Resort Villa & Restaurant',
  description: 'Book luxury villas and enjoy authentic Sri Lankan cuisine at our resort.',
};

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <body className={inter.className}>
        <SessionProvider>
          <QueryClientProvider client={queryClient}>
            <Navbar />
            {children}
          </QueryClientProvider>
        </SessionProvider>
      </body>
    </html>
  );
}