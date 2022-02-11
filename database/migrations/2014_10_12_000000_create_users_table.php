<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('gender',[User::GENDER_FEMALE,User::GENDER_MALE])->nullable();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->date('age')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes('deleted_at',0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
