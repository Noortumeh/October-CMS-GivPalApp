<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNoorMoviesActorsMovies extends Migration
{
    public function up()
    {
        Schema::create('noor_movies_actors_movies', function($table)
        {
            $table->integer('movie_id')->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->primary(['movie_id','actor_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('noor_movies_actors_movies');
    }
}
