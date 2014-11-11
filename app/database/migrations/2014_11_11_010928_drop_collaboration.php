<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropCollaboration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('conversations', function(Blueprint $table)
        {
            $table->dropForeign('conversations_collaboration_id_foreign');
            $table->dropColumn('collaboration_id');
            $table->integer('question_id')->unsigned()->after('id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('owner_id')->unsigned()->after('question_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->after('owner_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

		Schema::dropIfExists('collaborations');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::create('collaborations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('creator_accepted')->default(0);
            $table->timestamps();
        });

        Schema::table('conversations', function(Blueprint $table)
        {
            $table->dropForeign('conversations_question_id_foreign');
            $table->dropColumn('question_id');
            $table->dropForeign('conversations_owner_id_foreign');
            $table->dropColumn('owner_id');
            $table->dropForeign('conversations_user_id_foreign');
            $table->dropColumn('user_id');
            $table->integer('collaboration_id')->unsigned();
            $table->foreign('collaboration_id')->references('id')->on('collaborations')->onDelete('cascade');
        });
	}

}
