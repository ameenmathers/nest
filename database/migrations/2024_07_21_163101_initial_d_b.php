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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('name');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('nin_image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('approved')->default(false);
            $table->enum('role', ['agent', 'client', 'admin']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('agent_id');
            $table->unsignedBigInteger('uid')->unique()->nullable();
            $table->string('office_address');
            $table->string('home_address');
            $table->string('company_name')->nullable();
            $table->string('company_contact')->nullable();
            $table->timestamps();
        });

        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('pid');
            $table->integer('agent_id');
            $table->string('name');
            $table->boolean('approved')->default(false);
            $table->longText('description');
            $table->string('thumbnail');
            $table->string('category', 45);
            $table->string('district');
            $table->string('size');
            $table->string('bedroom');
            $table->string('type');
            $table->string('bathroom');
            $table->string('parking_space');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('uid')->nullable();
            $table->timestamps();
            $table->string('price')->nullable();
        });

        Schema::create('property_amenities', function (Blueprint $table) {
            $table->bigIncrements('pamid');
            $table->integer('pid');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('property_features', function (Blueprint $table) {
            $table->bigIncrements('pfid');
            $table->integer('pid');
            $table->string('feature_name');
            $table->string('feature_value');
            $table->timestamps();
        });

        Schema::create('property_images', function (Blueprint $table) {
            $table->bigIncrements('pimid');
            $table->integer('pid');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('trid');
            $table->integer('uid');
            $table->integer('agent_id');
            $table->date('date');
            $table->time('time');
            $table->string('payment_status')->default('pending');
            $table->string('tour_status')->default('pending');
            $table->integer('pid');
            $table->unique(['uid', 'pid']);
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('did');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('mid');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->text('message_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('agents');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_amenities');
        Schema::dropIfExists('property_features');
        Schema::dropIfExists('property_images');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('messages');
    }
};
