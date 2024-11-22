<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">UpdateVehicle</h1>
        <!-- Display All Errors -->
        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="text-sm"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('vehicles.update', $vehicle)); ?>" method="POST" enctype="multipart/form-data"
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label for="make" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Make</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="make" name="make_id">
                    <option value="<?php echo e($vehicle->make->id); ?>" disabled selected><?php echo e($vehicle->make->name); ?></option>
                    <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $make): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($make->id); ?>"
                            <?php echo e(old('make_id', $vehicle->make_id) == $make->id ? 'selected' : ''); ?>>
                            <?php echo e($make->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Model</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="model" name="model_id">
                    <option value="<?php echo e($vehicle->model->id); ?>" disabled selected><?php echo e($vehicle->model->name); ?></option>
                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($model->id); ?>"
                            <?php echo e(old('model_id', $vehicle->model_id) == $model->id ? 'selected' : ''); ?>>
                            <?php echo e($model->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Price:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="price" name="price" value="<?php echo e(old('price', $vehicle->price)); ?>">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Year:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="year" name="year" value="<?php echo e(old('year', $vehicle->year)); ?>">
            </div>

            <div class="mb-4">
                <label for="mileage" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Mileage:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="mileage" name="mileage" value="<?php echo e(old('mileage', $vehicle->mileage)); ?>">
            </div>

            <div class="mb-4">
                <label for="condition" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Condition</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="condition" name="condition">
                    <option value="<?php echo e($vehicle->condition); ?>" disabled selected><?php echo e(ucfirst($vehicle->condition)); ?></option>
                    <option value="bad" <?php echo e(old('condition', $vehicle->condition) == 'bad' ? 'selected' : ''); ?>>Bad</option>
                    <option value="good" <?php echo e(old('condition', $vehicle->condition) == 'good' ? 'selected' : ''); ?>>Good</option>
                    <option value="excellent" <?php echo e(old('condition', $vehicle->condition) == 'excellent' ? 'selected' : ''); ?>>Excellent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Description</label>
                <textarea
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" rows="4"><?php echo e(old('description', $vehicle->description)); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Upload Image</label>
                <input type="file"
                    class=" form-control w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" name="image">
                <?php if($vehicle->image): ?>
                    <div class="mt-2">
                        <img src="<?php echo e(asset($vehicle->image)); ?>" alt="Current Image" class="w-32 h-32 object-cover">
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex justify-end">
                <!-- Back Button -->
                <div class="mt-2 mr-2">
                    <a href="<?php echo e(url()->previous() ?? route('welcome')); ?>"
                       class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                       Back to Vehicles
                    </a>
                </div>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/vehicles/edit.blade.php ENDPATH**/ ?>