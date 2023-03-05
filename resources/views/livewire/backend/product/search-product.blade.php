<div>
    <form>
        <div class="form-group m-0">
            <input wire:model.debounce.10ms="keyword" class="form-control" type="search" placeholder="Search.."
                data-original-title="" title="" onkeydown="if(event.keyCode == 13) {event.preventDefault();}">
                <i class="fa fa-search"></i>
        </div>
    </form>
</div>
