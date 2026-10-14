<div class="space-y-6" wire:poll.keep-alive.3s="refreshInbox">

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="p-3 bg-success/10 border border-success/20 text-success rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="opacity-60 hover:opacity-100">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)"
         class="p-3 bg-danger/10 border border-danger/20 text-danger rounded-xl text-sm flex items-center justify-between">
        <span><?php echo e(session('error')); ?></span>
        <button @click="show = false" class="opacity-60 hover:opacity-100">&times;</button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-ink"><?php echo e(__('Temp Mail')); ?></h1>
            <p class="text-sm text-muted mt-0.5"><?php echo e(__('Generate disposable email addresses for testing and privacy.')); ?></p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-brand bg-brand/10 border border-brand/20 rounded-xl">
                <?php echo e($this->planUsage['used']); ?> / <?php echo e($this->planUsage['unlimited'] ? __('Unlimited') : $this->planUsage['limit']); ?> <?php echo e(__('addresses')); ?>

            </span>
            <button wire:click="$toggle('showHistory')" class="btn-secondary text-sm">
                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <?php echo e($showHistory ? __('Active') : __('History')); ?>

            </button>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showHistory && $this->activeAddresses->isNotEmpty()): ?>
    <div class="panel p-4">
        <div class="space-y-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->activeAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <?php
                    // Expired rows keep a red selection highlight — using
                    // the same brand-blue/green for "selected + expired"
                    // as for "selected + active" made the two look
                    // identical, so the user couldn't tell the chosen
                    // address was dead.
                    $isActiveSel = $this->activeAddressId === $addr->id;
                    $isExpired   = $addr->isExpired();
                    if ($isActiveSel && $isExpired) {
                        $btnCls = 'bg-danger/10 border-danger/40 text-danger';
                    } elseif ($isActiveSel) {
                        $btnCls = 'bg-brand/10 border-brand/30 text-brand';
                    } else {
                        $btnCls = 'bg-surface border-border text-ink hover:border-border';
                    }
                ?>
            <button wire:click="selectAddress(<?php echo e($addr->id); ?>)"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all border text-left <?php echo e($btnCls); ?>">
                <span class="w-2 h-2 rounded-full shrink-0 <?php echo e($isExpired ? 'bg-danger' : ($addr->remainingMinutes() < 60 ? 'bg-warning' : 'bg-success')); ?>"></span>
                <span class="font-mono text-xs flex-1 truncate <?php echo e($isExpired ? 'line-through opacity-70' : ''); ?>"><?php echo e($addr->full_address); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($addr->messages_count > 0): ?>
                <span class="inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1 text-[10px] font-bold rounded-full <?php echo e($isExpired ? 'bg-danger' : 'bg-brand'); ?> text-white"><?php echo e($addr->messages_count); ?></span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="text-[10px] shrink-0 font-semibold <?php echo e($isExpired ? 'text-danger' : 'text-muted'); ?>"><?php echo e($isExpired ? __('Expired') : $addr->remainingTime()); ?></span>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->selectedAddress): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->selectedAddress->isExpired()): ?>
    
    <div class="p-4 rounded-xl bg-danger/10 border border-danger/30 flex items-start gap-3">
        <svg class="w-5 h-5 text-danger shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M4.93 19h14.14a2 2 0 001.74-2.99l-7.07-12.04a2 2 0 00-3.48 0L3.19 16.01A2 2 0 004.93 19z"/></svg>
        <div class="flex-1">
            <p class="text-sm font-bold text-danger"><?php echo e(__('This address has expired')); ?></p>
            <p class="text-xs text-danger/80 mt-0.5"><?php echo e(__("Any mail sent to it now will be rejected. Click Change above to generate a new live address.")); ?></p>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
    
    <div class="panel p-6 text-center lg:col-span-4" x-data="{
        qrOpen: false,
        copied: false,
        copyAddress() {
            const addr = '<?php echo e($this->selectedAddress->full_address); ?>';
            navigator.clipboard.writeText(addr).then(() => {
                this.copied = true;
                setTimeout(() => { this.copied = false }, 1500);
            }).catch(() => {
                // Clipboard API can fail on non-HTTPS/older browsers —
                // fall back to a hidden textarea + execCommand so the
                // user still gets visible confirmation.
                const ta = document.createElement('textarea');
                ta.value = addr;
                document.body.appendChild(ta);
                ta.select();
                try { document.execCommand('copy'); this.copied = true; setTimeout(() => { this.copied = false }, 1500); } catch (e) {}
                document.body.removeChild(ta);
            });
        }
    }">
        <h2 class="text-base font-semibold tracking-wide text-ink uppercase mb-4"><?php echo e(__('Your Temporary Email Address')); ?></h2>
        <div class="flex items-center justify-center gap-2 flex-wrap relative">
            <div class="flex-1 max-w-md flex items-center gap-2 px-5 py-3 rounded-full bg-surface border border-border">
                <input type="text" readonly value="<?php echo e($this->selectedAddress->full_address); ?>"
                       class="flex-1 bg-transparent text-center text-base font-mono font-semibold text-brand focus:outline-none" />
                <button @click="qrOpen = true" title="<?php echo e(__('Show QR')); ?>" class="shrink-0 w-8 h-8 rounded-full bg-surface-2 border border-border flex items-center justify-center text-muted hover:text-ink transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h2m-2 4h2m2-4h2m-2 4h2"/></svg>
                </button>
            </div>
            <button
                @click="copyAddress()"
                :title="copied ? '<?php echo e(__('Copied!')); ?>' : '<?php echo e(__('Copy address')); ?>'"
                class="shrink-0 w-11 h-11 rounded-full text-white flex items-center justify-center transition shadow-soft"
                :class="copied ? 'bg-brand' : 'bg-success hover:opacity-90'">
                
                <svg x-show="!copied" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                
                <svg x-show="copied" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </button>

            
            <span x-show="copied" x-cloak
                  x-transition:enter="transition ease-out duration-150"
                  x-transition:enter-start="opacity-0 translate-y-1"
                  x-transition:enter-end="opacity-100 translate-y-0"
                  class="absolute -top-6 right-0 px-2.5 py-1 rounded-md bg-brand text-white text-[11px] font-bold shadow-soft pointer-events-none">
                <?php echo e(__('Copied!')); ?>

            </span>
        </div>
        <p class="text-xs text-muted mt-5 max-w-xl mx-auto leading-relaxed">
            <?php echo e(__('Forget about spam, advertising mailings, hacking and attacking robots. Keep your real mailbox clean and secure. Temp Mail provides temporary, secure, anonymous, free, disposable email address.')); ?>

        </p>

        
        <p class="text-[11px] text-muted mt-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->selectedAddress->label): ?> <?php echo e($this->selectedAddress->label); ?> · <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php echo e($this->selectedAddress->isExpired() ? __('Expired') : __('Expires') . ' ' . $this->selectedAddress->expires_at->diffForHumans()); ?>

            · <?php echo e($this->selectedAddress->messages_count); ?> <?php echo e(__('message(s)')); ?>

        </p>

        
        <div x-show="qrOpen" x-cloak @click.self="qrOpen = false"
             class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/70 backdrop-blur-sm px-4">
            <div class="rounded-2xl bg-white p-6 max-w-xs w-full text-center">
                <h3 class="text-sm font-bold text-gray-800 mb-3"><?php echo e(__('Scan to copy')); ?></h3>
                <img class="mx-auto" alt="QR"
                     src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=<?php echo e(urlencode($this->selectedAddress->full_address)); ?>" />
                <p class="text-xs font-mono text-gray-600 mt-3 break-all"><?php echo e($this->selectedAddress->full_address); ?></p>
                <button @click="qrOpen = false" class="mt-4 btn-secondary w-full"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>

    
    <div class="panel p-6 space-y-4 lg:col-span-8">
    
    <div class="flex flex-wrap items-center justify-center gap-3">
        <button
            onclick="var btn=this;navigator.clipboard.writeText('<?php echo e($this->selectedAddress->full_address); ?>').then(function(){var l=btn.querySelector('.lbl');var old=l.textContent;l.textContent='<?php echo e(__('Copied!')); ?>';setTimeout(function(){l.textContent=old},1500)})"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-2 border border-border text-sm font-semibold text-ink hover:bg-surface transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            <span class="lbl"><?php echo e(__('Copy')); ?></span>
        </button>
        <button wire:click="syncNow"
                wire:loading.attr="disabled"
                wire:target="syncNow"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-2 border border-border text-sm font-semibold text-ink hover:bg-surface transition">
            <svg wire:loading.remove wire:target="syncNow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            <svg wire:loading wire:target="syncNow" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
            <span wire:loading.remove wire:target="syncNow"><?php echo e(__('Refresh')); ?></span>
            <span wire:loading wire:target="syncNow"><?php echo e(__('Syncing…')); ?></span>
        </button>
        <button wire:click="generateAddress"
                wire:loading.attr="disabled"
                wire:target="generateAddress"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-2 border border-border text-sm font-semibold text-ink hover:bg-surface transition">
            <svg wire:loading.remove wire:target="generateAddress" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
            <svg wire:loading wire:target="generateAddress" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
            <?php echo e(__('Change')); ?>

        </button>
        <button wire:click="deleteAddress(<?php echo e($this->selectedAddress->id); ?>)"
                wire:confirm="<?php echo e(__('Delete this address and all messages?')); ?>"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-surface-2 border border-border text-sm font-semibold text-danger hover:bg-danger/10 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            <?php echo e(__('Delete')); ?>

        </button>
    </div>

    
    <?php $hasInboxContent = $this->selectedMessageDetail || $this->messages->isNotEmpty(); ?>
    
    <div class="<?php echo e($hasInboxContent ? 'rounded-xl border border-border overflow-hidden' : ''); ?>">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->selectedMessageDetail): ?>
            
            <div class="flex items-center justify-between px-5 py-3 border-b border-border bg-surface/40">
                <button wire:click="$set('selectedMessageId', null)"
                        class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-ink hover:text-brand transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    <?php echo e(__('Back to list')); ?>

                </button>
                <div class="flex items-center gap-4">
                    <button onclick="window.open('data:text/html;charset=utf-8,' + encodeURIComponent(document.getElementById('tm-msg-src').value), '_blank')"
                            class="text-xs font-bold uppercase tracking-wider text-ink hover:text-brand transition"><?php echo e(__('Source')); ?></button>
                </div>
            </div>
            <textarea id="tm-msg-src" class="hidden"><?php echo e($this->selectedMessageDetail->body_html ?: $this->selectedMessageDetail->body_text); ?></textarea>

            <div class="px-6 py-5 border-b border-border">
                <div class="flex items-center gap-3">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand/10 text-brand text-xs font-bold">
                        <?php echo e(strtoupper(substr($this->selectedMessageDetail->from_name ?: $this->selectedMessageDetail->from_email, 0, 2))); ?>

                    </span>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-ink truncate"><?php echo e($this->selectedMessageDetail->from_name ?: __('Unknown')); ?></p>
                        <p class="text-xs text-muted truncate"><?php echo e($this->selectedMessageDetail->from_email); ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-muted"><?php echo e(__('Date')); ?></p>
                        <p class="text-xs text-ink"><?php echo e($this->selectedMessageDetail->created_at->format('d-m-Y H:i:s')); ?></p>
                    </div>
                </div>
                <div class="mt-4 flex items-center gap-2">
                    <span class="text-xs text-muted"><?php echo e(__('Subject')); ?>:</span>
                    <span class="text-sm font-medium text-ink"><?php echo e($this->selectedMessageDetail->subject ?: __('(No Subject)')); ?></span>
                </div>
            </div>

            <div class="px-6 py-5">
                <div class="prose prose-sm max-w-none text-ink">
                    <?php echo $this->selectedMessageDetail->safe_body_html ?? nl2br(e($this->selectedMessageDetail->body_text ?? '')); ?>

                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($this->selectedMessageDetail->attachments && $this->selectedMessageDetail->attachments->isNotEmpty()): ?>
                <div class="mt-6 pt-4 border-t border-border">
                    <p class="text-xs font-bold text-muted uppercase tracking-wider mb-3"><?php echo e(__('Attachments')); ?> (<?php echo e($this->selectedMessageDetail->attachments->count()); ?>)</p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->selectedMessageDetail->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <div class="flex items-center gap-3 p-3 bg-surface-2 rounded-xl border border-border mb-2">
                        <svg class="w-5 h-5 text-muted shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                        <p class="text-xs font-medium text-ink truncate flex-1"><?php echo e($att->file_name ?? $att->filename ?? __('Attachment')); ?></p>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php elseif($this->messages->isNotEmpty()): ?>
            
            <div class="flex items-center px-5 py-2 border-b border-border bg-surface/40 text-[11px] font-bold uppercase tracking-wider text-muted">
                <span style="flex: 1 1 0%; min-width: 0;"><?php echo e(__('Sender')); ?></span>
                <span style="flex: 1.5 1 0%; min-width: 0;"><?php echo e(__('Subject')); ?></span>
                <span class="text-right" style="width: 60px; flex-shrink: 0;"><?php echo e(__('View')); ?></span>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <button wire:click="selectMessage(<?php echo e($msg->id); ?>)"
                    class="w-full flex items-center px-5 py-2.5 border-b border-border/40 hover:bg-surface-2 transition text-left">
                
                <div class="flex items-center gap-3" style="flex: 1 1 0%; min-width: 0;">
                    <span class="w-1.5 h-1.5 rounded-full bg-success shrink-0"></span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-ink truncate"><?php echo e($msg->from_name ?: __('Unknown')); ?></p>
                        <p class="text-[11px] text-muted truncate"><?php echo e($msg->from_email); ?></p>
                    </div>
                </div>
                
                <p class="text-sm text-ink truncate" style="flex: 1.5 1 0%; min-width: 0;"><?php echo e($msg->subject ?: __('(No Subject)')); ?></p>
                
                <div class="flex justify-end" style="width: 60px; flex-shrink: 0;">
                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <?php else: ?>
            
            <div class="px-6 py-8 text-center space-y-1.5">
                <p class="text-sm font-semibold text-muted"><?php echo e(__('No messages yet')); ?></p>
                <p class="text-[12px] text-muted/70">
                    <?php echo e(__('Send an email to')); ?>

                    <span class="font-mono font-semibold text-ink"><?php echo e($this->selectedAddress->full_address); ?></span>
                    <?php echo e(__('and it will appear here.')); ?>

                </p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    </div> 
    </div> 

    <?php else: ?>
    <div class="panel p-0 overflow-hidden">
        <div class="p-16 text-center">
            <svg class="w-14 h-14 text-muted/15 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <p class="text-lg font-semibold text-muted"><?php echo e(__('Temp Mail')); ?></p>
            <p class="text-sm text-muted/50 mt-1"><?php echo e(__('Generate a disposable email address to get started')); ?></p>
            <button wire:click="generateAddress" class="btn-primary mt-4">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <?php echo e(__('Generate Address')); ?>

            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showGenerator): ?>
    <template x-teleport="body">
        <div class="fixed inset-0 z-[9999] flex items-center justify-center px-4" x-transition>
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm" wire:click="$set('showGenerator', false)"></div>
            <div class="relative w-full max-w-md rounded-2xl border border-border bg-surface-2 shadow-soft overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-border">
                    <h3 class="text-lg font-bold text-ink"><?php echo e(__('Generate Temp Email')); ?></h3>
                    <p class="text-sm text-muted mt-1"><?php echo e(__('Create a new disposable email address.')); ?></p>
                </div>
                <div class="px-6 py-5 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Domain')); ?></label>
                        <select wire:model="selectedDomainId" class="input-field">
                            <option value=""><?php echo e(__('Random domain')); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->availableDomains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                            <option value="<?php echo e($d->id); ?>"><?php echo e($d->domain); ?></option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink mb-1.5"><?php echo e(__('Label (optional)')); ?></label>
                        <input wire:model="addressLabel" type="text" class="input-field" placeholder="<?php echo e(__('e.g. Newsletter test')); ?>">
                    </div>
                </div>
                <div class="px-6 py-4 bg-surface border-t border-border flex justify-end gap-2">
                    <button wire:click="$set('showGenerator', false)" class="btn-secondary"><?php echo e(__('Cancel')); ?></button>
                    <button wire:click="generateAddress" class="btn-primary"><?php echo e(__('Generate')); ?></button>
                </div>
            </div>
        </div>
    </template>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH /home/dahimail.com/public_html/resources/views/livewire/temp-mail/temp-mail-page.blade.php ENDPATH**/ ?>