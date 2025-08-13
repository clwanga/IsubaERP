  @props(['title', 'btnText', 'svg_d', 'modal'])

  <div class="w-full border-b-1 border-gray-300 py-3 mb-3 flex flex-row items-center">
      <div class="flex flex-row items-center space-x-2">
          <svg class="size-4 shrink-0 w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $svg_d }}" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
          </svg>
          <h class="uppercase text-sm font-semibold">{{ $title }}</h>


          <button data-modal-toggle="{{ $modal }}" data-modal-target="{{ $modal }}"
              class="absolute right-10 bg-transparent uppercase hover:bg-sky-900 text-sky-900 text-sm font-semibold hover:text-white py-1 px-3 border border-sky-900 hover:border-transparent rounded">
              {{ $btnText }}
          </button>
      </div>
  </div>
