<?php $__env->startSection('content'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-white dark:text-purple-200 leading-tight">
            <?php echo e(__('All Vehicles')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="pb-12" style="background-image: url('<?php echo e(asset('storage/Logos/background_img.jpg')); ?>');">
        <img src="<?php echo e(asset('storage/Logos/WheelsnThings.png')); ?>" class="w-full h-25 pt-8">
        <div class=" w-full mx-auto sm:px-6 lg:px-8">
            <div class="w-full inline-flex gap-4">
                <div class="w-2/12 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                    <div class="container">
                        <form action="<?php echo e(route('search.filter')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <!-- Make Dropdown -->
                            <div class="mb-4">
                                <label for="make"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Make
                                </label>
                                <select name="make_id" id="make"
                                    class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    <option value="">Select Make</option>
                                    <?php $__currentLoopData = $makes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $makes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($makes->id); ?>"><?php echo e($makes->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Model Dropdown -->
                            <div class="mb-4">
                                <label for="model"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Model
                                </label>
                                <select name="model_id" id="model"
                                    class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    <option value="">Select Model</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Search
                            </button>
                        </form>
                    </div>
                </div>

                <script>
                    document.getElementById('make').addEventListener('change', function() {
                        let makeId = this.value;

                        fetch(`/api/models?make_id=${makeId}`)
                            .then(response => response.json())
                            .then(data => {
                                let modelSelect = document.getElementById('model');
                                modelSelect.innerHTML = '<option value="">Select Model</option>';
                                data.forEach(model => {
                                    modelSelect.innerHTML += `<option value="${model.id}">${model.name}</option>`;
                                });
                            });
                    });
                </script>
                <div class=" w-full bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="container"><form method="GET" action="<?php echo e(route('vehicles.search')); ?>" style="margin-top: 20px;">
                            <input class=" rounded-sm"
                                type="text"
                                name="search"
                                placeholder="Search"
                                value="<?php echo e(request('search')); ?>"
                                style="width: 300px; padding: 10px; font-size: 16px;"
                            >
                            <button type="submit" style="padding: 10px 20px; font-size: 16px;"class="ml-5 mb-5 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Filter</button>
                        </form></div>
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-bold text-black">All Vehicles</h1>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <?php $__empty_1 = true; $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e(route('vehicles.show', $vehicle->id)); ?>">
                                    <div
                                        class="bg-white border-2 border-gray-100 hover:bg-gray-100 dark:bg-gray-700 rounded-lg shadow-lg p-4">
                                        <div class="mb-4">
                                            <img src="<?php echo e(asset($vehicle->image)); ?>"
                                                alt="<?php echo e($vehicle->make->name ?? 'Unknown Make'); ?> <?php echo e($vehicle->model->name ?? 'Unknown Model'); ?>"
                                                class="w-full h-40 object-cover rounded-md border-2 border-purple-500">
                                        </div>
                                        <div class="text-gray-800 dark:text-gray-200">
                                            <h3 class="font-semibold text-black"><b>Make:</b>
                                                <i><?php echo e($vehicle->make->name ?? 'N/A'); ?></i>
                                            </h3>
                                            <h4 class="font-semibold text-black"><b>Model:</b>
                                                <i><?php echo e($vehicle->model->name ?? 'N/A'); ?></i>
                                            </h4>
                                            <h4 class="font-semibold text-black"><b>Year:</b> <i><?php echo e($vehicle->year); ?></i>
                                            </h4>
                                            <h3 class="font-semibold text-yellow-600 dark:text-gold-400"><b>Price:</b>
                                                <i>P<?php echo e(number_format($vehicle->price, 2)); ?></i>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="col-span-full text-center text-gray-500 dark:text-gray-400">No vehicles available.
                                </p>
                            <?php endif; ?>
                        </div>
                        <!-- Pagination Links -->
                        <div class="mt-6">
                            <?php echo e($vehicles->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/welcome.blade.php ENDPATH**/ ?>