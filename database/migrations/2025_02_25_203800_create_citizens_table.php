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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('famName');
            $table->string('phone_number', 10)->unique();
            $table->string('address');
            //marital_statut
            $table->enum('marital_status',['married','divorced','widow','sponsored','single_unsponsored','elderly']);
            //income_detail
            $table->decimal('monthly_income',10,2);
            //family_details
            $table->boolean('healthy_disabilty_prevent_work')->default(0);
            $table->integer('underage_children')->default(0);
            $table->integer('sponsored_chronic_illness')->default(0); // Replace boolean
            $table->boolean('wife_chronic_conditions')->default(0);
            $table->boolean('husband_chronic_conditions')->default(0);

            //Housing_Condition
            $table->boolean('fragile_houssing')->default(0);
            $table->boolean('live_familyHome')->default(0);
            $table->boolean('has_debt')->default(0);
            $table->boolean('in_municipality')->default(0);
            $table->boolean('rented_house')->default(0);
            //other benefits

            //$table->boolean('no_association_benefits');
            //$table->boolean('no_municipality_benefits');
            //$table->boolean('no_social_security');
            //negative factors
            //$table->boolean('unemployed_husband_no_reason');
            //$table->boolean('high_income');
            //$table->boolean('owns_land');
            //$table->boolean('owns_vehicle');
            //$table->boolean('owns_trees');
            //$table->boolean('husband_drugs');
            //$table->boolean('full_heal_card');
            //$table->boolean('family_negative_reputation');
            $table->json('frameworks');
            $table->json('negatives');
            $table->integer('total_points')->default(0);

          
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
