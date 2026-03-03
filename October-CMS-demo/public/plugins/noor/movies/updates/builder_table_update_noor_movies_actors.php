<?php namespace Noor\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNoorMoviesActors extends Migration
{
    public function up()
    {
        Schema::table('noor_movies_actors', function($table)
        {
            $table->string('lastname', 10)->nullable();
            $table->dropColumn('age');
        });
    }
    
    public function down()
    {
        Schema::table('noor_movies_actors', function($table)
        {
            $table->dropColumn('lastname');
            $table->integer('age')->nullable();
        });
    }
}
