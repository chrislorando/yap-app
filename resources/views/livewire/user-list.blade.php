<section class="mt-16 pb-28 h-[90vh] overflow-y-auto ">
  <div wire:poll.visible class="relative">
      @foreach($models as $row)
      <div wire:key='{{ $row->id }}' class="border-b border-gray-500 cursor-pointer {{ $isActiveChat==$row->id ? 'bg-slate-800' : '' }}" wire:click='chat({{ $row->id }})' >
          <div class="px-4 py-5 ">
              <div class="flex space-x-3">
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full" src="https://avatars.githubusercontent.com/u/167683279?v=4" alt="">
                </div>
                <div class="min-w-0 flex-1">
                  <p class="text-sm font-medium">
                    <a href="#" class="hover:underline">{{ $row->name }}</a>
                  </p>
                  <p class="text-sm text-gray-500">
                    <span href="#" class="hover:underline">{{ $row->lastMessage($row->id) }}</span>
                  </p>
                </div>
                <div class="flex flex-shrink-0 self-center">
                  <div class="relative inline-block text-left">
                    <div>
                      <button type="button" class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open options</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</section>