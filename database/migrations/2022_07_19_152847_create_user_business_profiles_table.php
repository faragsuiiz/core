<?php

use Illuminate\Support\Facades\Schema;
use App\Enums\UserBusinessProfileStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_business_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('company_register')->nullable();
            $table->string('tax_card')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('links')->nullable();
            $table->longText('contacts')->nullable();
            $table->longText('services')->nullable();
            $table->unsignedInteger('paid_coins');
            $table->longText('cost_details')->nullable();
            $table->longText('counts')->nullable();
            $table->longText('category_names')->nullable();
            $table->enum('status', UserBusinessProfileStatus::getValues())->default(UserBusinessProfileStatus::WAITING_FOR_REVIEW)->index();
            $table->text('approval_note')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

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
        Schema::dropIfExists('user_business_profiles');
    }
};
