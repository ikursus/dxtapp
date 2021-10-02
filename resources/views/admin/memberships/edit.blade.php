@extends('layouts.induk')

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('memberships.update', $membership->id) }}">
                    @csrf
                    @method('PATCH')

                    @include('admin.memberships.form')

                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection

@push('js_custom')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js" integrity="sha512-kZv5Zq4Cj/9aTpjyYFrt7CmyTUlvBday8NGjD9MxJyOY/f2UfRYluKsFzek26XWQaiAp7SZ0ekE7ooL9IYMM2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#description').summernote();
</script>
@endpush

@section('css_custom')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha512-KbfxGgOkkFXdpDCVkrlTYYNXbF2TwlCecJjq1gK5B+BYwVk7DGbpYi4d4+Vulz9h+1wgzJMWqnyHQ+RDAlp8Dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
