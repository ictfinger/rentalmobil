/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'img.carmudi.co.id',
        port: '',
        pathname: '/**',
      },
    ],
  },
};

export default nextConfig;
