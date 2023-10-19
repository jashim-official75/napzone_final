@extends('frontend.layouts.app')
@section('styles')
@endsection
@section('content')
    <section id="profie_page">
        <div class="profie_inner">
            @if (session('update'))
                <div class="alert alert-success">{{ session('update') }}</div>
            @endif
            <div class="profile_header">
                <h2>User Profile</h2>
                <div class="unsubscribe">
                    <a href="#" class="unsubscribe_btn">Unsubscribe</a>
                </div>
            </div>
            <form action="{{ route('user.profile.update', $subscriber->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile_img">
                    <label for="imageupload">
                        @if ($subscriber->image)
                            <img id="imageshow" src="{{ asset($subscriber->image) }}" alt="">
                        @else
                            <img id="imageshow" src="{{ asset('assets/frontend/img/user.png') }}" alt="">
                        @endif
                        <div class="img_upload_icon">
                            <label for="imageupload"><i class="fas fa-camera"></i></label>
                            <input type="file" name="imageupload" id="imageupload"
                                onchange="document.getElementById('imageshow').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </label>
                </div>
                <div class="update_info">
                    <div class="inputBx">
                        <input type="text" name="username" id="username" value="{{ $subscriber->name }}"
                            placeholder="User Name">
                    </div>
                    <div class="inputBx">
                        <input type="number" id="usernumber" readonly value="{{ $subscriber->phone_num }}"
                            placeholder="Phone Number">
                    </div>
                    <div class="inputBx">
                        <input type="text" id="userid" readonly value="{{ $subscriber->unique_id }}"
                            placeholder="User ID">
                    </div>
                    <div class="save_btn">
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 2000); // 20,000 milliseconds = 20 seconds
    </script>
@endsection
