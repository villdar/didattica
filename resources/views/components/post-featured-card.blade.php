@props(['post'])

<div x-data="{ show: true }" @click.away="show = true" class="block">
    <div class="z-50 lg:z-0 lg:hidden">
        <x-toggle class="lg:hidden">
            Grafico
        </x-toggle>
    </div>
    <div x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="items-center w-full">
        <div id="my_dataviz" class="lg:block">
        </div>
    </div>
</div>


{{-- <div id="chart"></div>
<div id="clickerWrapper">
    <div id="progress"></div>
    <div id="clicker">Let's Start</div>
</div>
<div id="buttonWrapper">
    <div id="buttonWrapperInner">
        <div id="skip" class="sideButton">SKIP INTRO</div>
        <div id="reset" class="sideButton">RESET</div>
        <div id="link" class="sideButton"><a href="http://bl.ocks.org/nbremer/raw/94db779237655907b907/" target="_blank">GO TO SOURCE</a></div>
    </div>
</div>
</div> --}}
