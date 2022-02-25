@extends('layouts.main_layout')

@section('sidebar')
    @component('components.sidebar', ['active' => 'kategori'])
    @endcomponent
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @component('components.navbar')
            @endcomponent

            @component('components.category_list', ['in' => $in, 'out' => $out])
            @endcomponent

        </div>

        <!-- End of Main Content -->
        @component('components.footer')
        @endcomponent

    </div>
    <!-- End of Content Wrapper -->
    @component('components.modal_edit_kategori')
    @endcomponent

@endsection