// src/app/cars/[id]/page.tsx

import { cars } from '@/lib/mock-data';
import { notFound } from 'next/navigation';
import Image from 'next/image';
import Link from 'next/link';

type CarDetailsPageProps = {
  params: {
    id: string;
  };
};

// This function tells Next.js which dynamic pages to pre-render at build time.
export async function generateStaticParams() {
  return cars.map((car) => ({
    id: car.id.toString(),
  }));
}

export default function CarDetailsPage({ params }: CarDetailsPageProps) {
  const car = cars.find((c) => c.id.toString() === params.id);

  if (!car) {
    notFound(); // This will render the not-found.tsx file or a default 404 page.
  }

  return (
    <div className="container mx-auto p-4">
      <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div className="relative w-full h-96">
          <Image
            src={car.image}
            alt={`${car.brand} ${car.model}`}
            layout="fill"
            objectFit="cover"
            className="rounded-lg"
          />
        </div>
        <div>
          <h1 className="text-4xl font-bold mb-2">{car.brand} {car.model}</h1>
          <p className="text-2xl text-gray-700 mb-4">{car.year}</p>
          <div className="mb-4">
            <p><strong>Color:</strong> {car.color}</p>
            <p><strong>License Plate:</strong> {car.license_plate}</p>
          </div>
          <div className="mb-6">
            <p className={`text-xl font-semibold ${car.is_available ? 'text-green-600' : 'text-red-600'}`}>
              {car.is_available ? 'Available' : 'Not Available'}
            </p>
          </div>
          <div className="flex items-center justify-between">
            <p className="text-3xl font-bold">${car.price_per_day}<span className="text-lg font-normal">/day</span></p>
            <Link
              href={`/cars/${car.id}/book`}
              className={`px-6 py-3 rounded-lg text-white font-semibold ${car.is_available ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-400 cursor-not-allowed'}`}
              aria-disabled={!car.is_available}
              onClick={(e) => !car.is_available && e.preventDefault()}
            >
              Book Now
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
