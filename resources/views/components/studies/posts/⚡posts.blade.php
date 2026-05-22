<?php

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\Post;

new class extends Component
{
    #[Computed]
    protected function posts(): Collection
    {
        return Post::all();
    }
};
?>

<div>
    <div wire:loading.class='opacity-50'
        class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-700 bg-neutral-900 p-6 shadow-lg">

        @if (session('success'))
        <div
            class="mb-4 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm font-medium text-green-400">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-700">
                <thead class="bg-neutral-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-200">
                            Nome
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-neutral-200">
                            Post
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-neutral-800">
                    @foreach ($this->posts as $post)
                    <tr wire:key="{{ $post->id }}" class="transition-colors duration-200 hover:bg-neutral-800">
                        <td class="px-4 py-3 text-sm text-neutral-100">
                            {{ $post->title }}
                        </td>

                        <td class="px-4 py-3 text-sm text-neutral-300">
                            {{ $post->content }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
