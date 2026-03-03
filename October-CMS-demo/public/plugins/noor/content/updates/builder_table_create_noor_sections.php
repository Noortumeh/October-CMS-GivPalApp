<?php

namespace Noor\Content\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function ($table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('sections')->onDelete('cascade');
            $table->string('section');
            $table->string('type');
            $table->string('file_path')->nullable();
            $table->integer('order')->default(1);
            $table->integer('items_count')->nullable()->default(3);
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('date')->nullable();

            $table->softDeletes();
            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
