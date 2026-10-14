<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('AI Performance')); ?></h1>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Track AI reply accuracy, confidence, and cost')); ?></p>
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

    
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('AI Replies Sent')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e(number_format($aiRepliesSent)); ?></p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Accuracy')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e($accuracy); ?>%</p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Avg Confidence')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e($avgConfidence); ?>%</p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Escalation Rate')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo e($escalationRate); ?>%</p>
        </div>
        <div class="bg-surface-2 rounded-xl border border-border p-4">
            <p class="text-xs font-medium text-muted uppercase tracking-wider"><?php echo e(__('Total Cost')); ?></p>
            <p class="text-2xl font-bold text-ink mt-1"><?php echo \App\Helpers\CurrencyHelper::display($totalCost); ?></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-5 py-4 border-b border-border">
                <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Performance by Topic')); ?></h3>
                <p class="text-xs text-muted mt-0.5"><?php echo e(__('AI accuracy grouped by conversation tags')); ?></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topicPerformance->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-surface border-b border-border">
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Topic')); ?></th>
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Replies')); ?></th>
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Accuracy')); ?></th>
                            <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Confidence')); ?></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topicPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <tr class="hover:bg-surface">
                            <td class="px-4 py-2.5 text-sm font-medium text-ink"><?php echo e($topic['topic']); ?></td>
                            <td class="px-4 py-2.5 text-sm text-muted "><?php echo e($topic['total']); ?></td>
                            <td class="px-4 py-2.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-16 h-1.5 bg-surface  rounded-full">
                                        <div class="h-full rounded-full <?php echo e($topic['accuracy'] >= 90 ? 'bg-success/100' : ($topic['accuracy'] >= 70 ? 'bg-warning/100' : 'bg-danger/100')); ?>" style="width: <?php echo e($topic['accuracy']); ?>%"></div>
                                    </div>
                                    <span class="text-xs font-medium text-ink/80"><?php echo e($topic['accuracy']); ?>%</span>
                                </div>
                            </td>
                            <td class="px-4 py-2.5 text-sm text-muted "><?php echo e($topic['avg_confidence']); ?>%</td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <div class="px-5 py-8 text-center text-sm text-muted"><?php echo e(__('No AI topic data available for this period.')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
            <div class="px-5 py-4 border-b border-border">
                <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Knowledge Base Gaps')); ?></h3>
                <p class="text-xs text-muted mt-0.5"><?php echo e(__('Queries where AI confidence was below 50%')); ?></p>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kbGaps->count() > 0): ?>
            <div class="divide-y divide-border/60">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $kbGaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <div class="px-5 py-3">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-ink truncate flex-1 mr-3"><?php echo e($gap['subject']); ?></p>
                        <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-danger/15 text-danger flex-shrink-0">
                            <?php echo e($gap['confidence']); ?>% <?php echo e(__('confidence')); ?>

                        </span>
                    </div>
                    <p class="text-xs text-muted mt-0.5"><?php echo e($gap['date']); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php else: ?>
            <div class="px-5 py-8 text-center text-sm text-muted"><?php echo e(__('No low-confidence queries found. AI is performing well.')); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <div class="bg-surface-2 rounded-2xl border border-border overflow-hidden">
        <div class="px-5 py-4 border-b border-border">
            <h3 class="text-sm font-semibold text-ink"><?php echo e(__('Cost Breakdown by Provider & Model')); ?></h3>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($costBreakdown->count() > 0): ?>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-surface border-b border-border">
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Provider')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Model')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Requests')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Tokens In')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Tokens Out')); ?></th>
                        <th class="text-left text-xs font-semibold text-muted uppercase tracking-wider px-4 py-2"><?php echo e(__('Total Cost')); ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border/60">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $costBreakdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <tr class="hover:bg-surface">
                        <td class="px-4 py-2.5 text-sm font-medium text-ink"><?php echo e(ucfirst($row->ai_provider ?? 'Unknown')); ?></td>
                        <td class="px-4 py-2.5 text-sm text-muted "><?php echo e($row->ai_model ?? '--'); ?></td>
                        <td class="px-4 py-2.5 text-sm text-muted "><?php echo e(number_format($row->count)); ?></td>
                        <td class="px-4 py-2.5 text-sm text-muted "><?php echo e(number_format($row->total_tokens_in ?? 0)); ?></td>
                        <td class="px-4 py-2.5 text-sm text-muted "><?php echo e(number_format($row->total_tokens_out ?? 0)); ?></td>
                        <td class="px-4 py-2.5 text-sm font-semibold text-ink"><?php echo \App\Helpers\CurrencyHelper::display($row->total_cost); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="px-5 py-8 text-center text-sm text-muted"><?php echo e(__('No AI cost data recorded for this period.')); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/analytics/ai-performance.blade.php ENDPATH**/ ?>