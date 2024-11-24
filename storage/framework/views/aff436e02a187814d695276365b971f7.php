<?php $__env->startSection('content'); ?>
 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-white dark:text-purple-200 leading-tight">
        <?php echo e(__('Search Results')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<div class="pb-12 bg-purple-100" style="background-image: url('<?php echo e(asset('storage/Logos/background_img.jpg')); ?>');">
    <img src="<?php echo e(asset('storage/Logos/WheelsnThings.png')); ?>" class="w-full h-25">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-black">Search Results for "<?php echo e($searchTerm); ?>"</h1>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <?php if($vehicles->isNotEmpty()): ?>
                        <!-- Search Results Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md overflow-hidden">
                                <!-- Table Header -->
                                <thead class="bg-purple-600 text-white">
                                    <tr>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">#</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Make</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Model</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Year</th>
                                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-left">Action</th>
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="even:bg-gray-100 dark:even:bg-gray-700">
                                            <td class="px-4 py-2 border border-gray-300 dark:border-gray-600"><?php echo e($vehicle->id); ?></td>
                                            <td class="px-4 py-2 border border-gray-300 dark:border-gray-600"><?php echo e($vehicle->make->name ?? 'N/A'); ?></td>
                                            <td class="px-4 py-2 border border-gray-300 dark:border-gray-600"><?php echo e($vehicle->model->name ?? 'N/A'); ?></td>
                                            <td class="px-4 py-2 border border-gray-300 dark:border-gray-600"><?php echo e($vehicle->year); ?></td>
                                            <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">
                                                <a href="<?php echo e(route('vehicles.show', $vehicle->id)); ?>"
                                                   class="text-purple-600 hover:underline">
                                                    View Details
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="px-4 py-2 text-center border border-gray-300 dark:border-gray-600 text-gray-500">
                                                No vehicles available.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    <?php else: ?>
                        <!-- No Results Message -->
                        <p class="text-center text-gray-500 dark:text-gray-400">No results found for "<?php echo e($searchTerm); ?>".</p>
                    <?php endif; ?>
                </div>
                <!-- Back to Search -->
                <div class="mt-6">
                    <a href="<?php echo e(url()->previous() ?? route('welcome')); ?>"
                       class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                       Back to Search
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/vehicles/results.blade.php ENDPATH**/ ?>