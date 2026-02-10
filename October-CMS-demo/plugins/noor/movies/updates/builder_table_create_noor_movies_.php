<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNoorMovies extends Migration
{
    public function up()
    {
        Schema::create('noor_movies_', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('noor_movies_');
    }
}
