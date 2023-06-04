<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Message;

class ChatSeeder extends Seeder
{
    public function run()
    {
        $adminId = 1; // Replace with the admin user ID
        $userId = 2; // Replace with the user ID you want to simulate chat with

        // Create some sample chat messages
        Message::create([
            'sender_id' => $adminId,
            'receiver_id' => $userId,
            'message' => 'Hello, how can I assist you?',
        ]);

        Message::create([
            'sender_id' => $userId,
            'receiver_id' => $adminId,
            'message' => 'I have a question about my order.',
        ]);

        // Add more messages as needed

        // You can also use DB facade for raw queries if required
        // DB::table('messages')->insert([...]);
    }
}
