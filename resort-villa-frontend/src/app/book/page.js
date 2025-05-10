'use client';
import { useState } from 'react';
import { useMutation, useQuery } from '@tanstack/react-query';
import axios from 'axios';
import { useSession } from 'next-auth/react';
import { useRouter } from 'next/navigation';

const fetchVilla = async (id) => {
  const response = await axios.get(`/api/villas/${id}`);
  return response.data;
};

export default function BookVilla({ params }) {
  const { id } = params;
  const { data: session } = useSession();
  const router = useRouter();
  const [checkIn, setCheckIn] = useState('');
  const [checkOut, setCheckOut] = useState('');

  const { data: villa, isLoading } = useQuery({
    queryKey: ['villa', id],
    queryFn: () => fetchVilla(id),
  });

  const mutation = useMutation({
    mutationFn: (booking) => axios.post('/api/bookings', booking, {
      headers: { Authorization: `Bearer ${session?.accessToken}` },
    }),
    onSuccess: () => {
      alert('Booking successful!');
      router.push('/bookings');
    },
    onError: (error) => {
      alert('Booking failed: ' + error.response.data.message);
    },
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    if (!session) {
      router.push('/login');
      return;
    }
    mutation.mutate({ villa_id: id, check_in: checkIn, check_out: checkOut });
  };

  if (isLoading) return <div>Loading...</div>;

  return (
    <div className="container mx-auto py-12">
      <h1 className="text-4xl font-bold mb-8">Book {villa?.name}</h1>
      <form onSubmit={handleSubmit} className="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div className="mb-4">
          <label className="block text-gray-700">Check-In</label>
          <input
            type="date"
            value={checkIn}
            onChange={(e) => setCheckIn(e.target.value)}
            className="w-full p-2 border rounded"
            required
          />
        </div>
        <div className="mb-4">
          <label className="block text-gray-700">Check-Out</label>
          <input
            type="date"
            value={checkOut}
            onChange={(e) => setCheckOut(e.target.value)}
            className="w-full p-2 border rounded"
            required
          />
        </div>
        <button type="submit" className="bg-blue-600 text-white px-4 py-2 rounded-lg w-full hover:bg-blue-700">
          Book Now
        </button>
      </form>
    </div>
  );
}