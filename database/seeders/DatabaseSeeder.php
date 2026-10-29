<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // Two demo accounts with 150 notes each (password for both: "password")
    public function run(): void
    {
        $marco = User::create([
            'name'     => 'Marco Reyes',
            'email'    => 'marco@example.com',
            'password' => Hash::make('password'),
        ]);

        $joy = User::create([
            'name'     => 'Joy Santos',
            'email'    => 'joy@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->seedNotes($marco, 150);
        $this->seedNotes($joy, 150);
    }

    private function seedNotes(User $user, int $count): void
    {
        $kinds  = ['Reminder', 'To-do', 'Idea', 'Meeting', 'Review', 'Draft', 'Question'];
        $topics = [
            'ITE 116 lab', 'thesis chapter 2', 'capstone title defense', 'groceries',
            'org meeting', 'midterm reviewer', 'Laravel routes', 'database design',
            'NSTP activity', 'budget for the week', 'group project tasks', 'library books',
            'Tailwind layout', 'enrollment requirements', 'birthday gift ideas', 'gym schedule',
        ];
        $lines = [
            'Check this again before Friday.',
            'Ask the group for their part by tomorrow night.',
            'Bring a printed copy and a flash drive.',
            'Remember to commit and push to GitHub first.',
            'Compare this with the notes from last week.',
            'Keep it short; the panel only gives ten minutes.',
            'Budget: around 500 pesos, including transport.',
            'Look up the Laravel docs for the exact syntax.',
            'Message the adviser if the schedule changes.',
            'Finish the outline first, then fill in the details.',
        ];

        $rows = [];

        for ($i = 0; $i < $count; $i++) {
            // spread the notes over the last six months
            $createdAt = now()->subMinutes(random_int(0, 60 * 24 * 180));

            $rows[] = [
                'user_id'    => $user->id,
                'title'      => $kinds[array_rand($kinds)] . ': ' . $topics[array_rand($topics)],
                'body'       => implode(' ', array_map(fn ($k) => $lines[$k], array_rand($lines, 2))),
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        // ONE insert query for all the rows, instead of 150 separate ones
        DB::table('notes')->insert($rows);
    }
}
