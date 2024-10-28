<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); // Removed default('NULL')
            $table->text('description')->nullable(); // Removed default('NULL')
            $table->string('initial_balance')->nullable(); // Removed default('NULL')
            $table->string('account_number')->nullable(); // Removed default('NULL')
            $table->string('contact_person')->nullable(); // Removed default('NULL')
            $table->string('phone')->nullable(); // Removed default('NULL')
            $table->string('url')->nullable(); // Removed default('NULL')
            $table->timestamp('created_at')->nullable(); // Removed default(NULL)
            $table->timestamp('updated_at')->nullable(); // Removed default(NULL)
            $table->softDeletes()->index('accounts_deleted_at_index');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
