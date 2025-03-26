@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-white text-center py-4 border-bottom-0">
                    <img src="{{asset('app-assets/images/logo/iug.png')}}" alt="IUG Logo" class="mb-3" style="height: 80px;">
                    <h4 class="fw-bold text-success">{{ __('Vérification de votre adresse email') }}</h4>
                </div>

                <div class="card-body p-4 text-center">
                    @if (session('status'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <i class="fas fa-envelope-open-text text-success" style="font-size: 64px;"></i>
                    </div>

                    <h5 class="mb-3">{{ __('Merci pour votre inscription !') }}</h5>

                    <p class="mb-4">{{ __('Un email de vérification a été envoyé à votre adresse email. Veuillez cliquer sur le lien dans cet email pour activer votre compte.') }}</p>

                    <p class="text-muted mb-4">{{ __('Si vous n\'avez pas reçu l\'email, veuillez vérifier votre dossier de spam ou contactez-nous pour obtenir de l\'aide.') }}</p>

                    <div class="d-grid gap-2 col-md-6 mx-auto">
                        <a href="{{ route('login') }}" class="btn btn-outline-success">
                            <i class="fas fa-arrow-left me-2"></i>{{ __('Retour à la page de connexion') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection