<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'subject' => 'Inquiry about room availability',
                'message' => 'Hello, I would like to know if the conference room is available on May 15th.',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'subject' => 'Feedback about the venue',
                'message' => 'I had a great experience at your venue and wanted to share my feedback.',
            ],
        ];

        foreach ($contacts as $contact) {
            \App\Models\Contact::create($contact);
        }

    }
}
