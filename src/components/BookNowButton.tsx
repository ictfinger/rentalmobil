// src/components/BookNowButton.tsx
"use client";

import Link from 'next/link';

type BookNowButtonProps = {
  carId: number;
  isAvailable: boolean;
};

export default function BookNowButton({ carId, isAvailable }: BookNowButtonProps) {
  return (
    <Link
      href={`/cars/${carId}/book`}
      className={`px-6 py-3 rounded-lg text-white font-semibold ${isAvailable ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-400 cursor-not-allowed'}`}
      aria-disabled={!isAvailable}
      onClick={(e) => {
        if (!isAvailable) {
          e.preventDefault();
        }
      }}
    >
      Book Now
    </Link>
  );
}
