<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id"); // işaretsiz  otomatik artan tamsayı 
            $table->string('name');
            $table->bigInteger("category_id")->unsigned();
            $table->decimal('price',8,2);
            $table->integer('amount')->unsigned();
            $table->text("detail"); 
            $table->foreign("category_id")->on("categories")->references("id")
            ->onDelete("cascade")->onUpdate("cascade");   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
