<?php namespace Noor\Content\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('section_translations', function ($table) {
    //         $table->id();
    //         $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
    //         $table->string('locale', 5)->index();
    //         $table->string('title')->nullable();
    //         $table->string('subtitle')->nullable();
    //         $table->text('description')->nullable();
    //         $table->string('address')->nullable();
    //         $table->date('date')->nullable();

    //         $table->softDeletes();
    //         $table->unique(['section_id', 'locale']);

    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_translations');
    }
};