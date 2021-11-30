<x-layout>
    <div class="bg-white">
        <div class="pt-6">
            <nav aria-label="Breadcrumb">
                <ol role="list" class="flex items-center max-w-2xl px-4 mx-auto space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="/" class="mr-2 text-sm font-medium text-gray-900">
                                didattica
                            </a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="/profile" class="mr-2 text-sm font-medium text-gray-900">
                                profile
                            </a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="/profile/{{ $user->username }}" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                            {{ $user->username }}
                        </a>
                    </li>
                </ol>
            </nav>

            <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-4 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="flex space-x-3 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        {{ $user->name }}
                    </h1>
                    <img class="inline-block w-10 h-10 rounded-full ring-2 ring-white" src="{{ $user->getAvatar() }}" alt="">
                </div>

                <div class="mt-4 lg:mt-0 lg:row-span-3">
                    <p class="text-3xl text-gray-900">Livello<span class="ml-2 text-gray-600">{{ 1 + floor($user->comments->count() * 2 + $user->votes->count() * 0.5) / 100 }}</span></p>
                    <div class="mt-6">
                        <div class="flex items-center p-2 text-xs font-bold text-blue-300 uppercase">
                            <div class="flex-1 mr-4 bg-gray-600 rounded-full" style="height: 9px;">
                                <div wire:mode="bar" class="h-full bg-blue-300 rounded-full" style="width: {{ $user->comments->count() * 2 + (($user->votes->count() * 0.5) % 100) }}%;"></div>
                            </div>
                            <span class="text-gray-600">{{ $user->comments->count() * 2 + (($user->votes->count() * 0.5) % 100) }} % EXP</span>
                        </div>
                    </div>
                    <div class="lg:flex space-x-9 lg:pt-6">
                        <div class="">
                            <p class="mt-6 text-2xl text-gray-900">Dati personali</p>
                            <div class="items-center mt-2 space-y-2">
                                <div class="mt-1">
                                    <p class="text-xl text-gray-900">Iscritto:</p>
                                    <p class="text-sm">{{ $user->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    <p class="text-xl text-gray-900">Professione:</p>
                                    <p class="text-sm">{{ ucfirst($user->profession) }}</p>
                                </div>
                                <div>
                                    <p class="text-xl text-gray-900">Ruolo:</p>
                                    <p class="text-sm">{{ ucfirst($user->role) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <p class="mt-6 text-2xl text-gray-900 ">Social:</p>
                            <div class="flex mt-2 mb-8 lg:space-x-8">
                                <div class="space-y-3">
                                    <a href="{{ $user->linkedin }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="#39A2DB">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="space-y-3">
                                    <a href="{{ $user->personalsite }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#39A2DB">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="justify-between lg:flex lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <div class="lg:w-1/2">
                        <h3 class="mb-3">Ultimo commento:</h3>
                        @if (!empty($user->comments->last()))
                            <div class="flex space-x-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#39A2DB">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex space-x-3">
                                        <p class="text-xs text-gray-700">{{ $user->comments->last()->created_at->diffForHumans() }}</p>
                                        <p class="text-xs text-gray-900 hover:text-blue-500"><a href="/posts/{{ $user->comments->last()->post->slug }}">{{ $user->comments->last()->post->title }}</a></p>
                                    </div>
                                    <p class="text-base text-gray-900 lg:w-8/12 line-clamp-2">{{ $user->comments->last()->body }}</p>
                                </div>
                            </div>
                        @else
                            <p class="text-xs">Ancora nessun commento</p>
                        @endif
                    </div>
                    <div class="mt-6 lg:w-1/2 lg:mt-0">
                        <h3 class="mb-3">Ultimo Mi piace:</h3>
                        @if (!empty($user->votes->last()))
                            <div class="flex space-x-2">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#FF7171">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-base text-gray-900 hover:text-blue-500"><a href="/posts/{{ $user->votes->last()->slug }}">{{ $user->votes->last()->title }}</a></p>
                                </div>
                            </div>
                        @else
                            <p class="text-xs">Ancora nessun mi piace</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
