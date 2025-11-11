// src/lib/mock-data.ts

import { Car } from './types';

export const cars: Car[] = [
  {
    id: 1,
    brand: 'Toyota',
    model: 'Camry',
    year: 2022,
    color: 'Silver',
    license_plate: 'B 1234 ABC',
    price_per_day: 50.00,
    is_available: true,
    image: 'https://img.carmudi.co.id/2018/01/24/316x208/toyota-camry-2-5-v-at-285641.jpg',
  },
  {
    id: 2,
    brand: 'Honda',
    model: 'Civic',
    year: 2023,
    color: 'Black',
    license_plate: 'B 5678 DEF',
    price_per_day: 60.00,
    is_available: true,
    image: 'https://img.carmudi.co.id/2023/10/24/316x208/honda-civic-rs-at-3277021.jpg',
  },
  {
    id: 3,
    brand: 'Suzuki',
    model: 'Ertiga',
    year: 2021,
    color: 'White',
    license_plate: 'B 9101 GHI',
    price_per_day: 45.00,
    is_available: false,
    image: 'https://img.carmudi.co.id/2018/06/15/316x208/suzuki-ertiga-gx-at-576483.jpg',
  },
    {
    id: 4,
    brand: 'Mitsubishi',
    model: 'Pajero Sport',
    year: 2023,
    color: 'Gray',
    license_plate: 'B 1122 JKL',
    price_per_day: 80.00,
    is_available: true,
    image: 'https://img.carmudi.co.id/2023/10/18/316x208/mitsubishi-pajero-sport-dakar-ultimate-at-4x2-3269229.jpg',
  },
];
