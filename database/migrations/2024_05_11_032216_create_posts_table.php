<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('excerpt', 1000)->nullable();
            $table->string('image', 300)->nullable();
            $table->string('content', 10000);
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('author')->unsigned();
            $table->boolean('publish_status')->default(false);
            $table->dateTime('publish_date_from')->nullable();
            $table->dateTime('publish_date_to')->nullable();
            $table->boolean('comment_status')->default(true);
            $table->dateTime('deleted_at')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
