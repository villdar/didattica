 <div class="flex p-3 md:pt-2 md:mt-4 w-27">
     <h2 class="transform translate-y-2">Cerca nella mappa l'attività didattica di tuo interesse e confrontati con gli strumenti proposti</h2>
 </div>
 <div class="space-x-6 lg:grid lg:grid-cols-2">
     <article class="bg-chord-bg">
         <x-post-featured-card />
     </article>
     <article>
         <x-post-card :posts="$posts" />
     </article>
 </div>
