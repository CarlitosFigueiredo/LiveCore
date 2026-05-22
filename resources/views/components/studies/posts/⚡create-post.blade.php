<?php


use App\Models\Post;
use Livewire\Component;

new class extends Component
{
    public string $title = '';
    public string $content = '';

    public function save(): void
    {
        Post::create($this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]));

        session()->flash('success', 'Post created successfully!');

        $this->redirect('/posts');
    }
};
?>

<div wire:loading.class='opacity-50'>

    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-700 bg-neutral-900 p-6">

        <form wire:submit="save"
            class="w-96 space-y-6 mt-4 rounded-lg border border-neutral-700 bg-neutral-800 px-4 py-3 text-neutral-200">
            <flux:input wire:model='title' label='Title' />

            <flux:textarea wire:model='content' label='Content' />

            <button type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-all duration-200 hover:bg-indigo-500 active:scale-95 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-neutral-900">
                Save
            </button>
        </form>
    </div>
</div>
