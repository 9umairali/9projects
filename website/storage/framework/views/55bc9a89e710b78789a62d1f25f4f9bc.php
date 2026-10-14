<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Analytics']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Analytics']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div x-data="{ activeTab: 'overview' }" class="space-y-6">
        
        <div class="border-b border-border">
            <nav class="flex gap-6 -mb-px overflow-x-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['overview' => __('Overview'), 'ai' => __('AI Performance'), 'team' => __('Team')]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <button @click="activeTab = '<?php echo e($key); ?>'"
                        :class="activeTab === '<?php echo e($key); ?>' ? 'border-primary-600 text-primary-700' : 'border-transparent text-muted hover:text-ink/80 hover:border-border'"
                        class="pb-3 text-sm font-medium border-b-2 transition-colors whitespace-nowrap flex-shrink-0">
                    <?php echo e($label); ?>

                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </nav>
        </div>

        
        <div x-show="activeTab === 'overview'" x-transition>
            <div x-data="{ loaded: false }" x-init="
                const observer = new MutationObserver((mutations) => {
                    for (const m of mutations) {
                        for (const node of m.addedNodes) {
                            if (node.nodeType === 1 && node.hasAttribute('wire:id')) {
                                loaded = true;
                                observer.disconnect();
                                return;
                            }
                        }
                    }
                });
                observer.observe($el, { childList: true, subtree: true });
                setTimeout(() => { loaded = true; observer.disconnect(); }, 5000);
            ">
                
                <div x-show="!loaded" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="space-y-6">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 4; $i++): ?>
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-5 animate-pulse">
                            <div class="h-4 w-24 bg-gray-200 dark:bg-gray-700 rounded mb-3"></div>
                            <div class="h-7 w-16 bg-gray-200 dark:bg-gray-700 rounded mb-1"></div>
                            <div class="h-3 w-20 bg-gray-200 dark:bg-gray-700 rounded"></div>
                        </div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 2; $i++): ?>
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-6 animate-pulse">
                            <div class="h-5 w-36 bg-gray-200 dark:bg-gray-700 rounded mb-6"></div>
                            <div class="h-56 bg-gray-200 dark:bg-gray-700 rounded-lg"></div>
                        </div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-6 animate-pulse">
                        <div class="h-5 w-44 bg-gray-200 dark:bg-gray-700 rounded mb-6"></div>
                        <div class="h-64 bg-gray-200 dark:bg-gray-700 rounded-lg"></div>
                    </div>
                </div>
                
                <div x-show="loaded" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('analytics.overview-dashboard', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2902428528-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
                </div>
            </div>
        </div>

        
        <div x-show="activeTab === 'ai'" x-transition style="display: none;">
            <div x-data="{ loaded: false }" x-init="
                const observer = new MutationObserver((mutations) => {
                    for (const m of mutations) {
                        for (const node of m.addedNodes) {
                            if (node.nodeType === 1 && node.hasAttribute('wire:id')) {
                                loaded = true;
                                observer.disconnect();
                                return;
                            }
                        }
                    }
                });
                observer.observe($el, { childList: true, subtree: true });
                setTimeout(() => { loaded = true; observer.disconnect(); }, 5000);
            ">
                
                <div x-show="!loaded" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="space-y-6">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 4; $i++): ?>
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-5 animate-pulse">
                            <div class="h-4 w-28 bg-gray-200 dark:bg-gray-700 rounded mb-3"></div>
                            <div class="h-7 w-20 bg-gray-200 dark:bg-gray-700 rounded mb-1"></div>
                            <div class="h-3 w-16 bg-gray-200 dark:bg-gray-700 rounded"></div>
                        </div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-6 animate-pulse">
                            <div class="h-5 w-40 bg-gray-200 dark:bg-gray-700 rounded mb-6"></div>
                            <div class="h-56 bg-gray-200 dark:bg-gray-700 rounded-lg"></div>
                        </div>
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-6 animate-pulse">
                            <div class="h-5 w-36 bg-gray-200 dark:bg-gray-700 rounded mb-6"></div>
                            <div class="space-y-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 5; $i++): ?>
                                <div class="flex items-center gap-3">
                                    <div class="h-3 w-24 bg-gray-200 dark:bg-gray-700 rounded flex-shrink-0"></div>
                                    <div class="h-4 flex-1 bg-gray-200 dark:bg-gray-700 rounded-full"></div>
                                    <div class="h-3 w-10 bg-gray-200 dark:bg-gray-700 rounded flex-shrink-0"></div>
                                </div>
                                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div x-show="loaded" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('analytics.a-i-performance', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2902428528-1', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
                </div>
            </div>
        </div>

        
        <div x-show="activeTab === 'team'" x-transition style="display: none;">
            <div x-data="{ loaded: false }" x-init="
                const observer = new MutationObserver((mutations) => {
                    for (const m of mutations) {
                        for (const node of m.addedNodes) {
                            if (node.nodeType === 1 && node.hasAttribute('wire:id')) {
                                loaded = true;
                                observer.disconnect();
                                return;
                            }
                        }
                    }
                });
                observer.observe($el, { childList: true, subtree: true });
                setTimeout(() => { loaded = true; observer.disconnect(); }, 5000);
            ">
                
                <div x-show="!loaded" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="space-y-6">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 4; $i++): ?>
                        <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 p-5 animate-pulse">
                            <div class="h-4 w-24 bg-gray-200 dark:bg-gray-700 rounded mb-3"></div>
                            <div class="h-7 w-14 bg-gray-200 dark:bg-gray-700 rounded"></div>
                        </div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <div class="bg-surface-2  rounded-xl border border-border dark:border-gray-700 overflow-hidden animate-pulse">
                        <div class="px-6 py-3 border-b border-border dark:border-gray-700 bg-surface ">
                            <div class="h-4 w-28 bg-gray-200 dark:bg-gray-700 rounded"></div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 5; $i++): ?>
                        <div class="flex items-center gap-4 px-6 py-4 border-b border-border dark:border-gray-700/50">
                            <div class="h-10 w-10 bg-gray-200 dark:bg-gray-700 rounded-full flex-shrink-0"></div>
                            <div class="flex-1 space-y-1.5">
                                <div class="h-3.5 w-28 bg-gray-200 dark:bg-gray-700 rounded"></div>
                                <div class="h-3 w-36 bg-gray-200 dark:bg-gray-700 rounded"></div>
                            </div>
                            <div class="h-3.5 w-12 bg-gray-200 dark:bg-gray-700 rounded"></div>
                            <div class="h-3.5 w-16 bg-gray-200 dark:bg-gray-700 rounded"></div>
                            <div class="h-6 w-14 bg-gray-200 dark:bg-gray-700 rounded-full"></div>
                        </div>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
                <div x-show="loaded" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('analytics.team-performance', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-2902428528-2', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH /home/dahimail.com/public_html/resources/views/analytics/index.blade.php ENDPATH**/ ?>