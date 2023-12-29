<style>
    .contain {
        padding: 20px;
    }
</style>

<x-guest-layout>
    
    <x-authentication-card>
        
        <x-slot name="logo">
            <img src="{{ asset('/build/assets/icons/icon2.png') }}" alt="Custom Icon" class="block h-12 w-auto" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="user_fname" value="{{ __('User Full Name') }}" />
                <x-input id="user_fname" class="block mt-1 w-full" type="text" name="user_fname" :value="old('user_fname')" required />
            </div>
            
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            

            <div class="mt-4">
                <x-label for="user_location" value="{{ __('User Address') }}" />
                <x-input id="user_location" class="block mt-1 w-full" type="text" name="user_location" :value="old('user_location')" required />
            </div>

            <div class="mt-4">
                <x-label for="user_phoneno" value="{{ __('User Phone Number') }}" />
                <x-input id="user_phoneno" class="block mt-1 w-full" type="text" name="user_phoneno" :value="old('user_phoneno')" required />
            </div>

            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service', [
                                    'terms_of_service' => '<a href="#" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="showTermsModal()">'.__('Terms & Conditions').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>

            <!-- Modal for Terms -->
            <div id="termsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full">
                <div class="contain" style="padding: 2rem; max-width: 36rem; margin-left: auto; margin-right: auto; background-color: white; border-radius: 0.375rem; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); margin-top: 2rem; margin-bottom: 2rem;">
                    <h2 class="text-2xl font-bold mb-4 mx-auto">Terms and Conditions</h2>

                    <ol class="list-decimal pl-6 mx-auto">
                        <br><li><strong>1. Acceptance of Terms</strong><br>
                            By registering and using our services, you agree to comply with and be bound by the following terms and conditions. If you do not agree to these terms, please do not use our services.</li>

                        <br><li><strong>2. User Eligibility</strong><br>
                            You must be at least 18 years old to use our services. By using our services, you represent and warrant that you are at least 18 years old.</li>

                        <br><li><strong>3. User Registration</strong><br>
                            You agree to provide accurate and complete information during the registration process. You are solely responsible for maintaining the confidentiality of your account and password.</li>

                        <br><li><strong>4. User Content</strong><br>
                            You are solely responsible for the content you submit or display on our platform. You agree not to submit content that is unlawful, offensive, or violates any third-party rights.</li>

                        <br><li><strong>5. Privacy</strong><br>
                            Our privacy policy outlines how we collect, use, and protect your personal information in compliance with the Personal Data Protection Act 2010 (PDPA). By using our services, you consent to the collection and use of your information as described in our privacy policy.</li>

                        <br><li><strong>6. Intellectual Property</strong><br>
                            All content and materials on our platform, including but not limited to text, graphics, logos, and software, are the property of Muar-in-Motion and are protected by intellectual property laws.</li>

                        <br><li><strong>7. Termination</strong><br>
                            We reserve the right to terminate or suspend your account at any time without notice if you violate these terms and conditions.</li>

                        <br><li><strong>8. Limitation of Liability</strong><br>
                            We are not liable for any direct, indirect, incidental, special, or consequential damages arising out of or in any way connected with the use of our services.</li>

                        <br><li><strong>9. Changes to Terms</strong><br>
                            We reserve the right to modify these terms and conditions at any time. It is your responsibility to review these terms periodically for changes.</li>

                        <br><li><strong>10. Governing Law</strong><br>
                            These terms and conditions are governed by and construed in accordance with the laws of Malaysia. Any dispute arising out of or in connection with these terms shall be subject to the exclusive jurisdiction of the Malaysian courts.</li>
                    </ol>

                    <p class="mt-4"><strong>Contact Information:</strong><br>
                        If you have any questions or concerns about these terms and conditions, please contact us at <a href="mailto:abc@gmail.com">abc@gmail.com</a>.</p>

                    <button onclick="closeModal('termsModal')" class="mt-4 text-blue-500">Close</button>
                </div>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        
    </x-authentication-card>

    <script>
        function showTermsModal() {
            document.getElementById('termsModal').classList.remove('hidden');
        }

        // Add logic to close the modal when clicking outside or on a close button
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('bg-opacity-50')) {
                closeModal('termsModal');
            }
        });
    </script>
</x-guest-layout>
