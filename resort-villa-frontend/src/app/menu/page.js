'use client';
import { useQuery } from '@tanstack/react-query';
import axios from 'axios';

const fetchMenuItems = async () => {
  const response = await axios.get('/api/menu-items');
  return response.data;
};

export default function Menu() {
  const { data: menuItems, isLoading, error } = useQuery({
    queryKey: ['menu-items'],
    queryFn: fetchMenuItems,
  });

  if (isLoading) return <div>Loading...</div>;
  if (error) return <div>Error loading menu</div>;

  return (
    <div className="container mx-auto py-12">
      <h1 className="text-4xl font-bold mb-8 text-center">Our Restaurant Menu</h1>
      <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
        {menuItems.map((item) => (
          <div key={item.id} className="bg-white p-6 rounded-lg shadow-lg">
            <img src={item.image_url || '/menu-placeholder.jpg'} alt={item.name} className="w-full h-48 object-cover rounded-md mb-4" />
            <h2 className="text-2xl font-semibold">{item.name}</h2>
            <p className="text-gray-600 mb-4">{item.description}</p>
            <p className="text-lg font-bold">LKR {item.price}</p>
            <p className="text-gray-600">Category: {item.category}</p>
          </div>
        ))}
      </div>
    </div>
  );
}