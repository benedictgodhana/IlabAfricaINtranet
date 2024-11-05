<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('notice_id'); // Foreign key for the notice
            $table->string('name'); // Name of the commenter
            $table->string('email')->nullable(); // Optional email field
            $table->text('comment'); // Comment content
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('notice_id')->references('id')->on('notices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
