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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('address_id')->constrained()->cascadeOnDelete();  // Composición
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();     // Composición
            $table->string('dni');
            $table->string('surname');
            $table->boolean('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropForeign(['cart_id']);
            $table->dropColumn('dni');
            $table->dropColumn('surname');
            $table->dropColumn('admin');
        });
    }
};
