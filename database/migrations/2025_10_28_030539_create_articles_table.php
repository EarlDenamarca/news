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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string( 'title' );
            $table->text( 'description' );
            $table->text( 'content' );
            $table->string( 'author' );
            $table->unsignedBigInteger( 'source_id' );
            $table->datetime( 'published_date' );
            $table->text( 'url' );
            $table->text( 'image_url' );
            $table->timestamps();

            $table->foreign( 'source_id' )->references( 'id' )->on( 'sources' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
