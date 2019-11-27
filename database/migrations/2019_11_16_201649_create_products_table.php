<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedbigInteger('category_id');

            $table->string('nombre',50);
            $table->string('slug',50);
            $table->bigInteger('cantidad')->unsigned()->default(0);
            $table->decimal('precio_actual',12,2)->default(0);
            $table->decimal('precio_anterior',12,2)->default(0);
            $table->integer('porcentaje_descuento')->unsigned()->default(0);
            $table->mediumText('descripcion_corta');
            $table->mediumText('descripcion_larga');
            $table->mediumText('especificaciones');
            $table->mediumText('datos_de_interes');
            $table->unsignedbigInteger('visitas')->default(0);
            $table->unsignedbigInteger('ventas')->default(0);
            $table->string('estado');
            $table->char('activo',2);
            $table->char('sliderprincipal',2);

            $table->timestamps();

            //relaciones
            $table->foreign('category_id')->references('id')->on('categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
