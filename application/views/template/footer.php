        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="footer-content position-relative">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 footer-links">
                    <h3>Argentina</h3>
                    <ul>
                    <li>Av. Presidente Roque Saenz Peña 628 - Piso 7, C1035AAO - C.A.B.A</li>
                    <li>Tel: +54 (11) 5217-0025</li>
                    <li>Tel: +54 (11) 5276-9432</li>
                    <li><a href="mailto:info@gruposyasa.com">info@gruposyasa.com</a></li>
                    </ul>
                </div><!-- End footer links column-->

                <div class="col-lg-4 footer-links">
                    <h3>México</h3>
                    <ul>
                    <li>Homero 1804, Interior 1303, Col. Los Morales sección Palmas CP 11540 - Del. Miguel Hidalgo Ciudad de México</li>
                    <li>Tel: +52 55 2623 2554</li>
                    <li><a href="mailto:infomx@gruposyasa.com">infomx@gruposyasa.com</a></li>
                    </ul>
                </div><!-- End footer links column-->

                <div class="col-lg-4 footer-links">
                    <h3>Colombia</h3>
                    <ul>
                    <li>Cra 1 No 70-35 Ap 304, CP 110221, Bogotá</li>
                    <li>Tel: Bogotá: (571) 311 831 95 15</li>
                    <li><a href="mailto:info@gruposyasa.com">info@gruposyasa.com</a></li>
                    </ul>
                </div><!-- End footer links column-->

                </div>
            </div>
            </div>

            <div class="footer-legal">
            <div class="container">
                <div class="row justify-content-between copyright">
                <div class="col-lg-9">
                    <?php $now = new DateTime(); ?>
                    <a href="<?= site_url('aviso_de_privacidad'); ?>">Aviso de Privacidad</a> | <?= localized('copyright', ['year' => $now->format('Y')]); ?>
                </div>
                <div class="col-lg-3">
                    <div class="social-links">
                    <a href="https://www.instagram.com/grupo.syasa/" class="d-flex align-items-center justify-content-center instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/syasa/" class="d-flex align-items-center justify-content-center linkedin" target="_blank"><i class="bi bi-linkedin"></i></i></a>
                    <a href="https://www.youtube.com/@grupo_syasa" class="d-flex align-items-center justify-content-center youtube" target="_blank"><i class="bi bi-youtube"></i></i></a>
                    </div>
                </div><!-- End footer info column-->
                </div>
            </div>
            </div>
        </footer>
        <!-- End Footer -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <?php load_view('template/scripts'); ?>
    </body>
</html>