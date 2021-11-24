<div wire:model="votes">
    @if (empty($votes))
        Ancora nessun mi piace
    @else
        @foreach ($votes as $vote)
            <div class="p-5 border-r-2 border-red-300 border-dotted">
                    <h4 class="text-lg">Hai messo mi piace a: </h4>
                    <div class="p-6 m-6 space-y-2 bg-gray-100 border border-gray-200 w-12/12 rounded-xl">
                        <div class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#FE8F8F">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <a href="/posts/{{ $vote->post->slug }}" class="hover:text-blue-400">{{ $vote->post->title }}</a>
                        </div>
                        <span class="ml-12 text-xs">{{ $vote->created_at->diffForHumans() }}</span>
                    </div>
            </div>
        @endforeach
    @endif
</div>
