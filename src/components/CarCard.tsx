// src/components/CarCard.tsx

import { Car } from '@/lib/types';
import Link from 'next/link';
import Image from 'next/image';

type CarCardProps = {
  car: Car;
};

export default function CarCard({ car }: CarCardProps) {
  return (
    <div className="border rounded-lg p-4 shadow-md hover:shadow-lg transition-shadow">
      <div className="relative w-full h-48 mb-4">
        <Image
          src={car.image}
          alt={`${car.brand} ${car.model}`}
          layout="fill"
          objectFit="cover"
          className="rounded-md"
        />
      </div>
      <h2 className="text-xl font-bold">{car.brand} {car.model}</h2>
      <p className="text-gray-600">{car.year}</p>
      <div className="flex justify-between items-center mt-4">
        <p className="text-lg font-semibold">${car.price_per_day}/day</p>
        <Link href={`/cars/${car.id}`} className="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
          Details
        </Link>
      </div>
    </div>
  );
}
