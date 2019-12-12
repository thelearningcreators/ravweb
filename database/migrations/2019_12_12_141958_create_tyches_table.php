<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTychesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyches', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('username');
            $table->string('question');
            $table->string('language')->nullable(true);
            $table->integer('level')->nullable(true);
            $table->unsignedInteger('user_id')->nullable(true);
            $table->string('edited_by')->nullable();
            $table->boolean('validated')->default(false);
            $table->string('validated_by')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('tyches');
    }
}
