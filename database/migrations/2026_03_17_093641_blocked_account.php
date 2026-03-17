<?php

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blocked_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class);
            $table->foreignIdFor(User::class,'admin_id'); //Who Blocked the Account
            $table->string('reason');
            $table->boolean('fee_failed')->default(false);
            $table->timestamp('blocked_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocked_accounts');
    }
};
