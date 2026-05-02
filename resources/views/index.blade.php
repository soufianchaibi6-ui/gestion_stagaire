<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("hd/style.css") }}">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route("stagair.store") }}">
               {{-- Remplacer toutes les occurrences de right-panel-active par active --}}
                @if ($errors->any())
                    <script>
                        document.getElementById("container").classList.add("active");
                    </script>
                @endif
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="/auth/google" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
                <span>or use your email for registeration</span>
                
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="Prenome" name="prenom" value="{{ old('prenom') }}">
                @error('prenom')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="tel" placeholder="Telephone" name="telephone" value="{{ old('telephone') }}">
                @error('telephone')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Confirm Password" name="password_confirmation">
                
                @error('password')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('stagair.singup') }}">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success" style="color: green; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('ereur'))
                    <div class="alert alert-success" style="color: rgb(241, 7, 7); padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('ereur') }}
                    </div>
                @endif
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="/auth/google" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="email">
                  @error('email')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("hd/script.js") }}"></script>
</body>
</html>