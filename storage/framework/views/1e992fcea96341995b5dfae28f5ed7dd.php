<?php $__env->startSection('content'); ?>
 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-white dark:text-purple-200 leading-tight">
        <?php echo e(__('Vehicle Details')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<div class="pb-12 bg-purple-100" style="background-image: url('<?php echo e(asset('storage/Logos/background_img.jpg')); ?>');">
    <img src="<?php echo e(asset('storage/Logos/WheelsnThings.png')); ?>" class="w-full h-25">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-black">Vehicle Details</h1>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Vehicle Image -->
                    <div>
                        <img src="<?php echo e(asset($vehicle->image)); ?>" alt="<?php echo e($vehicle->make->name); ?> <?php echo e($vehicle->model->name); ?>"
                             class="w-full h-auto object-cover rounded-md border-2 border-purple-500">
                    </div>
                    <!-- Vehicle Details -->
                    <div class="text-gray-800 dark:text-gray-200">
                        <h3 class="font-semibold text-black"><b>Make:</b> <i><?php echo e($vehicle->make->name ?? 'N/A'); ?></i></h3>
                        <h4 class="font-semibold text-black"><b>Model:</b> <i><?php echo e($vehicle->model->name ?? 'N/A'); ?></i></h4>
                        <h4 class="font-semibold text-black"><b>Year:</b> <i><?php echo e($vehicle->year); ?></i></h4>
                        <h4 class="font-semibold text-black"><b>Mileage:</b> <i><?php echo e(number_format($vehicle->mileage)); ?> km</i></h4>
                        <h4 class="font-semibold text-black"><b>Condition:</b> <i><?php echo e(ucfirst($vehicle->condition)); ?></i></h4>
                        <h3 class="font-semibold text-yellow-600 dark:text-gold-400"><b>Price:</b> <i>P<?php echo e(number_format($vehicle->price, 2)); ?></i></h3>
                        <h4 class="font-semibold text-black"><b>Description:</b></h4>
                        <p class="text-black dark:text-gray-200"><?php echo e($vehicle->description); ?></p>
                    </div>
                </div>
                <!-- Back to All Vehicles -->
                <div class="mt-6">
                    <a href="<?php echo e(url()->previous() ?? route('welcome')); ?>"
                       class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                       Back to Vehicles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/vehicles/show.blade.php ENDPATH**/ ?>