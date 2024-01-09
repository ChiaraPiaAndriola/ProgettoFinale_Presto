<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('icon');
            $table->timestamps();
        });
        $categories = [
            "Arredamento",
            "Sport",
            "Libri",
            "Abbigliamento",
            "Musica",
            "Giardinaggio",
            "Motori",
            "Elettronica",
            "Cucina",
            "Film"
        ];

        // $icons = [
            // 10 icone
            // apici con dentro tag icon di fontawesome
        // ];
        foreach($categories as $category){
            Category::create(["name" => $category]);
        }

        // foreach($categories as $key=>category){
        //     Category::create([
        //         "name" => $category,
        //         "icon"=> $icons[$key]
        //     ]);
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
