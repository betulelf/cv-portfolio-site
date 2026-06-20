<?php
// index.php - Admin panel verilerini ön yüzde gösteren dinamik portföy ana sayfası
require_once __DIR__ . '/admin/db.php';

if (!isset($db)) {
  die("Veritabanı bağlantısı kurulamadı. admin/db.php dosyasını kontrol et.");
}

function e($value)
{
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function fetchAllSafe(PDO $db, string $sql): array
{
  try {
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $e) {
    return [];
  }
}

$projeler = fetchAllSafe($db, "SELECT * FROM projeler WHERE durum='yayinda' ORDER BY id DESC LIMIT 3");
$egitimler = fetchAllSafe($db, "SELECT * FROM egitim_bilgileri ORDER BY id DESC");
$programlama_dilleri = fetchAllSafe($db, "SELECT * FROM programlama_diller ORDER BY id DESC");
$ideler = fetchAllSafe($db, "SELECT * FROM kullanilan_ideler ORDER BY id DESC");
$sertifikalar = fetchAllSafe($db, "SELECT * FROM sertifika_bilgileri ORDER BY id DESC LIMIT 4");
$yabanci_diller = fetchAllSafe($db, "SELECT * FROM yabanci_diller ORDER BY id DESC");
$bloglar = fetchAllSafe($db, "SELECT * FROM blog_yazilari WHERE durum = 'yayinda' ORDER BY id DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Elif Betül Bayram | Web Geliştirici ve Bilgisayar Programcısı</title>
  <meta name="robots" content="index, follow">
  <meta name="description"
    content="Elif Betül Bayram. Kurumsal web siteleri, e-ticaret çözümleri, WordPress, PHP ve modern web geliştirme hizmetleri sunuyorum.">
  <meta name="keywords"
    content="Elif Betül Bayram, Web Geliştirici, PHP, MySQL, Frontend Developer, Full Stack Developer, WordPress, E-Ticaret, Admin Panel, CV Sitesi, Denizli">
  <meta property="og:title" content="Elif Betül Bayram | Web Geliştirici">
  <meta property="og:description" content="Kurumsal web siteleri, e-ticaret çözümleri ve dijital projeler geliştiriyorum.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://elifbetulbayram.com">
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <link rel="stylesheet" href="style.css?v=3">
</head>

<body>
  <header class="navbar">
    <div class="container nav-inner">
      <a href="#" class="brand">
        
        <span class="brand-logo">EBB</span><span>Elif Betül Bayram</span>
      </a>
      <nav class="menu">
        <a href="#">Ana Sayfa</a><a href="#hakkimda">Hakkımda</a><a href="#hizmetler">Hizmetlerim</a>
        <a href="#projeler">Projelerim</a><a href="admin/elifinblogu.php">Blog</a>
        <a href="#iletisim" style="background:#ec5aa6; color:#fff; border-radius: 5px; padding: 10px 20px;">Benimle Çalışın</a>
      </nav>
      <button class="hamburger" aria-label="Menü"><i class="fa-solid fa-bars"></i></button>
    </div>
  </header>

  <main>
    <section class="hero" id="home">
      <div class="container hero-grid">
        <div class="hero-content">
          <p class="eyebrow">Merhaba, ben</p>
          <h1>Elif Betül <span class="gradient">Bayram</span></h1>
          <p class="subtitle">Bilgisayar Programcısı | Web Geliştirici ve Bilgisayar Programcısı </p>
          <p class="desc">Modern web ve mobil çözümler üretiyor, markaların dijital dünyada güçlü bir varlık göstermesine yardımcı oluyorum.</p>
          <div class="buttons">
            <a href="#projeler" class="btn btn-primary">Projelerimi İncele <i class="fa-solid fa-arrow-right"></i></a>
            <a href="#hizmetler" class="btn"><i class="fa-solid fa-grip"></i> Hizmetlerim</a>
          </div>
          <div class="stats">
            <div class="stat">
              <i class="fa-solid fa-heart"></i>
              <strong>%100</strong>
              <span>Müşteri Memnuniyeti</span>
            </div>
            <div class="stat"><i class="fa-solid fa-briefcase"></i></i><strong><?= count($projeler) > 0 ? count($projeler) . '+' : '/+' ?></strong><span>Portföy Projelerim</span></div>
            <div class="stat"><i class="fa-regular fa-clock"></i><strong>7/24</strong><span>Destek Alabilirsiniz</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <img class="person" src="images/AUZEF-PROFIL-RESMIM.jpg" alt="Elif Betül Bayram" onerror="this.style.display='none'">
          <div class="location"><i class="fa-solid fa-location-dot"></i>Denizli, Türkiye</div>
        </div>
      </div>
    </section>

    <section id="hizmetler">
      <div class="container">
        <div class="section-head"><span class="section-kicker">Hizmetlerim</span>
          <h2>Dijital Çözümlerle İşinizi Büyütün</h2>
          <p>Markanızı dijital dünyada bir adım öne taşıyacak çözümler sunuyorum.</p>
        </div>
        <div class="cards">
          <article class="card">
            <div class="icon"><i class="fa-brands fa-figma"></i></div>
            <h3>UX / UI Design</h3>
            <p>Kullanıcı odaklı, modern ve etkileyici tasarım arayüzleri oluşturuyorum.</p>
          </article>
          <article class="card">
            <div class="icon"><i class="fa-regular fa-window-maximize"></i></div>
            <h3>Kurumsal Web / Mobil Uyumlu Site</h3>
            <p>Responsive, hızlı ve SEO uyumlu kurumsal web siteleri geliştiriyorum.</p>
          </article>
          <article class="card">
            <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
            <h3>Yönetici Paneli Desteği</h3>
            <p>Dinamik, güvenli ve kolay yönetilebilir panel sistemleri sağlıyorum.</p>
          </article>
          <article class="card">
            <div class="icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
            <h3>SEO Optimizasyonu</h3>
            <p>Arama motorlarında görünürlüğünüzü artırıyor, organik trafiğinizi yükseltiyorum.</p>
          </article>
        </div>
        <div class="cards second">
          <article class="card">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>Google Harita Kaydı</h3>
            <p>Google Haritalar'da işletmenizi doğru şekilde konumlandırıyorum.</p>
          </article>
          <article class="card">
            <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <h3>E-Ticaret Web / Mobil Site ve Uygulama</h3>
            <p>Satışlarınızı artıracak güvenli ve ölçeklenebilir e-ticaret çözümleri.</p>
          </article>
          <article class="card">
            <div class="icon"><i class="fa-brands fa-wordpress"></i></div>
            <h3>WORDPRESS&ELEMENTOR</h3>
            <p>Wordpress temaları ile modern ve şık siteler inşa ediyorum.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="projects" id="projeler">
      <div class="container">
        <div class="section-head"><span class="section-kicker">Projelerim</span>
          <h2>Seçili Çalışmalarım</h2>
          <p>Admin panelden eklediğim projeler</p>
        </div>
        <div class="project-grid">
          <?php if (!empty($projeler)): ?>
            <?php foreach ($projeler as $proje): ?>
              <?php $projeLink = !empty($proje['canli_link']) ? $proje['canli_link']
                : (!empty($proje['github_link']) ? $proje['github_link'] : '#'); ?>
              <article>
                <a href="admin/proje_detay.php?id=<?= e($proje['id'] ?? '') ?>">
                  <div class="project-img">
                    <?php if (!empty($proje['kapak_gorseli'])): ?>
                      <img src="images/<?= e($proje['kapak_gorseli']) ?>"
                        alt="<?= e($proje['proje_adi'] ?? 'Proje') ?>">
                    <?php endif; ?>
                  </div>
                  <div class="project-info">
                    <div>
                      <h3><?= e($proje['proje_adi'] ?? 'Proje') ?></h3>
                      <p><?= e($proje['kisa_aciklama'] ?? 'Web Uygulama') ?></p>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                  </div>
                </a>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="empty-text">Henüz proje eklenmedi.</p>
          <?php endif; ?>
        </div>
        <div class="center"><a href="admin/projeler.php" class="btn outline">Tüm Projeleri Görüntüle</a></div>
      </div>
    </section>

    <section id="hakkimda">
      <div class="container info-grid">
        <div class="info-card">
          <h3 class="info-title">Eğitim Bilgilerim</h3>
          <?php if (!empty($egitimler)): ?>
            <?php foreach ($egitimler as $egitim): ?>
              <div class="edu"><i class="fa-solid fa-graduation-cap"></i>
                <div>
                  <h4><?= e($egitim['kurum'] ?? '') ?></h4>
                  <p><?= e($egitim['bolum'] ?? $egitim['derece'] ?? '') ?><br><?= e($egitim['yil'] ?? '') ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="empty-text">Henüz eğitim bilgisi eklenmedi.</p>
          <?php endif; ?>
        </div>

        <div class="info-card">
          <h3 class="info-title">Programlama Dilleri & Kütüphaneleri</h3>
          <div class="badges">
            <?php if (!empty($programlama_dilleri)): ?>
              <?php foreach ($programlama_dilleri as $dil): ?>
                <span class="badge">

                  <?php if (!empty($dil['dil_ikon'])): ?>
                    <i class="<?= e($dil['dil_ikon']) ?>"></i>
                  <?php endif; ?>

                  <?= e($dil['dil_adi'] ?? '') ?>

                </span>
              <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="info-card">
          <h3 class="info-title">VS IDELER & ARAÇLAR</h3>
          <div class="tools">
            <?php if (!empty($ideler)): ?>
              <?php foreach ($ideler as $ide): ?>
                <div class="tool"><i class="<?= e($ide['ide_ikon'] ?: 'fa-solid fa-laptop-code') ?>"></i>
                  <p><?= e($ide['ide_adi'] ?? '') ?></p>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="empty-text">Henüz IDE / Editör bilgisi eklenmedi.</p>
            <?php endif; ?>
          </div>
        </div>


        <div class="info-card">
          <h3 class="info-title">Sertifikalarım</h3>
          <?php if (!empty($sertifikalar)): ?>
            <?php foreach ($sertifikalar as $sertifika): ?>
              <div class="edu"><i class="fa-solid fa-certificate"></i>
                <div>
                  <h4><?= e($sertifika['sertifika_adi'] ?? '') ?></h4>
                  <p><?= e($sertifika['kurum'] ?? '') ?><br><?= e($sertifika['yil'] ?? '') ?></p>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="info-card">
        <h3 class="info-title">Yabancı Diller</h3> <?php if (!empty($yabanci_diller)): ?> <?php foreach ($yabanci_diller as $dil): ?> <div class="edu"> <i class="fa-solid fa-language"></i>
              <div>
                <h4><?= e($dil['dil_adi'] ?? '') ?></h4>
                <p><?= e($dil['dil_seviyesi'] ?? '') ?></p>
              </div>
            </div> <?php endforeach; ?> <?php else: ?> <p class="empty-text">Henüz yabancı dil bilgisi eklenmedi.</p> <?php endif; ?>
      </div>
      </div>

      <div class="center"><a href="admin/index_hakkimda.php" class="btn outline">Hakkımda Daha Fazla</a></div>
    </section>

    <section class="projects" id="blog">
      <div class="container">
        <div class="section-head"><span class="section-kicker">Blog</span>
          <h2>Son Yazılarım</h2>
          <p>Admin panelden eklediğim blog içerikleri</p>
        </div>
        <div class="project-grid">
          <?php if (!empty($bloglar)): ?>
            <?php foreach ($bloglar as $blog): ?>
              <article>
                <a href="admin/blog_detay.php?id=<?= e($blog['id'] ?? '') ?>">
                  <div class="project-img">
                    <?php $blogGorsel =  $blog['kapak_gorseli'] ?? $blog['gorsel'] ?? ''; ?>
                    <?php if (!empty($blogGorsel)): ?><img src="admin/images/<?= e($blogGorsel) ?>" alt="<?= e($blog['baslik'] ?? 'Blog') ?>"><?php endif; ?>
                  </div>
                  <div class="project-info">
                    <div>
                      <h3><?= e($blog['baslik'] ?? 'Blog Yazısı') ?></h3>
                      <p><?= e($blog['kisa_aciklama'] ?? $blog['kategori'] ?? 'Blog') ?></p>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                  </div>
                </a>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="empty-text">Henüz blog yazısı eklenmedi.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section id="iletisim">
      <div class="container">
        <div class="section-head"><span class="section-kicker">İletişim</span>
          <h2>Birlikte Harika Projeler Üretelim</h2>
          <p>Projeniz hakkında bilgi almak için benimle iletişime geçebilirsiniz.</p>
        </div>
        <div class="contact-grid">
          <form class="form" action="admin/iletisim_islem.php" method="POST">
            <input type="text" name="adsoyad" placeholder="İsim Soyisim" required>
            <input type="email" name="email" placeholder="E-posta Adresiniz" required>
            <input type="tel" name="telefon" placeholder="Telefon Numaranız">
            <input type="text" name="proje" placeholder="Proje Hakkında Kısa Bilgi">
            <select name="butce">
              <option>Proje Bütçeniz</option>
              <option>5.000 TL - 10.000 TL</option>
              <option>11.000 TL - 25.000 TL</option>
              <option>26.000 TL - 50.000 TL</option>
              <option>50.000 TL+</option>
            </select><button class="btn btn-primary" type="submit"><i class="fa-regular fa-paper-plane"></i> Gönder </button>
          </form>
          <div>
            <div class="contact-item"><i class="fa-solid fa-envelope"></i>
              <div><strong>E-posta</strong> <br> <span>elifbetul035@gmail.com</span></div>
            </div>
            <div class="contact-item"><i class="fa-solid fa-location-dot"></i>
              <div><strong>Konum</strong> <br> <span>Denizli, Türkiye</span></div>
            </div>
          </div>
          <div class="social">
            <h3 class="info-title">Sosyal Bağlantılar</h3><a href="https://github.com/betulelf"><i class="fa-brands fa-github"></i>
              <span>GitHub</span></a><a href="https://www.linkedin.com/in/elifbetulbayram/">
              <i class="fa-brands fa-linkedin-in"></i><span>LinkedIn</span></a><a href="https://www.upwork.com/freelancers/~019320eafc6fd38f4e"><i class="fa-brands fa-upwork"></i>
              <span>Upwork</span></a><a href="https://armut.com/freelance-yazilimci"><i class="fa-solid fa-user"></i><span>Armut</span></a><a href="admin/elifinblogu.php"><i class="fa-solid fa-keyboard"></i>
              <span>Elif'in Bloğu</span></a><a href="https://www.instagram.com/elifbetulbayram/"><i class="fa-brands fa-instagram">

              </i><span>Instagram</span></a><a href="admin/login.php"><i class="fa-solid fa-user-tie"></i><span>Admin</span></a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">© 2026 Elif Betül Bayram. Tüm hakları saklıdır.</div>
  </footer>
  <a href="#home" class="to-top"><i class="fa-solid fa-arrow-up"></i></a>

  <script>
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');
    hamburger?.addEventListener('click', () => {
      const open = menu.style.display === 'flex';
      menu.style.display = open ? 'none' : 'flex';
      if (!open) {
        menu.style.position = 'absolute';
        menu.style.top = '76px';
        menu.style.left = '0';
        menu.style.right = '0';
        menu.style.flexDirection = 'column';
        menu.style.padding = '22px';
        menu.style.background = 'rgba(5,11,22,.96)';
      }
    });
  </script>
  <a href="https://wa.me/905064275522?text=Merhaba%20Elif%20Hanım,%20web%20sitesi%20hizmetleriniz%20hakkında%20bilgi%20almak%20istiyorum."
    class="whatsapp-float"
    target="_blank"
    rel="noopener noreferrer">
    <i class="fa-brands fa-whatsapp"></i>
  </a>
</body>

</html>