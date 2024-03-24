<div>
  <form class="position-relative">
    <input wire:model.live="search"  class="form-control py-2" type="search" placeholder="Search for chats" aria-label="Search">
    <button class="btn bg-transparent text-secondary px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
        <i class="bi bi-search fs-5"></i>
    </button>
  </form>
  @foreach($users as $user)
  <button wire:click="Receiver({{$user->id}})" class="nav-link active text-start"  type="button" href="#!">
    chating
  </button>
  @endforeach
</div>