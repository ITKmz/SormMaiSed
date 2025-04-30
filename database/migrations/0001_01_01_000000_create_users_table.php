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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('customer_username')->unique();
            $table->string('customer_password');
            $table->string('customer_tel');
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('employee_name');
            $table->string('employee_username')->unique();
            $table->string('employee_password');
            $table->string('role');
            $table->string('department')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('employee_tel');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->boolean('is_finished')->default(false);
            $table->timestamp('order_time');

            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('CASCADE');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method');
            $table->boolean('is_paid')->default(false);
            $table->timestamp('payment_date');

            $table->foreign('order_id')->references('order_id')->on('orders')->onUpdate('CASCADE');
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id('product_stock_id');
            $table->string('product_name');
            $table->integer('product_price');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('product_type');
            $table->text('product_description');
            $table->unsignedBigInteger('product_stock_id');
            $table->string('product_status');

            $table->foreign('order_id')->references('order_id')->on('orders')->onUpdate('CASCADE');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('product_stock_id')->references('product_stock_id')->on('stocks')->onUpdate('CASCADE');
        });

        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->text('feedback_description');
            $table->integer('feedback_rating');
            $table->timestamp('feedback_time');

            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('CASCADE');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('CASCADE');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('products');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('feedbacks');
        Schema::dropIfExists('sessions');
    }
};
