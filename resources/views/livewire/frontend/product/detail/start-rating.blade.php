<div class="col-md-12">
    <div class="media-body mb-2">
            @for ($i = 1; $i <= 5; $i++) <i class="{{ $i <= $rating ? 'fa fa-star fa-lg text-warning' : 'fa-regular fa-lg fa-star' }}"
                wire:click="setRating({{ $i }})" style="cursor:pointer;"></i>
                @endfor
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
                window.livewire.hook('element.updated', (el, component) => {
                    if (component.name === 'star-rating') {
                        const stars = el.querySelectorAll('.fa-star');
                        stars.forEach(star => {
                            star.classList.remove('text-warning');
                            if (star.dataset.rating <= component.get('rating')) {
                                star.classList.add('text-warning');
                            }
                        });
                    }
                });
            });
    </script>
    @endpush
</div>
