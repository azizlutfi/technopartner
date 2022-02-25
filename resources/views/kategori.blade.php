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

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800 text-center py-auto">Kategori!</h1>

            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- End of Main Content -->
        @component('components.footer')
        @endcomponent

    </div>
    <!-- End of Content Wrapper -->
@endsection