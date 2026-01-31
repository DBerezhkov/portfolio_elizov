<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateAdminUser extends Command
{
    protected $signature = 'portfolio:create-admin';

    protected $description = 'Создаёт или сбрасывает пароль администратора (Елизов Алексей)';

    public function handle(): int
    {
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $this->error('База данных недоступна. На Railway добавьте PostgreSQL и укажите DATABASE_URL.');
            return self::FAILURE;
        }

        User::updateOrCreate(
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
