<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class CreatePasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::info('Running migration: CreatePasswordResetTokensTable');
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Log::info('Migration completed: CreatePasswordResetTokensTable');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::info('Rolling back migration: CreatePasswordResetTokensTable');
        Schema::dropIfExists('password_reset_tokens');
        Log::info('Rollback completed: CreatePasswordResetTokensTable');
    }
}
