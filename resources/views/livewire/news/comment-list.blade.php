<div class="mt-50px">
    <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color mb-30px">
        {{ $this->totalComments }} Comments
    </h4>
    <ul class="mb-20px">
        @foreach($this->comments as $comment)
            <x-blog.comment-item :comment="$comment" :level="0" />
        @endforeach
    </ul>

    @if ($this->comments->hasMorePages())
        <button wire:click="loadMore">Load More Comments</button>
    @endif
</div>
