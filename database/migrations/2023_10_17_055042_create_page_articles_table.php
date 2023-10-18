<?php

use App\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('mini_title')->nullable();
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('video_link')->nullable();
            $table->boolean('status');
            $table->string('pdf_file')->nullable();
            $table->text('link')->nullable();
            $table->foreignIdFor(Page::class)->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_articles');
    }
};
