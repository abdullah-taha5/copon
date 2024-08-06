<div>
    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
    </h6>

    <div class="flex flex-wrap">
        <form wire:submit.prevent="updatePassword" class="w-full">
            

            <div class="form-group px-4 flex items-center">
                <button class="btn btn-indigo mr-3">
                    {{ __('global.save') }}
                </button>

                <div x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="text-sm" style="display: none;">
                    {{ __('global.saved') }}
                </div>

            </div>
        </form>
    </div>
</div>