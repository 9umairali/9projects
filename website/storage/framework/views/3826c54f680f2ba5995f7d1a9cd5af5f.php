<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Team Performance')); ?></h1>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Agent leaderboard and productivity metrics')); ?></p>
        </div>

        
        <div class="flex items-center gap-2">
            <div class="flex items-center bg-surface-2 border border-border rounded-xl p-0.5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['today' => __('Today'), '7d' => __('7 days'), '30d' => __('30 days'), '90d' => __('90 days')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <button wire:click="$set('dateRange', '<?php echo e($key); ?>')"
                        class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors <?php echo e($dateRange === $key ? 'bg-primary-600 text-white shadow-sm' : 'text-muted  hover:text-ink'); ?>">
                    <?php echo e($label); ?>

                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-1.5 px-3 py-2 text-sm text-muted  bg-surface-2 border border-border rounded-xl hover:bg-surface transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <?php echo e(__('Custom')); ?>

                </button>
                <div x-show="open" @click.away="open = false" x-transition
                     class="absolute right-0 mt-1 w-64 bg-surface-2 rounded-xl shadow-lg border border-border p-4 z-20" style="display: none;">
                    <div class="space-y-2">
                        <div>
                            <label class="text-xs text-muted"><?php echo e(__('From')); ?></label>
                            <input type="date" wire:model="customFrom" class="w-full px-3 py-1.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                        <div>
                            <label class="text-xs text-muted"><?php echo e(__('To')); ?></label>
                            <input type="date" wire:model="customTo" class="w-full px-3 py-1.5 text-sm border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                        <button @click="open = false" wire:click="applyCustomRange" class="btn-primary w-full px-3 py-1.5 text-sm"><?php echo e(__('Apply')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border">
            <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Agent Leaderboard')); ?></h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 w-8">#</th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3">
                            <button wire:click="sortBy('name')" class="flex items-center gap-1 hover:text-ink/80">
                                <?php echo e(__('Agent')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'name'): ?>
                                <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3">
                            <button wire:click="sortBy('conversations')" class="flex items-center gap-1 hover:text-ink/80">
                                <?php echo e(__('Conversations')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'conversations'): ?>
                                <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell">
                            <button wire:click="sortBy('resolved')" class="flex items-center gap-1 hover:text-ink/80">
                                <?php echo e(__('Resolved')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'resolved'): ?>
                                <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden md:table-cell">
                            <button wire:click="sortBy('response_time')" class="flex items-center gap-1 hover:text-ink/80">
                                <?php echo e(__('Avg Response')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'response_time'): ?>
                                <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-3 hidden lg:table-cell">
                            <button wire:click="sortBy('messages')" class="flex items-center gap-1 hover:text-ink/80">
                                <?php echo e(__('Messages Sent')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sortField === 'messages'): ?>
                                <svg class="w-3 h-3 <?php echo e($sortDirection === 'asc' ? '' : 'rotate-180'); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface transition-colors">
                        <td class="px-4 py-3 text-sm font-medium text-muted"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <?php
                                    $colors = ['bg-info/100', 'bg-success/100', 'bg-brand/100', 'bg-pink-500', 'bg-warning/100', 'bg-rose-500', 'bg-violet-500', 'bg-emerald-500'];
                                    $bgColor = $colors[$index % count($colors)];
                                ?>
                                <div class="w-8 h-8 <?php echo e($bgColor); ?> rounded-full flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">
                                    <?php echo e($agent['initials']); ?>

                                </div>
                                <div>
                                    <span class="text-sm font-medium text-ink"><?php echo e($agent['name']); ?></span>
                                    <p class="text-xs text-muted capitalize"><?php echo e($agent['role']); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold text-ink"><?php echo e(number_format($agent['conversations'])); ?></td>
                        <td class="px-4 py-3 text-sm text-muted  hidden md:table-cell"><?php echo e(number_format($agent['resolved'])); ?></td>
                        <td class="px-4 py-3 text-sm text-muted  hidden md:table-cell"><?php echo e($agent['avg_response_formatted']); ?></td>
                        <td class="px-4 py-3 text-sm text-muted  hidden lg:table-cell"><?php echo e(number_format($agent['messages_sent'])); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-sm text-muted"><?php echo e(__('No team members found.')); ?></td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/analytics/team-performance.blade.php ENDPATH**/ ?>