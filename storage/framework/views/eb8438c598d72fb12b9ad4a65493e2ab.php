<?php $__env->startSection('content'); ?>
<div class="container">
    <h3>Search Results</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Make</th>
                <th>Model</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($result->id); ?></td>
                    <td><?php echo e($result->make->name); ?></td>
                    <td><?php echo e($result->name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3">No results found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\WheelzandThings\resources\views/search/results.blade.php ENDPATH**/ ?>