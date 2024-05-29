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
        Schema::table('auth_users', function (Blueprint $table) {

            //
            if(!Schema::hasColumn('auth_users','role'))
            {
                $table->enum('role',['admin','user'])->default('admin');
            }
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auth_users', function (Blueprint $table) {
            //
            if(Schema::hasColumn('auth_users','role'))
            {
                $table->dropColumn('role');
            }
            
        });
    }
};
