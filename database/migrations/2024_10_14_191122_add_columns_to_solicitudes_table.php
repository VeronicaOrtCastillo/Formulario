<?php

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
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->string('name');
            $table->string('curp');
            $table->string('rfc');
            $table->string('email');
            $table->string('clabe');
            $table->string('files');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropForeign('solicitudes_user_id_foreign');

            $table->dropColumn('name');
            $table->dropColumn('curp');
            $table->dropColumn('rfc');
            $table->dropColumn('email');
            $table->dropColumn('clabe');
            $table->dropColumn('files');
            $table->dropColumn('user_id');

        });
    }
};
