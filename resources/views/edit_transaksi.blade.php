@extends('layouts.main_layout')

@section('sidebar')
    @component('components.sidebar', ['active' => 'transaksi'])
    @endcomponent
@endsection

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @component('components.navbar')
            @endcomponent

            @component('components.form_edit_transaction', ['transaction' => $transaction, 'cat'=> $category])
            @endcomponent
        </div>

        <!-- End of Main Content -->
        @component('components.footer')
        @endcomponent

    </div>
    <!-- End of Content Wrapper -->
@endsection