<div>
    @if($showChat)
    <div class="mt-11 pb-15 px-16 xl:px-20 h-[72vh] lg:h-[78vh] overflow-y-auto overflow-x-hidden">
        {{-- <div class="p-2 ms-0 fixed top-14 left-[23vw] xs:left-[80vw] sm:left-[30.5vw] lg:left-[25.5vw] w-[66vw] xs:w-[50vw] sm:w-[80vw] lg:w-[77vw] xl:w-[78vw] z-50"> --}}
        <div class="p-2 ms-0 fixed top-14 left-[70vw] sm:left-[46vw] md:left-[32vw] lg:left-[25.5vw] xl:left-[23vw] w-full z-50"> 
            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200  bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Chat
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                {{$uname}}
                            </a>
                        </div>
                    </li>
                
                </ol>
            </nav>
        </div>
        <div wire:poll.visible class="relative">
            @php($date='')
            @foreach($models as $row)
                @if(date('Y-m-d',strtotime($date))!=date('Y-m-d',strtotime($row->created_at)))
                    <span class="badge badge-neutral my-14 mx-80">{{ date('d/m/Y',strtotime($row->created_at)) }}</span>
                @endif

                <div id="message_{{ $row->id }}" wire:key='{{ $row->id }}' class="chat {{ $row->from_user_id==auth()->id() ? 'chat-end' : 'chat-start' }}" x-init='document.getElementById("message_last").scrollIntoView({ behavior: "smooth", block: "end", inline: "nearest" })'>
                    <div class="chat-header">
                    {{ optional($row->sender)->name }}
                    <time class="text-xs opacity-50">{{ date('H:i',strtotime($row->created_at)) }}</time>
                    </div>
                    <div class="chat-bubble">{{ $row->content }}</div>
                    <div class="chat-footer opacity-50">
                    Delivered
                    </div>
                </div>
             
                @php($date=$row->created_at)
            @endforeach
            <div id="message_last">&nbsp;</div>
        </div>
    </div>
    
    <form class="p-2 ms-0 fixed bottom-0 bg-gray-700 w-full md:w-[66vw] lg:w-[75vw] xl:w-[77vw]" wire:submit.prevent='send'>
        <div class="join">
            <input class="input input-bordered join-item sm:w-[80vw] md:w-[58vw] lg:w-[69vw] xl:w-[71vw]" placeholder="Type a message" wire:model='message' autofocus />
            <button type="submit" class="btn join-item rounded-r-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                </svg>
            </button>
          </div>
    </form>
    @endif
</div>