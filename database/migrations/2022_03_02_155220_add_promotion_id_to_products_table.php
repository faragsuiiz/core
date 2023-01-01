
<?php

use App\Models\ProductPromotion;
use Illuminate\Support\Facades\Schema;
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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignIdFor(ProductPromotion::class, 'promotion_id')->nullable()->constrained('product_promotions');
            $table->boolean('is_pinned')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(ProductPromotion::class, 'promotion_id');
            $table->dropColumn(['is_pinned']);
        });
    }
};
