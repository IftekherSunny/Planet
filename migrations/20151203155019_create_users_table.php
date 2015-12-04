<?php

use Sun\Database\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email', 60)->unique()->index();
            $table->string('name', 60);
            $table->string('password', 60);
            $table->string('temp_password', 60);
            $table->string('code', 60);
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Schema::drop('users');
    }
}