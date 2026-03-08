<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->comment('sale | top_buy'); // section type
            $table->string('title', 255)->nullable(); // tiêu đề hiển thị
            $table->string('subtitle', 255)->nullable(); // tiêu đề phụ
            $table->unsignedBigInteger('category_sub_id')->nullable(); // danh mục con được chọn
            $table->integer('limit')->default(8); // số sản phẩm hiển thị
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_sections');
    }
}
