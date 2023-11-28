 <div class="flex p-3 md:pt-2 md:mt-4 w-27">
     <h2 class="transform translate-y-2">Ogni giorno uno strumento nuovo col <a href="https://ladigitale.dev/digiquiz/q/6560add1740ff/">Calendario dell'avvento di Didattic@</a></h2>
     <h2 class="transform translate-y-2">Scopri gli strumenti digitali più adatti alle attività didattiche di tuo interesse. Registrati per tenere traccia dei tuoi strumenti preferiti e condividere commenti. Questo ti aiuterà a scoprire nuovi modi di arricchire il tuo insegnamento attraverso gli strumenti digitali.</h2>
 </div>
 <div class="space-x-6 lg:grid lg:grid-cols-2">
     <article class="bg-chord-bg">
         <x-post-featured-card />
     </article>
     <article>
         <x-post-card :posts="$posts" />
     </article>
 </div>
