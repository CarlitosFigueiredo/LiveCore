<?php


use App\Models\Post;
use Livewire\Component;

new class extends Component
{
    public string $title = '';
    public string $content = '';

    public function save(): void
    {
        sleep(1);

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

            <flux:radio.group wire:model="status" label="Status" variant="cards" class="max-sm:flex-col">
                <flux:radio value="draft" label="Draft" description="Post will be saved as draft" checked />
                <flux:radio value="published" label="Published" description="Post will be published immediately" />
            </flux:radio.group>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary" >
                    Create post
                </flux:button>
            </div>
        </form>
    </div>
</div>
