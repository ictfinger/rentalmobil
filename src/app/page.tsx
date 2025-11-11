// src/app/page.tsx

import CarCard from '@/components/CarCard';
import { cars } from '@/lib/mock-data';

export default function Home() {
  return (
    <div>
      <h1 className="text-3xl font-bold mb-8">Our Fleet</h1>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {cars.map((car) => (
          <CarCard key={car.id} car={car} />
        ))}
      </div>
    </div>
  );
}
