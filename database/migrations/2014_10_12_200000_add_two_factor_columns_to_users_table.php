<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

/**
 * Define a migration to add two-factor authentication columns to the users table.
 * This migration adds two columns, "two_factor_secret" and "two_factor_recovery_codes", to the "users" table.
 * If the "confirmsTwoFactorAuthentication" configuration option is set to true, it also adds a "two_factor_confirmed_at" column.
 */
return new class extends Migration
{
    /**
     * Run the migration.
     * Add the "two_factor_secret" and "two_factor_recovery_codes" columns to the "users" table.
     * If "confirmsTwoFactorAuthentication" is true, also add a "two_factor_confirmed_at" column.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('two_factor_secret')
                ->after('password')
                ->nullable();
            $table->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable();
            if (Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('two_factor_confirmed_at')
                    ->after('two_factor_recovery_codes')
                    ->nullable();
            }
        });
    }

    /**
     * Reverse the migration.
     * Drop the "two_factor_secret", "two_factor_recovery_codes", and "two_factor_confirmed_at" columns from the "users" table.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'two_factor_secret',
                'two_factor_recovery_codes',
                'two_factor_confirmed_at',
            ]);
        });
    }
};
