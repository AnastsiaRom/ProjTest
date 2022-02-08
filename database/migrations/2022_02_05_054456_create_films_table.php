<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('films', function (Blueprint $table) {
      $table->id();
      $table->string('title', 120)->nullable();

      $table->string('path'); // путь к файлу - где лежит

      $table->text('description', 1000)->nullable(false);
      $table->string('link')->nullable();

      $table->integer('user_id')->comment('создатель');
      $table->integer('approved_by')->nullable(); //кто одобрил

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
    Schema::dropIfExists('films');
  }
}
