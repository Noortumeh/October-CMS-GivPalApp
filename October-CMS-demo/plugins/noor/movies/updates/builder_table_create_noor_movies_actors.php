<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNoorMoviesActors extends Migration
{
    public function up()
    {
        Schema::create('noor_movies_actors', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('noor_movies_actors');
    }
}
