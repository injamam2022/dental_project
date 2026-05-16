<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.tmj-page{overflow-x:hidden}
.tmj-page .container{max-width:min(1140px,94vw);width:100%;margin:0 auto;padding-left:max(16px,env(safe-area-inset-left,0px));padding-right:max(16px,env(safe-area-inset-right,0px));box-sizing:border-box}
.tmj-page .tmj-hero-video-aspect iframe{position:absolute;left:0;top:0;width:100%;height:100%;border:0}
.tmj-page .tmj-hero-yt-facade:focus{outline:2px solid rgba(255,248,240,.75);outline-offset:-2px}
.tmj-page .tmj-hero-yt-facade:hover .tmj-hero-yt-play,.tmj-page .tmj-hero-yt-facade:focus .tmj-hero-yt-play{background:rgba(173,140,128,.95);color:#1a120e}
.tmj-page .ortho-sec{padding:52px 0}
.tmj-page .ortho-sec h2,.tmj-page .ortho-sec h3,.tmj-page .ortho-sec h4{margin:0 0 14px}
.tmj-page .ortho-sub{font-size:18px;line-height:1.78;color:#3a3836}
.tmj-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}
.tmj-page .ortho-card{background:#fff;border-radius:12px;padding:20px;box-shadow:0 8px 22px rgba(49,19,0,.08);border:1px solid #ece6df;height:100%}
.tmj-page .ortho-card img{width:100%;height:180px;object-fit:cover;border-radius:8px;margin-bottom:10px}
.tmj-page .ortho-section-head{text-align:center;margin-bottom:24px}
.tmj-page .ortho-section-head p{margin:8px auto 0;color:#4a4540;max-width:720px;line-height:1.65}
.tmj-page .tmj-why-list,.tmj-page .tmj-symptom-list,.tmj-page .tmj-cause-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:10px}
.tmj-page .tmj-why-list li,.tmj-page .tmj-symptom-list li,.tmj-page .tmj-cause-list li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 40px;line-height:1.65;position:relative;box-shadow:0 4px 14px rgba(0,0,0,.05)}
.tmj-page .tmj-why-list li::before,.tmj-page .tmj-symptom-list li::before,.tmj-page .tmj-cause-list li::before{content:"";position:absolute;left:14px;top:16px;width:10px;height:10px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%)}
.tmj-page .tmj-cost-table{width:100%;border-collapse:collapse;margin:18px 0 0;font-size:15px;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 8px 22px rgba(49,19,0,.08);border:1px solid #ece6df}
.tmj-page .tmj-cost-table th,.tmj-page .tmj-cost-table td{padding:14px 16px;text-align:left;border-bottom:1px solid #eee8e0}
.tmj-page .tmj-cost-table th{background:#f4efea;color:#3d2a22;font-weight:700}
.tmj-page .tmj-cost-table tr:last-child td{border-bottom:0}
.tmj-page .tmj-gallery-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:8px}
.tmj-page .tmj-gallery-card{background:#fff;border-radius:12px;overflow:hidden;border:1px solid #ece6df;box-shadow:0 10px 26px rgba(49,19,0,.1)}
.tmj-page .tmj-gallery-card img{width:100%;height:240px;object-fit:cover;display:block}
.tmj-page .tmj-gallery-card figcaption{padding:12px 14px;font-size:14px;line-height:1.5;color:#4a4540}
.tmj-page .tmj-doctor-layout{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:28px;align-items:stretch;max-width:1000px;margin:26px auto 0}
.tmj-page .tmj-doctor-col{min-width:0}
.tmj-page .tmj-doctor-strip{display:flex;flex-direction:column;gap:18px}
.tmj-page .tmj-doctor-aside{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 24px 24px;box-shadow:0 10px 26px rgba(49,19,0,.08);display:flex;flex-direction:column;text-align:left;gap:14px}
.tmj-page .tmj-doctor-aside h3{margin:0;font-size:clamp(20px,2.6vw,24px);line-height:1.25;color:#2a2420}
.tmj-page .tmj-doctor-aside .tmj-aside-lead{margin:0;color:#4a4540;font-size:15px;line-height:1.7}
.tmj-page .tmj-doctor-aside ul{margin:0;padding-left:1.15rem;color:#4a4540;font-size:15px;line-height:1.7}
.tmj-page .tmj-doctor-aside li{margin-bottom:6px}
.tmj-page .tmj-doctor-aside li:last-child{margin-bottom:0}
.tmj-page .tmj-doctor-aside .tmj-doctor-aside-cta{margin-top:4px}
.tmj-page .tmj-doctor-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:16px;box-shadow:0 10px 24px rgba(0,0,0,.07);text-align:center}
.tmj-page .tmj-doctor-card img{width:100%;height:260px;object-fit:cover;object-position:center 20%;border-radius:10px;margin-bottom:10px;display:block}
.tmj-page .tmj-doctor-card h3{margin:0 0 6px;font-size:18px}
.tmj-page .tmj-doctor-card p{margin:0;color:#5a534c;font-size:15px;line-height:1.55}
.tmj-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.tmj-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:12px;box-shadow:0 8px 20px rgba(0,0,0,.07)}
.tmj-page .ortho-cert-card img{width:100%;height:200px;object-fit:contain;background:#f7f6f3;border-radius:8px}
.tmj-page .ortho-cta-wrap{max-width:900px;margin:0 auto}
.tmj-page .ortho-cta-card{background:linear-gradient(135deg,#fff 0%,#f7f4ef 100%);border:1px solid #e9e2d8;border-radius:14px;padding:26px 24px;box-shadow:0 10px 24px rgba(0,0,0,.08)}
.tmj-page .ortho-btn{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);color:#fff;padding:12px 22px;border-radius:999px;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;border:0;box-shadow:0 8px 20px rgba(91,47,29,.28);text-decoration:none}
.tmj-page .ortho-btn:hover,.tmj-page .ortho-btn:focus{color:#fff;text-decoration:none}
.tmj-page .implant-sec-warmalt{background:#f8fbff}
.tmj-page .ortho-note{font-weight:700;color:#1f6fd0}
@media (max-width:900px){
.tmj-page .ortho-grid-2,.tmj-page .tmj-gallery-grid,.tmj-page .ortho-cert-grid{grid-template-columns:1fr}
.tmj-page .tmj-doctor-layout{grid-template-columns:1fr;gap:22px}
.tmj-page .tmj-gallery-card img{height:220px}
}
@media (max-width:768px){
.tmj-page .ortho-sub{color:#3a3836!important}
.tmj-page .ortho-section-head p{color:#2f2b28!important}
.tmj-page .tmj-doctor-aside .tmj-aside-lead{color:#3a3836!important}
.tmj-page .tmj-doctor-aside ul{color:#3a3836!important}
.tmj-page .implant-sec-warmalt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.tmj-page .tmj-hero{padding:36px 0 40px}
}
</style>
