'use client';
import { useQuery } from '@tanstack/react-query';
import axios from 'axios';
import { useSession } from 'next-auth/react';

const fetchBookings = async (token) => {
  const response = await axios.get('/api/bookings', {
    headers: { Authorization: `Bearer ${token}` },
  });
  return response.data;
};

export default function Bookings() {
  const { data: session } = useSession();
  const { data: bookings, isLoading, error } = useQuery({
    queryKey: ['bookings'],
    queryFn: () => fetchBookings(session?.accessToken),
    enabled: !!session,
  });

  if (!session) return <div>Please log in to view bookings.</div>;
  if (isLoading) return <div>Loading...</div>;
  if (error) return <div>Error loading bookings</div>;

  return (
    <div className="container mx-auto py-12">
      <h1 className="text-4xl font-bold mb-8 text-center">My Bookings</h1>
      {bookings.length === 0 ? (
        <p className="text-center">No bookings found.</p>
      ) : (
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {bookings.map((booking) => (
            <div key={booking.id} className="bg-white p-6 rounded-lg shadow-lg">
              <h2 className="text-2xl font-semibold">{booking.villa.name}</h2>
              <p className="text-gray-600">Check-In: {booking.check_in}</p>
              <p className="text-gray-600">Check-Out: {booking.check_out}</p>
              <p className="text-lg font-bold">LKR {booking.total_price}</p>
              <p className="text-gray-600">Status: {booking.status}</p>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}