@extends('layouts.app')

@section('title', 'UIG-publications')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0 rounded-lg mb-5">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0 fw-bold text-center">Publications</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea class="form-control no-focus-outline" id="message" name="message" rows="4" placeholder="Partagez quelque chose avec la communauté..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn btn-sm btn-outline-secondary me-2">
                                    <i class="fas fa-image me-1"></i> Photo
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-paperclip me-1"></i> Fichier
                                </button>
                            </div>
                            <button type="submit" class="btn btn-success px-4 rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i>Publier
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Liste des publications -->
            <div class="publications-list">
                <!-- Publication 1 -->
                <div class="card shadow-sm border-0 rounded-lg mb-4" data-aos="fade-up">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Avatar">
                            <div>
                                <h6 class="mb-0 fw-bold">Dr. Kamga Jean</h6>
                                <small class="text-muted">Professeur de Mathématiques • Il y a 2 heures</small>
                            </div>
                        </div>
                        <p>Chers étudiants, je vous rappelle que les travaux dirigés de mathématiques auront lieu demain à 14h dans l'amphithéâtre A. N'oubliez pas d'apporter vos calculatrices et vos formulaires.</p>
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-sm btn-light me-2">
                                        <i class="far fa-thumbs-up me-1"></i> J'aime (15)
                                    </button>
                                    <button class="btn btn-sm btn-light">
                                        <i class="far fa-comment me-1"></i> Commenter (3)
                                    </button>
                                </div>
                                <button class="btn btn-sm btn-light">
                                    <i class="fas fa-share me-1"></i> Partager
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Publication 2 -->
                <div class="card shadow-sm border-0 rounded-lg mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Avatar">
                            <div>
                                <h6 class="mb-0 fw-bold">Administration IUG</h6>
                                <small class="text-muted">Annonce officielle • Il y a 1 jour</small>
                            </div>
                        </div>
                        <p>Nous avons le plaisir de vous annoncer que la cérémonie de remise des diplômes aura lieu le 15 juillet prochain. Tous les étudiants concernés sont priés de confirmer leur présence auprès du secrétariat avant le 30 juin.</p>
                        <img src="https://via.placeholder.com/800x400" class="img-fluid rounded mb-3" alt="Image de la publication">
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-sm btn-light me-2">
                                        <i class="far fa-thumbs-up me-1"></i> J'aime (42)
                                    </button>
                                    <button class="btn btn-sm btn-light">
                                        <i class="far fa-comment me-1"></i> Commenter (12)
                                    </button>
                                </div>
                                <button class="btn btn-sm btn-light">
                                    <i class="fas fa-share me-1"></i> Partager
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton "Voir plus" -->
            <div class="text-center mt-4">
                <button class="btn btn-outline-success rounded-pill px-4">
                    Voir plus de publications
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animation pour les nouvelles publications
    function animateNewPost() {
        const newPost = document.querySelector('.publications-list').firstElementChild;
        newPost.classList.add('animate__animated', 'animate__fadeInDown');
        setTimeout(() => {
            newPost.classList.remove('animate__animated', 'animate__fadeInDown');
        }, 1000);
    }

    // Initialisation des animations AOS
    AOS.init({
        duration: 800,
        once: true
    });
</script>
@endsection
