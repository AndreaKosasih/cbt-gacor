<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CopyNisnToNpmAndRemoveNisn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Copy data from nisn to npm
        DB::statement('UPDATE students SET npm = nisn');

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('nisn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->bigInteger('nisn')->unique()->after('npm');
        });

        // Copy data back from npm to nisn
        DB::statement('UPDATE students SET nisn = npm');
    }
}
