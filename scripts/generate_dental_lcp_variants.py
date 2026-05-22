#!/usr/bin/env python3
"""
Generate responsive + WebP variants for dental PageSpeed (banner hero, about, media).

Usage (from project root):
  python scripts/generate_dental_lcp_variants.py
  python scripts/generate_dental_lcp_variants.py banner Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg
"""

from __future__ import annotations

import sys
from pathlib import Path

try:
    from PIL import Image
except ImportError:
    print("Install Pillow: pip install Pillow", file=sys.stderr)
    sys.exit(1)

ROOT = Path(__file__).resolve().parents[1]
UPLOADS = ROOT / "admin" / "webroot" / "uploads"

PRESETS = {
    "banner": {
        "dir": UPLOADS / "banner",
        "widths": (640, 960, 1280, 1920),
        "jpeg_q": 82,
        "webp_q": 80,
    },
    "dental_media": {
        "dir": UPLOADS / "dental_media",
        "widths": (400, 700, 1024, 1400),
        "jpeg_q": 82,
        "webp_q": 80,
    },
    "dental_defaults": {
        "dir": UPLOADS / "dental_page" / "defaults",
        "widths": (480, 768, 1024, 1400),
        "jpeg_q": 82,
        "webp_q": 80,
    },
    "dental_services": {
        "dir": UPLOADS / "dental_page" / "services",
        "widths": (100, 200, 400),
        "jpeg_q": 85,
        "webp_q": 82,
    },
    "technology": {
        "dir": UPLOADS / "dental_page" / "technology",
        "widths": (400, 700, 1024),
        "jpeg_q": 82,
        "webp_q": 80,
    },
    "home": {
        "dir": UPLOADS / "home",
        "widths": (480, 768, 1024, 1280, 1600, 1920),
        "jpeg_q": 82,
        "webp_q": 80,
    },
}

VARIANT_RE = __import__("re").compile(r"-\d+w\.(jpe?g|png|webp)$", __import__("re").I)


def is_source(path: Path) -> bool:
    if not path.is_file():
        return False
    if VARIANT_RE.search(path.name):
        return False
    return path.suffix.lower() in {".jpg", ".jpeg", ".png", ".webp"}


def save_variant(img: Image.Image, out: Path, ext: str, jpeg_q: int, webp_q: int) -> None:
    ext_l = ext.lower().lstrip(".")
    if ext_l in ("jpg", "jpeg"):
        rgb = img.convert("RGB") if img.mode not in ("RGB", "L") else img
        rgb.save(out, "JPEG", quality=jpeg_q, optimize=True, progressive=True)
    elif ext_l == "png":
        img.save(out, "PNG", optimize=True)
    elif ext_l == "webp":
        img.save(out, "WEBP", quality=webp_q, method=6)
    else:
        img.save(out)


def process_file(path: Path, preset: dict) -> None:
    try:
        with Image.open(path) as im:
            im.load()
            ow, oh = im.size
            stem = path.stem
            ext = path.suffix.lstrip(".")
            for tw in preset["widths"]:
                if tw >= ow:
                    continue
                th = max(1, round(oh * (tw / ow)))
                resized = im.resize((tw, th), Image.Resampling.LANCZOS)
                raster = preset["dir"] / f"{stem}-{tw}w.{ext}"
                save_variant(resized, raster, ext, preset["jpeg_q"], preset["webp_q"])
                print(f"  {raster.name}")
                webp_out = preset["dir"] / f"{stem}-{tw}w.webp"
                save_variant(resized, webp_out, "webp", preset["jpeg_q"], preset["webp_q"])
                print(f"  {webp_out.name}")
            full_webp = preset["dir"] / f"{stem}.webp"
            if not full_webp.exists():
                save_variant(im, full_webp, "webp", preset["jpeg_q"], preset["webp_q"])
                print(f"  {full_webp.name}")
    except OSError as e:
        print(f"  skip {path.name}: {e}", file=sys.stderr)


def run_preset(key: str, only_file: str | None = None) -> None:
    preset = PRESETS[key]
    d = preset["dir"]
    if not d.is_dir():
        print(f"=== {key} (no directory) ===")
        return
    print(f"=== {key} ===")
    if only_file:
        p = d / only_file
        if is_source(p):
            process_file(p, preset)
        else:
            print(f"  missing or not a source: {only_file}")
        return
    for p in sorted(d.iterdir()):
        if is_source(p):
            print(f" {p.name}")
            process_file(p, preset)


def main() -> None:
    only_preset = sys.argv[1] if len(sys.argv) > 1 else ""
    only_file = sys.argv[2] if len(sys.argv) > 2 else None
    keys = [only_preset] if only_preset else list(PRESETS.keys())
    for key in keys:
        if key not in PRESETS:
            print(f"Unknown preset: {key}", file=sys.stderr)
            continue
        run_preset(key, only_file if only_preset else None)
    print("Done.")


if __name__ == "__main__":
    main()
