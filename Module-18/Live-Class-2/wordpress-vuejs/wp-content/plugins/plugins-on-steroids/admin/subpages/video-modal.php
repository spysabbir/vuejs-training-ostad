<div class="relative" style="z-index:9999;" x-show='$store.settings.videoModal.shouldDisplayModal'>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
      <div @click.outside="$store.settings.videoModal.hide()" class=" relative bg-white rounded-lg text-center overflow-hidden shadow-xl transform transition-all sm:my-8">
        <iframe class="aspect-video" width="860"  :src="$store.settings.videoModal.video" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>