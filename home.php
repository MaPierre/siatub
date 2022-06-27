<style>
.car-cover {
    width: 10em;
}

.car-item .col-auto {
    max-width: calc(100% - 12em) !important;
}

.car-item:hover {
    transform: translate(0, -4px);
    background: #a5a5a521;
}

.banner-img-holder {
    height: 25vh !important;
    width: calc(100%);
    overflow: hidden;
}

.banner-img {
    object-fit: scale-down;
    height: calc(100%);
    width: calc(100%);
    transition: transform .3s ease-in;
}

.car-item:hover .banner-img {
    transform: scale(1.3)
}

.welcome-content img {
    margin: .5em;
}

.def {
    display: flex;
    width: 100%;
    position: absolute;
    transform: translateY(-50%);
    animation: scrollTxt 10s linear infinite;
}

@keyframes scrollTxt {
    0% {
        transform: translate(0, 0);
    }

    100% {
        transform: translate(-100%, 0);
    }
}
</style>
<div class="def">
    <span>Système Intelligent d'Archivage des Thèmes de mémoire&nbsp;</span>
    <span>à l'Université du Burundi</span>

</div>
<div class="col-lg-12 py-5">


    <div class="contain-fluid">
        <div class="card card-outline card-navy shadow rounded-0">
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h3 class="text-center">Bienvenue</h3>
                    <hr size="3" color="red">
                    <div class="welcome-content">
                        <?php include("welcome.html") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>