<?php $__env->startSection('content'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 min-h-screen" style="background-image: url('<?php echo e(asset('storage/Logos/background_img.jpg')); ?>');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">My Vehicles</h1>
                    <a href="<?php echo e(route('vehicles.create')); ?>"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Add
                        Vehicle</a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-800 dark:text-gray-200">
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">#</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Make</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Model</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Price</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Year</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Description</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Image</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <?php echo e($vehicle->id); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <?php echo e($vehicle->make->name); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <?php echo e($vehicle->model->name); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            $<?php echo e(number_format($vehicle->price, 2)); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <?php echo e($vehicle->year); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <?php echo e($vehicle->description); ?></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <div class="mb-4">
                                            <img src="<?php echo e(asset($vehicle->image)); ?>"
                                                alt="<?php echo e($vehicle->make->name ?? 'Unknown Make'); ?> <?php echo e($vehicle->model->name ?? 'Unknown Model'); ?>"
                                                class="w-full h-40 object-cover rounded-md border-2 border-purple-500"></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <div class="inline-grid gap-2">
                                                <a href="<?php echo e(route('vehicles.show', $vehicle->id)); ?>"
                                                    class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-1 px-3 rounded">View</a>
                                                <a href="<?php echo e(route('vehicles.edit', $vehicle)); ?>"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Edit</a>
                                                <form action="<?php echo e(route('vehicles.destroy', $vehicle)); ?>" method="POST"
                                                    style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/vehicles/index.blade.php ENDPATH**/ ?>