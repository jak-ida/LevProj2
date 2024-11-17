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
            Schema::create('vehicles', function (Blueprint $table) {
                $table->id(); // Primary key

                // Foreign key to the User table
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

                // Foreign key to the Make table
                $table->foreignId('make_id')->constrained('makes')->onDelete('cascade');

                // Foreign key to the Model table
                $table->foreignId('model_id')->constrained('car_models')->onDelete('cascade');

                // Vehicle details fields
                $table->decimal('price', 10); // Price
                $table->integer('mileage'); // Mileage (integer)
                $table->year('year'); // Year of the vehicle
                $table->string('condition'); // Condition of the vehicle (e.g., 'new', 'used')
                $table->text('description'); // Vehicle description

                $table->timestamps(); // created_at and updated_at
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('vehicles');
        }
    };
