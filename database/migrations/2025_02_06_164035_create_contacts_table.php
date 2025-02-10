<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('contacts')) { // ✅ Only create if table doesn’t exist
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('phone')->nullable();
                $table->string('role')->nullable(); // ✅ Add Role Column
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
