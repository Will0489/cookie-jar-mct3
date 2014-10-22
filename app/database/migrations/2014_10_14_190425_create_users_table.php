<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
        });

        Schema::create('categories', function($table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image_url')->nullable();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('institutions', function($table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('city');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('courses', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('usersdetails', function($table)
        {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('projects', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('question');
            $table->boolean('finished')->default(0);
            $table->dateTime('date_created');
            $table->dateTime('date_deadline');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('projectscategorieslink', function($table)
        {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('userscategorieslink', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('collaborations', function($table)
        {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('creator_accepted')->default(0);
            $table->timestamps();
        });

        Schema::create('conversations', function($table)
        {
            $table->increments('id');
            $table->dateTime('started_on');
            $table->boolean('archived')->default(0);
            $table->integer('collaboration_id')->unsigned();
            $table->foreign('collaboration_id')->references('id')->on('collaborations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('messages', function($table)
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
        Schema::drop('users');
        Schema::drop('usersdetails');
        Schema::drop('courses');
        Schema::drop('institutions');
        Schema::drop('collaborations');
        Schema::drop('conversations');
        Schema::drop('projects');
        Schema::drop('messages');
        Schema::drop('projectscategorieslink');
        Schema::drop('userscategorieslink');
        Schema::drop('categories');
    }

}
