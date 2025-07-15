<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            [
                'title' => 'General Info on Blockchain Tech',
                'category' => 'Basics',
                'status' => 'Published',
                'difficulty' => 'Beginner',
                'description' => 'Learn the fundamentals of blockchain technology, including how it works, its key features like decentralization and immutability, and explore various real-world applications across different industries.',
                'image' => 'https://images.unsplash.com/photo-1639762681485-074b7f938ba0?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Getting Started With Crypto',
                'category' => 'Basics',
                'status' => 'Published',
                'difficulty' => 'Beginner',
                'description' => 'Introduction to cryptocurrency basics, understanding digital currencies, and learning how to create and secure your first cryptocurrency wallet with best practices.',
                'image' => 'https://images.unsplash.com/photo-1621761191319-c6fb62004040?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Using MetaMask',
                'category' => 'Wallets',
                'status' => 'Published',
                'difficulty' => 'Beginner',
                'description' => 'Complete guide to installing, setting up, and using MetaMask browser extension. Learn about network switching, token management, and advanced security features.',
                'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Decentralised Finance (DeFi)',
                'category' => 'DeFi',
                'status' => 'Published',
                'difficulty' => 'Intermediate',
                'description' => 'Explore decentralized finance protocols, yield farming strategies, liquidity pools, and learn advanced techniques for maximizing DeFi yields while managing risks.',
                'image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Non-Fungible Tokens (NFTs)',
                'category' => 'NFTs',
                'status' => 'Published',
                'difficulty' => 'Beginner',
                'description' => 'Understanding non-fungible tokens (NFTs), their technology, use cases, marketplaces, and applications in digital art, gaming, and various other industries.',
                'image' => 'https://images.unsplash.com/photo-1640161704729-cbe966a08476?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Smart Contracts',
                'category' => 'Advanced',
                'status' => 'Published',
                'difficulty' => 'Advanced',
                'description' => 'Deep dive into smart contracts, their development, deployment, and real-world applications in various blockchain ecosystems.',
                'image' => 'https://images.unsplash.com/photo-1518186285589-2f7649de83e0?w=400&h=225&fit=crop&crop=center',
                'has_assessment' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($topics as $topic) {
            Topic::firstOrCreate(
                ['title' => $topic['title']],
                $topic
            );
        }
    }
}