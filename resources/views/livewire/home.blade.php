{{-- @extends('layouts.app')

@section('content')
    <livewire:best-sellers />
@endsection --}}

{{-- <div class="space-y-16"> --}}
    <!-- New Arrivals Section -->
    

    <!-- Best Sellers Section -->
    {{-- <livewire:best-sellers /> --}}
{{-- </div> --}}

    

{{-- <livewire:new-arrivals />
<livewire:best-sellers />

<script>
    window.addEventListener('notify', event => {
        alert(event.detail.message);
    });
</script> --}}



<div>
    @include('partials.hero')
    
    <livewire:new-arrivals />
    <livewire:best-sellers />
    <livewire:trending-now />
</div>

