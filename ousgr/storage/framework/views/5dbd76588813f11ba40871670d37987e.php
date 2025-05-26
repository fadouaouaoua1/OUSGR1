 

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Gestion des Utilisateurs</h1>
        <a href="<?php echo e(route('admin.users.create')); ?>"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Ajouter un utilisateur
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg border">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rôle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($user->id); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($user->name); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($user->email); ?></td>
                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo e($user->role->nom ?? '-'); ?></td>
                        <td class="px-6 py-4 text-sm">
                            <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                               class="text-indigo-600 hover:text-indigo-900 mr-3">📝 Modifier</a>

                            <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" class="inline-block"
                                  onsubmit="return confirm('Confirmer la suppression ?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Aucun utilisateur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\MAMP\htdocs\ousgr\resources\views/admin/users/index.blade.php ENDPATH**/ ?>