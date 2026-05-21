<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }
};
?>

<div>
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-700 bg-neutral-900 p-6">

        <button
            type="button"
            wire:click="increment"
            class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-all duration-200 hover:bg-indigo-500 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-neutral-900"
        >
            Increment
        </button>

        <div
            class="mt-4 flex items-center gap-2 rounded-lg border border-neutral-700 bg-neutral-800 px-4 py-3 text-neutral-200"
        >
            <span class="text-sm text-neutral-400">Count:</span>
            <span class="text-lg font-bold text-indigo-400">
                {{ $count }}
            </span>
        </div>
    </div>
</div>
