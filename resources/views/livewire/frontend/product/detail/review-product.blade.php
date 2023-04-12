<div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab" wire:ignore.self>
    <form class="theme-form" >
        <div class="form-row row">

            <div class="col-md-12">
                <div class="media-body mb-2">
                    <label for="">Rating</label>
                    <br>
                    @for ($i = 1; $i <= 5; $i++) <i
                        class="{{ $i <= $rating ? 'fa fa-star fa-lg text-warning' : 'fa-regular fa-lg fa-star' }}"
                        wire:click="setRating({{ $i }})" style="cursor:pointer;"></i>
                        @endfor
                </div>
            </div>

            <div class="col-md-6">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukan Nama Lengkap.." required>
            </div>
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Masukan Email.." required>
            </div>
            <div class="col-md-12">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" placeholder="Masukan Judul.." required>
            </div>
            <div class="col-md-12">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" placeholder="Masukan Deskripsi"
                    id="description" rows="6"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-solid" type="submit">Berikan Ulasan</button>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            const updateStars = () => {
                const stars = document.querySelectorAll('.fa-star');
                stars.forEach(star => {
                    star.classList.remove('text-warning');
                    if (star.dataset.rating <= @this.rating) {
                        star.classList.add('text-warning');
                    }
                });
            };

            window.livewire.hook('element.updated', (el, component) => {
                if (component.name === 'star-rating') {
                    updateStars();
                }
            });

            updateStars();
        });
    </script>
    @endpush
</div>
