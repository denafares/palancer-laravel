<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
          
            $table->id();
           
           $table->string('name');
           $table->string('slug')->unique();
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->enum('status',['active','inactive']);

        //هنا عرفنا الحقل 
           $table->unsignedBigInteger('parent_id')->nullable();
          // هنا انشانا الفورن كيه من الحقل 
           $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
           //الخطوتين الي فوق ممكن اختصرهم بخطوة واحدة 
         /*  $table->foreignId('parent_id')
           ->nullable()
           ->constrained('categories','id')
           ->nullonDelete();*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
