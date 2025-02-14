<footer class="footer text-center py-4">
    <div class="container">
        <!-- Nama atau Logo Situs -->
        <div class="footer-brand mb-3">
            <h2><?php echo SITE_NAME; ?></h2>
        </div>

        <!-- Link Navigasi -->
        <div class="footer-links mb-3">
            
            <a href="<?php print_link('info/about'); ?>"><i class="fas fa-info-circle"></i> About Us</a> |
            <a href="<?php print_link('info/help'); ?>"><i class="fas fa-question-circle"></i> Help & FAQ</a> |
            <a href="<?php print_link('info/contact'); ?>"><i class="fas fa-envelope"></i> Contact Us</a> |
            <a href="<?php print_link('info/privacy_policy'); ?>"><i class="fas fa-user-secret"></i> Privacy Policy</a> |
            <a href="<?php print_link('info/terms_and_conditions'); ?>"><i class="fas fa-file-alt"></i> Terms & Conditions</a>
        </div>

        <!-- Ikon Media Sosial -->
        <div class="social-icons mb-3">
            <a href="#" class="footer-icon mx-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="footer-icon mx-2"><i class="fab fa-facebook"></i></a>
            <a href="#" class="footer-icon mx-2"><i class="fab fa-instagram"></i></a>
        </div>

        <!-- Copyright -->
        <div class="copyright text-muted">
            &copy; <?php echo date('Y'); ?> All rights reserved | Powered by <?php echo SITE_NAME; ?>
        </div>
    </div>
</footer>

<!-- Tambahkan link Font Awesome di bagian <head> jika belum -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .footer {
        background-color: #fff; /* Background putih */
        color: #333; /* Teks abu-abu gelap */
        border-top: 1px solid #ddd; /* Tambahkan border atas agar terlihat jelas dengan konten di atasnya */
    }
    .footer h2 {
        color: #333;
        font-size: 1.5rem;
        margin: 0;
    }
    .footer-links a.footer-link {
        color: #333;
        font-size: 0.9rem;
        text-decoration: none;
        transition: color 0.3s;
    }
    .footer-links a.footer-link:hover {
        color: #555;
    }
    .social-icons a.footer-icon {
        color: #333;
        font-size: 1.2rem;
        transition: color 0.3s;
    }
    .social-icons a.footer-icon:hover {
        color: #666;
    }
</style>
