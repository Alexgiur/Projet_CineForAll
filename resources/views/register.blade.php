@extends('Layouts.guest')

@section('title', 'Inscription - CineForAll')

@section('content')
    <!-- J'ai ajouté une classe englobante pour appliquer le style du body original si nécessaire, ou tu peux le gérer dans ton CSS global -->
    <div style="display: flex; justify-content: center; align-items: center; padding: 40px 0;">
        <div class="container-connexion">
            <div class="bloc-branding">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-connexion">
                <h1>Rejoignez CineForAll</h1>
                <p>Créez votre compte pour réserver vos billets en un clic.</p>
            </div>

            <div class="bloc-formulaire">
                <h2>Inscription</h2>

                @if($errors->any())
                    <div style="color: red; background: #fee; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                        <strong>Erreur :</strong>
                        <ul style="margin: 5px 0 0 15px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="login">Identifiant :</label>
                        <input type="text" name="login" id="login" value="{{ old('login') }}" required placeholder="Pseudo">
                        @error('login') <span style="color:red; font-size: 0.8em;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" required placeholder="••••••••">
                        @error('password') <span style="color:red; font-size: 0.8em;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe :</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="••••••••">
                    </div>

                    <button type="submit" class="btn-connexion">S'inscrire</button>
                </form>

                <p style="margin-top: 15px; text-align: center;">
                    Déjà un compte ? <a href="{{ route('login') }}" style="color: var(--primary-color); font-weight: bold;">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
@endsection
