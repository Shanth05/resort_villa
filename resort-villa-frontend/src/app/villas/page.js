import Link from 'next/link';

export default function Home() {
  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-cover bg-center" style={{ backgroundImage: "url('/resort-bg.jpg')" }}>
      <h1 className="text-5xl font-bold text-white mb-4">Welcome to Our Sri Lankan Resort</h1>
      <p className="text-xl text-white mb-8">Experience luxury villas and authentic cuisine</p>
      <div className="space-x-4">
        <Link href="/villas" className="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
          View Villas
        </Link>
        <Link href="/menu" className="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
          Restaurant Menu
        </Link>
      </div>
    </div>
  );
}