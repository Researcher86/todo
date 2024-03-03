<?php

declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefault436fa38903fbf6ed7576474a286d1bc2 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('tasks')
        ->alterColumn('finished_at', 'datetime', ['nullable' => true, 'defaultValue' => null])
        ->update();
    }

    public function down(): void
    {
        $this->table('tasks')
        ->alterColumn('finished_at', 'datetime', ['nullable' => false, 'defaultValue' => null])
        ->update();
    }
}
