<div class="mt-50px">
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
        {{ $this->totalComments }} Comments
    </h4>
    <ul class="mb-20px">
        @forelse($this->comments as $comment)
            {{-- রিকার্সিভ কম্পোনেন্ট কল করা হচ্ছে --}}
            <x-news.comment-item :comment="$comment" :level="0" :loop="$loop" />
        @empty
            <li class="text-center py-4">No comments yet.</li>
        @endforelse
    </ul>

    @if ($this->comments->hasMorePages())
        <div class="text-center mt-4">
            <button wire:click="loadMore">Load More Comments</button>
        </div>
    @endif
</div>
