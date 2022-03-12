<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("route")->unique();
            $table->unsignedBigInteger("parent_id")->nullable()->default(0);
            $table->unsignedBigInteger("sort")->nullable()->default(0);
            $table->string("icon")->nullable()->default("");
            $table->string("permission")->nullable()->default("");
            $table->timestamps();
        });
        Schema::create('roles_admin_menus', function (Blueprint $table) {
            $table->unsignedBigInteger("role_id");
            $table->unsignedBigInteger("admin_menu_id");
            $table->timestamps();

            //FOREIGN KEY
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('admin_menu_id')->references('id')->on('admin_menus')->onDelete('cascade');

            //PRIMARY KEYS
            $table->primary(['role_id', 'admin_menu_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
        Schema::dropIfExists('roles_admin_menus');
    }
};
