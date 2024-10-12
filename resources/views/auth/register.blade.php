@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 120px;">
        <h4 class="" style="padding: 20px; text-align: center;">{{ __('Sign Up') }}</h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">

                    @include('notification')

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="registerTabs" role="tablist" style="width: 400px; text-align: center; border-bottom: 2px solid darkcyan;">
                            <li class="nav-item" role="presentation" style="width: 200px;">
                                <a class="nav-link" id="client-tab" href="#" onclick="showTab('client')"><span style="color:black;">Sign as an Client</span></a>
                            </li>
                            <li class="nav-item" role="presentation" style="width: 200px;">
                                <a class="nav-link" id="agent-tab" href="#" onclick="showTab('agent')"><span style="color:black;">Sign as an Agent</span></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="registerTabsContent">
                            <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab" style="padding: 20px;">
                                <form method="POST" action="{{ route('client-signup') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="client">
                                    <div class="row mb-3">
                                        <label for="client-name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client-phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client-picture" class="col-md-4 col-form-label text-md-end">{{ __('Upload Profile Picture') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-picture" type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client-email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client-password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="client-password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="client-password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="button contact_button">
                                                {{ __('Sign Up') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="agent" role="tabpanel" aria-labelledby="agent-tab" style="padding: 20px;">
                                <form method="POST" action="{{ route('agent-signup') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="agent">
                                    <div class="row mb-3">
                                        <label for="agent-name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="profile-picture" class="col-md-4 col-form-label text-md-end">{{ __('Upload Profile Picture') }}</label>
                                        <div class="col-md-6">
                                            <input id="profile-picture" type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nin" class="col-md-4 col-form-label text-md-end">{{ __('Upload NIN') }}</label>
                                        <div class="col-md-6">
                                            <input id="nin" type="file" name="nin_image" class="form-control @error('nin_image') is-invalid @enderror" required>
                                            @error('nin_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="agent-email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-office" class="col-md-4 col-form-label text-md-end">{{ __('Office Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-office" type="text" class="form-control @error('office_address') is-invalid @enderror" name="office_address" value="{{ old('office_address') }}" required autocomplete="office_address" autofocus>
                                            @error('office_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-home" class="col-md-4 col-form-label text-md-end">{{ __('Home Address') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-home" type="text" class="form-control @error('home_address') is-invalid @enderror" name="home_address" value="{{ old('home_address') }}" required autocomplete="home_address" autofocus>
                                            @error('home_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-company-name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-company-name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-company-contact" class="col-md-4 col-form-label text-md-end">{{ __('Company Contact') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-company-contact" type="text" class="form-control @error('company_contact') is-invalid @enderror" name="company_contact" value="{{ old('company_contact') }}" required autocomplete="company_contact" autofocus>
                                            @error('company_contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="agent-password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="agent-password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="button contact_button">
                                                {{ __('Sign up') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('signup-tab')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Check if there is a stored tab in localStorage
                const activeTab = localStorage.getItem('activeTab');

                // If a stored tab exists, show it
                if (activeTab) {
                    showTab(activeTab);
                } else {
                    // Otherwise, show the default tab (client)
                    showTab('client');
                }
            });

            function showTab(tabId) {
                // Remove active class from all nav links
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                    link.classList.remove('bg-info'); // Remove background color
                });

                // Remove active class from all tab panes
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });

                // Add active class to the clicked nav link
                document.getElementById(tabId + '-tab').classList.add('active');
                document.getElementById(tabId + '-tab').classList.add('bg-info'); // Add background color

                // Add active class to the corresponding tab pane
                document.getElementById(tabId).classList.add('show', 'active');

                // Store the selected tab in localStorage
                localStorage.setItem('activeTab', tabId);
            }
        </script>

    @endpush

@endsection
