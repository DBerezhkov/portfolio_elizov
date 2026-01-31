<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'portfolio:create-admin';

    protected $description = 'Создаёт или сбрасывает пароль администратора (Елизов Алексей)';

    public function handle(): int
    {
        $user = User::updateOrCreate(
            ['email' => 'elizov@portfolio.local'],
            [
                'name' => 'Елизов Алексей',
                'password' => bcrypt('portfolio123'),
            ]
        );

        $this->info('Администратор создан/обновлён.');
        $this->line('Email: elizov@portfolio.local');
        $this->line('Пароль: portfolio123');

        return self::SUCCESS;
    }
}
