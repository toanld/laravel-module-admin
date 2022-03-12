<div class="message">
    @if (session()->has('success'))

        <div
            x-data="{show:true}"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            @click.away="show = false" x-on:click="show=false" style="display: none"
            x-transition:enter="transition ease-out origin-top-left duration-200"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition origin-top-left ease-in duration-100"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="fixed top-12 right-2  w-100 z-50 flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
            <!-- icons -->
            <div class="text-green-500 rounded-full bg-white mr-3">
                <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                </svg>
            </div>
            <!-- message -->
            <div class="text-white max-w-xs" >{!! session('success')  !!}</div>

        </div>
    @endif

    <div x-data="{show:false,message:null}" x-show="show"
         x-on:success.window="show=true;message=$event.detail; setTimeout(() => show = false,3000)"
         @click.away="show = false" x-on:click="show=false" style="display: none"
         x-transition:enter="transition ease-out origin-top-left duration-200"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition origin-top-left ease-in duration-100"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="fixed top-12 right-2  w-100 z-50 flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
        <!-- icons -->
        <div class="text-green-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
            </svg>
        </div>
        <!-- message -->
        <div class="text-white max-w-xs" x-text="message">Alert</div>
    </div>

    <!-- Toast Notification Info -->
    <div x-data="{show:false,message:null}" x-show="show"
         x-on:info.window="show=true;message=$event.detail; setTimeout(() => show = false,2000)"
         @click.away="show = false" x-on:click="show=false" style="display: none"
         x-transition:enter="transition ease-out origin-top-left duration-200"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition origin-top-left ease-in duration-100"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="fixed top-12 right-2 z-50 flex items-center bg-blue-400 border-l-4 border-blue-700 py-2 px-3 shadow-md mb-2">
        <!-- icons -->
        <div class="text-blue-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-info" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                <circle cx="8" cy="4.5" r="1"/>
            </svg>
        </div>
        <!-- message -->
        <div class="text-white max-w-xs" x-text="message">Alert</div>
    </div>

    <!-- Toast Notification Warning -->
    <div x-data="{show:false,message:null}" x-show="show"
         x-on:warning.window="show=true;message=$event.detail; setTimeout(() => show = false,4000)"
         @click.away="show = false" x-on:click="show=false" style="display: none"
         x-transition:enter="transition ease-out origin-top-left duration-200"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition origin-top-left ease-in duration-100"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="fixed top-12 right-2 z-50 flex items-center bg-yellow-400 border-l-4 border-yellow-700 py-2 px-3 shadow-md mb-2">
        <!-- icons -->
        <div class="text-yellow-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-exclamation" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
        </div>
        <!-- message -->
        <div class="text-white max-w-xs" x-text="message">Alert</div>
    </div>

    <!-- Toast Notification Danger -->
    <div x-data="{show:false,message:null}" x-show="show"
         x-on:error.window="show=true;message=$event.detail; setTimeout(() => show = false,5000)"
         @click.away="show = false" x-on:click="show=false" style="display: none"
         x-transition:enter="transition ease-out origin-top-left duration-200"
         x-transition:enter-start="opacity-0 transform scale-90"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition origin-top-left ease-in duration-100"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90"
         class="position-fixed w-100 z-50 flex items-center bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2">
        <!-- icons -->
        <div class="text-red-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd"
                      d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
            </svg>
        </div>
        <!-- message -->
        <div class="text-white max-w-xs" x-text="message">alert</div>
    </div>
    <script>
        window.addEventListener('alert', function (e) {
            alert(e.detail);
        });
    </script>

</div>

