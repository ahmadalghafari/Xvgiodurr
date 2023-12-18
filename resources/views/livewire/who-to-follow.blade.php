<div class="card-body">
    <!-- Connection item START -->
    <div class="hstack gap-2 mb-3">
        <!-- Avatar -->
        <div class="avatar">
            <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/04.jpg')}}" alt=""></a>
        </div>
        <!-- Title -->
        <div class="overflow-hidden">
            <a class="h6 mb-0" href="#!">Judy Nguyen </a>
            <p class="mb-0 small text-truncate">News anchor</p>
        </div>
        <!-- Button -->
        <button wire:click="toggleFollow" class="btn btn-primary-soft rounded-circle icon-md ms-auto"><i class="fa-solid fa-plus"> </i></button>
    </div>
    <!-- Connection item END -->

    <!-- View more button -->
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
    </div>
</div>
