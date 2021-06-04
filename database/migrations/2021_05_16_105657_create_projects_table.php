
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('Project_name');
            $table->integer('share_amount' );
            $table->integer('share_value' );
            $table->integer('minimum_share' );
            $table->string('description');
            $table->string('share_type');
            $table->bigInteger('catagory_id')->unsigned();
            $table->foreign('catagory_id')->references('id')->on('catagories');
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
        Schema::dropIfExists('projects');
    }
}
