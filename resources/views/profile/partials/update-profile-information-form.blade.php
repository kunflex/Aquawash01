<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>                                

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- === Profile Upload === -->
        <div style="margin-right:6px;display:inline-flex;gap:12px;">
            <div>
                 @php
                    $profile = auth()->user()->profile;
                @endphp
                @if(!empty($profile))
                    <img src="{{Auth::user()->profile}}" name="profile" id="uploadedAvatar" alt="user-avatar" style="border-radius:10px;height:110px;width:110px;">
                @else
                    <img src="{{asset('assets/img/customer01.jpg')}}" name="profile" id="uploadedAvatar" alt="user-avatar" style="border-radius:10px;height:110px;width:110px;">
                @endif
                <p class="text-muted mb-0" style="color:gray;">Allowed JPG or PNG</p>  
            </div>
            <div>
                    <label  for="upload" tabindex="0" style="margin-top:75px;box-shadow:0px 3px 6px #ddd;padding:7px;background-color:blue;color:white;border-radius:6px;">Upload
                        <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="account-image-reset" style="margin-top:75px;box-shadow:0px 3px 6px #ddd;transform:scale(0.9);padding:7px;background-color:darkred;color:white;border-radius:6px;">Remove</button>
            </div>
        </div>
          
       
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
