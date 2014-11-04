<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
        });

        Schema::create('categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image_url')->nullable();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('questions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('body', 300);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('answered')->default(0);
            $table->date('deadline');
            $table->timestamps();
        });

        Schema::create('questionscategorieslink', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('userscategorieslink', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('collaborations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('creator_accepted')->default(0);
            $table->timestamps();
        });

        Schema::create('conversations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->dateTime('started_on');
            $table->boolean('archived')->default(0);
            $table->integer('collaboration_id')->unsigned();
            $table->foreign('collaboration_id')->references('id')->on('collaborations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('content');
            $table->integer('sender_id')->unsigned();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('conversation_id')->unsigned();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onDelete('cascade');
            $table->dateTime('date_sent');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('questionscategorieslink');
        Schema::drop('userscategorieslink');
        Schema::drop('questions');
        Schema::drop('messages');
        Schema::drop('conversations');
        Schema::drop('collaborations');
        Schema::drop('categories');
        Schema::drop('users');
    }

}
