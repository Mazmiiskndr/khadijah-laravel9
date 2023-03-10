<div class="form-inline float-right">
    <div class="form-group">
        <input wire:model.debounce.10ms="keyword" onkeydown="if(event.keyCode == 13) {event.preventDefault();}" type="text" class="form-control" placeholder="Cari..." style="width:400px;" autofocus>
    </div>

</div>
