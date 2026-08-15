<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$w = isset($this->website['data']) ? $this->website['data'] : new stdClass();

$addr_elgin = isset($w->address) ? trim((string) $w->address) : '';
$addr_chinar = isset($w->corporate_address) ? trim((string) $w->corporate_address) : '';
if ($addr_elgin === '') {
    $addr_elgin = '78, Sambhunath Pandit St, near IPGME & R AND SSKM HOSPITAL, near Sant Kutiya Gurudwara, Elgin Rd, Bhowanipore, Kolkata, West Bengal 700020, India';
}
if ($addr_chinar === '') {
    $addr_chinar = 'PS Aviator, Suite 306, Rajarhat Main Rd, Chinar Park, Dash Drone, Rajarhat, Kolkata, West Bengal 700136, India';
}

$phone_raw = isset($w->support_contact) ? (string) $w->support_contact : '';
$phones = array_values(array_filter(array_map('trim', preg_split('/[\n\r|]+/', $phone_raw, -1, PREG_SPLIT_NO_EMPTY))));
$phone_elgin = isset($phones[0]) ? $phones[0] : '9830411212';
$phone_chinar = isset($phones[1]) ? $phones[1] : '9073313193';

$hours = isset($w->insurance_pss) ? trim((string) $w->insurance_pss) : '';
if ($hours === '') {
    $hours = 'Mon–Sat: 10AM–8PM';
}

$dontia_map_src_from_raw = static function ($raw, $fallback_query) {
    $t = trim((string) $raw);
    $src = '';
    if ($t !== '' && strtoupper($t) !== 'NA' && strtoupper($t) !== 'N/A') {
        if (preg_match('/\ssrc=["\']([^"\']+)["\']/i', $t, $m)) {
            $src = html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
        } elseif (preg_match('#^https?://#i', $t)) {
            $src = $t;
        }
    }
    $ok = $src !== '' && (
        stripos($src, 'google.com/maps') !== false
        || stripos($src, 'maps.google.') !== false
        || stripos($src, 'google.co.in/maps') !== false
    );
    if (!$ok) {
        $src = 'https://www.google.com/maps?q=' . rawurlencode($fallback_query) . '&output=embed';
    }
    return $src;
};

$map_elgin = $dontia_map_src_from_raw(isset($w->address_iframe) ? $w->address_iframe : '', $addr_elgin);
$map_chinar = $dontia_map_src_from_raw(isset($w->corporate_iframe) ? $w->corporate_iframe : '', $addr_chinar);

$dontia_tel_href = static function ($phone) {
    $digits = preg_replace('/\D+/', '', (string) $phone);
    if (strlen($digits) === 10) {
        $digits = '91' . $digits;
    }
    return 'tel:+' . $digits;
};

$dontia_dir_href = static function ($address) {
    return 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode($address);
};

$locations = array(
    array(
        'label' => 'Elgin Road',
        'title' => 'Dontia Care Clinic – Elgin Road',
        'badge' => 'Flagship Clinic',
        'address' => $addr_elgin,
        'phone' => $phone_elgin,
        'hours' => $hours,
        'map' => $map_elgin,
        'dir' => $dontia_dir_href($addr_elgin),
        'tel' => $dontia_tel_href($phone_elgin),
    ),
    array(
        'label' => 'Chinar Park',
        'title' => 'Dontia Care Clinic – Chinar Park',
        'badge' => 'North Kolkata',
        'address' => $addr_chinar,
        'phone' => $phone_chinar,
        'hours' => $hours,
        'map' => $map_chinar,
        'dir' => $dontia_dir_href($addr_chinar),
        'tel' => $dontia_tel_href($phone_chinar),
    ),
);
?>
<style>
.dontia-loc{margin-top:36px}
.dontia-loc-head{text-align:center;margin:0 0 22px}
.dontia-loc-head h3{margin:0 0 8px;font-size:clamp(22px,3vw,30px);color:#3d342d}
.dontia-loc-head p{margin:0 auto;max-width:640px;color:#675f57;line-height:1.6}
.dontia-loc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}
.dontia-loc-card{background:#fff;border:1px solid #ece6df;border-radius:16px;overflow:hidden;box-shadow:0 12px 28px rgba(49,19,0,.1);display:flex;flex-direction:column;height:100%}
.dontia-loc-map{position:relative;height:220px;background:#e8e0d6}
.dontia-loc-map iframe{position:absolute;inset:0;width:100%;height:100%;border:0;display:block}
.dontia-loc-badge{position:absolute;z-index:2;top:12px;left:12px;background:#5b2f1d;color:#fff;font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:6px 12px;border-radius:999px;box-shadow:0 4px 12px rgba(0,0,0,.2)}
.dontia-loc-body{padding:18px 18px 16px;display:flex;flex-direction:column;gap:10px;flex:1}
.dontia-loc-body h4{margin:0;font-size:20px;line-height:1.3;color:#3d342d}
.dontia-loc-meta{list-style:none;margin:0;padding:0;display:grid;gap:10px}
.dontia-loc-meta li{display:flex;gap:10px;align-items:flex-start;margin:0;color:#4b4b4b;line-height:1.55;font-size:15px}
.dontia-loc-meta i{width:18px;flex:0 0 18px;margin-top:3px;color:#b78333;text-align:center}
.dontia-loc-meta a{color:#4b4b4b}
.dontia-loc-meta a:hover{color:#5b2f1d}
.dontia-loc-actions{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:6px}
.dontia-loc-actions a{display:inline-flex;align-items:center;justify-content:center;gap:6px;background:linear-gradient(135deg,#c59a4d 0%,#b78333 100%);color:#fff!important;padding:11px 12px;border-radius:999px;font-size:13px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;text-decoration:none;box-shadow:0 8px 18px rgba(183,131,51,.28);transition:transform .2s ease,box-shadow .2s ease}
.dontia-loc-actions a:hover,.dontia-loc-actions a:focus{color:#fff!important;text-decoration:none;transform:translateY(-1px);box-shadow:0 12px 22px rgba(183,131,51,.36)}
@media (max-width:900px){.dontia-loc-grid{grid-template-columns:1fr}.dontia-loc-map{height:200px}}
</style>

<div class="dontia-loc">
    <div class="dontia-loc-head">
        <h3>Visit our clinics</h3>
        <p>Two convenient Kolkata locations — get directions or call the clinic nearest to you.</p>
    </div>
    <div class="dontia-loc-grid">
        <?php foreach ($locations as $loc) { ?>
        <article class="dontia-loc-card">
            <div class="dontia-loc-map">
                <span class="dontia-loc-badge"><?php echo htmlspecialchars($loc['badge'], ENT_QUOTES, 'UTF-8'); ?></span>
                <iframe src="<?php echo htmlspecialchars($loc['map'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen title="<?php echo htmlspecialchars($loc['title'] . ' map', ENT_QUOTES, 'UTF-8'); ?>"></iframe>
            </div>
            <div class="dontia-loc-body">
                <h4><?php echo htmlspecialchars($loc['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <ul class="dontia-loc-meta">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo htmlspecialchars($loc['address'], ENT_QUOTES, 'UTF-8'); ?></span></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="<?php echo htmlspecialchars($loc['tel'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($loc['phone'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><span><?php echo htmlspecialchars($loc['hours'], ENT_QUOTES, 'UTF-8'); ?></span></li>
                </ul>
                <div class="dontia-loc-actions">
                    <a href="<?php echo htmlspecialchars($loc['dir'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">→ Direction</a>
                    <a href="<?php echo htmlspecialchars($loc['tel'], ENT_QUOTES, 'UTF-8'); ?>">→ Call Now</a>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
</div>
